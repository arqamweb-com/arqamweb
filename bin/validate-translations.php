<?php
/**
 * Validate Translation Coverage for Arqam Web Theme
 *
 * This script scans all PHP files to detect hard-coded strings that are not
 * wrapped in WordPress translation functions.
 *
 * Usage:
 *   php bin/validate-translations.php --check     # Exit code 0 if all pass, 1 if issues found
 *   php bin/validate-translations.php --report    # Detailed JSON report
 *   php bin/validate-translations.php --verbose   # Human-readable detailed output
 */

// Configuration
$text_domain = 'arqamweb';

// Directories to scan
$scan_dirs = [
    '.',
    'inc',
    'inc/helpers',
    'template-parts',
    'template-parts/frontpage',
    'template-parts/content',
    'template-parts/partials',
];

// Valid translation functions
$translation_functions = [
    '__', '_e', '_x', '_ex', '_n', '_nx', '_n_noop', '_nx_noop',
    'esc_html__', 'esc_html_e', 'esc_html_x',
    'esc_attr__', 'esc_attr_e', 'esc_attr_x',
];

// Issues found
$issues = [];
$files_scanned = 0;

/**
 * Check if a string is likely a hard-coded user-facing string
 */
function is_user_facing_string($string) {
    // Skip empty strings
    if (empty(trim($string))) {
        return false;
    }

    // Skip variable names, function names, CSS classes, IDs
    if (preg_match('/^[\$_a-z][_a-z0-9\-]*$/i', $string)) {
        return false;
    }

    // Skip URLs
    if (preg_match('/^https?:\/\//', $string)) {
        return false;
    }

    // Skip paths and file names
    if (preg_match('/^[\.\/]/', $string) || preg_match('/\.(php|js|css|jpg|png|svg)$/', $string)) {
        return false;
    }

    // Skip common WordPress functions/constants
    if (in_array($string, ['post', 'page', 'attachment', 'revision', 'nav_menu_item'])) {
        return false;
    }

    // Skip proper nouns (country names, brand names) - typically don't need translation
    $proper_nouns = [
        'Egypt', 'Saudi Arabia', 'United Arab Emirates', 'Kuwait', 'Oman', 'Qatar',
        'United States', 'United Kingdom', 'Ireland', 'Germany', 'Spain',
        'Google Cloud', 'Rank Math', 'WordPress', 'Arqam Web'
    ];
    if (in_array($string, $proper_nouns)) {
        return false;
    }

    // If it contains spaces and letters, likely user-facing
    if (preg_match('/[a-z]{2,}.*\s+[a-z]{2,}/i', $string)) {
        return true;
    }

    // If it contains sentence-like patterns
    if (preg_match('/^[A-Z][a-z]+/', $string) && strlen($string) > 10) {
        return true;
    }

    return false;
}

/**
 * Check if a file uses the pattern where array strings are wrapped during output
 */
function file_uses_wrapped_array_pattern($content) {
    // Pattern: __($item['key'], 'arqamweb') or esc_html(__($item['key'], 'arqamweb'))
    return preg_match('/(?:__|esc_html__)\s*\(\s*\$\w+\[[\'"]\w+[\'"]\]\s*,\s*[\'"]arqamweb[\'"]\s*\)/', $content);
}

/**
 * Validate a PHP file for translation coverage
 */
function validate_file($file) {
    global $issues, $files_scanned, $text_domain, $translation_functions;

    $content = file_get_contents($file);
    if (empty($content)) {
        return;
    }

    $files_scanned++;
    $file_issues = [];
    $lines = explode("\n", $content);

    // Pattern 1: Hard-coded strings in arrays (e.g., 'title' => 'Hard-coded text')
    // Look for array assignments with quoted strings
    // SKIP if file uses the pattern where array values are wrapped during output
    if (!file_uses_wrapped_array_pattern($content)) {
        $array_pattern = '/[\'"](?:title|label|text|description|placeholder|heading|subheading|eyebrow|copy|note|message|error)[\'"]?\s*=>\s*[\'"]((?:[^\'"]|\\\\[\'"])+)[\'"]/';
        if (preg_match_all($array_pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
            foreach ($matches[0] as $idx => $match) {
                $full_match = $match[0];
                $string_value = $matches[1][$idx][0];

                // Check if this string is wrapped in a translation function
                $offset = $match[1];
                $context_before = substr($content, max(0, $offset - 100), 100);

                $is_translated = false;
                foreach ($translation_functions as $func) {
                    if (strpos($context_before, $func . '(') !== false || strpos($full_match, $func . '(') !== false) {
                        $is_translated = true;
                        break;
                    }
                }

                if (!$is_translated && is_user_facing_string($string_value)) {
                    $line_num = substr_count(substr($content, 0, $offset), "\n") + 1;
                    $file_issues[] = [
                        'type' => 'array_value',
                        'line' => $line_num,
                        'string' => $string_value,
                        'context' => trim($full_match),
                    ];
                }
            }
        }
    }

    // Pattern 2: Hard-coded strings in HTML attributes (aria-label, placeholder, title, alt)
    $attr_pattern = '/(?:aria-label|placeholder|title|alt)\s*=\s*["\'](?!<?php)((?:[^"\'<]|\\\\["\'])+)["\']/';
    if (preg_match_all($attr_pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $idx => $match) {
            $full_match = $match[0];
            $attr_value = $matches[1][$idx][0];
            $offset = $match[1];

            // Check if surrounded by PHP translation function
            $context_start = max(0, $offset - 150);
            $context_before = substr($content, $context_start, $offset - $context_start);
            $context_after = substr($content, $offset, 100);

            $is_translated = false;
            foreach ($translation_functions as $func) {
                if (preg_match('/' . preg_quote($func, '/') . '\s*\([^)]*$/', $context_before) ||
                    preg_match('/^[^>]*\?>\s*$/', $context_before)) {
                    $is_translated = true;
                    break;
                }
            }

            if (!$is_translated && is_user_facing_string($attr_value) && strlen($attr_value) > 2) {
                $line_num = substr_count(substr($content, 0, $offset), "\n") + 1;
                $file_issues[] = [
                    'type' => 'html_attribute',
                    'line' => $line_num,
                    'string' => $attr_value,
                    'context' => trim($full_match),
                ];
            }
        }
    }

    // Pattern 3: Echo/print statements with hard-coded strings
    // Match: echo 'string' or echo "string" (not followed by variable or function)
    $echo_pattern = '/(?:echo|print)\s+["\']([^"\'<>{}\$]+)["\']/';
    if (preg_match_all($echo_pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $idx => $match) {
            $full_match = $match[0];
            $string_value = $matches[1][$idx][0];
            $offset = $match[1];

            if (is_user_facing_string($string_value)) {
                $line_num = substr_count(substr($content, 0, $offset), "\n") + 1;
                $file_issues[] = [
                    'type' => 'echo_statement',
                    'line' => $line_num,
                    'string' => $string_value,
                    'context' => trim($full_match),
                ];
            }
        }
    }

    // Pattern 4: String concatenation patterns (e.g., 'Part 1 ' . $var . ' Part 2')
    // Look for quoted strings being concatenated
    $concat_pattern = '/["\']([A-Z][a-zA-Z\s]{5,})["\']?\s*\.\s*\$/';
    if (preg_match_all($concat_pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $idx => $match) {
            $full_match = $match[0];
            $string_value = $matches[1][$idx][0];
            $offset = $match[1];

            // Check if using sprintf
            $context_before = substr($content, max(0, $offset - 50), 50);
            $uses_sprintf = strpos($context_before, 'sprintf') !== false;

            if (!$uses_sprintf && is_user_facing_string($string_value)) {
                $line_num = substr_count(substr($content, 0, $offset), "\n") + 1;
                $file_issues[] = [
                    'type' => 'string_concatenation',
                    'line' => $line_num,
                    'string' => $string_value,
                    'context' => trim($full_match),
                ];
            }
        }
    }

    if (!empty($file_issues)) {
        $issues[str_replace('./', '', $file)] = $file_issues;
    }
}

/**
 * Scan directory recursively for PHP files
 */
function scan_directory($dir) {
    if (!is_dir($dir)) {
        return;
    }

    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $path = $dir . '/' . $file;

        // Skip certain directories
        if (is_dir($path)) {
            if (in_array($file, ['node_modules', 'vendor', '.auto-claude', '.git', 'bin', 'languages'])) {
                continue;
            }
            scan_directory($path);
        } elseif (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            validate_file($path);
        }
    }
}

// Parse command line arguments
$mode = 'check';
if (isset($argv[1])) {
    $arg = $argv[1];
    if ($arg === '--report') {
        $mode = 'report';
    } elseif ($arg === '--verbose') {
        $mode = 'verbose';
    } elseif ($arg === '--check') {
        $mode = 'check';
    }
}

// Scan all directories
foreach ($scan_dirs as $dir) {
    scan_directory($dir);
}

// Calculate statistics
$total_issues = 0;
foreach ($issues as $file_issues) {
    $total_issues += count($file_issues);
}

// Output based on mode
if ($mode === 'report') {
    // JSON report
    echo json_encode([
        'files_scanned' => $files_scanned,
        'files_with_issues' => count($issues),
        'total_issues' => $total_issues,
        'issues' => $issues,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
    exit($total_issues > 0 ? 1 : 0);

} elseif ($mode === 'verbose') {
    // Detailed human-readable output
    echo "Translation Validation Report\n";
    echo "============================\n\n";
    echo "Files scanned: {$files_scanned}\n";
    echo "Files with issues: " . count($issues) . "\n";
    echo "Total issues: {$total_issues}\n\n";

    if ($total_issues > 0) {
        echo "Issues found:\n";
        echo "-------------\n\n";

        foreach ($issues as $file => $file_issues) {
            echo "{$file} (" . count($file_issues) . " issues)\n";
            foreach ($file_issues as $issue) {
                echo "  Line {$issue['line']}: [{$issue['type']}]\n";
                echo "    String: \"{$issue['string']}\"\n";
                echo "    Context: {$issue['context']}\n\n";
            }
        }
    } else {
        echo "✅ All strings properly wrapped!\n";
    }
    exit($total_issues > 0 ? 1 : 0);

} else {
    // Default --check mode: simple pass/fail with message
    if ($total_issues > 0) {
        echo "Translation validation failed: {$total_issues} hard-coded strings found in " . count($issues) . " files\n";
        echo "Run with --verbose for details\n";
        exit(1);
    } else {
        echo "All strings properly wrapped\n";
        exit(0);
    }
}
