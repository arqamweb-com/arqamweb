<?php
/**
 * Generate POT file for Arqam Web theme
 *
 * This script scans all PHP files and extracts translatable strings
 * to generate an updated .pot file.
 */

// Configuration
$text_domain = 'arqamweb';
$theme_slug = 'Arqam-Web';
$theme_name = 'Arqam Web';
$theme_version = '1.0.0';
$theme_uri = 'https://www.arqamweb.com/';
$bugs_address = 'https://wordpress.org/support/theme/Arqam-Web-main';

// Translation functions to extract
$translation_functions = [
    '__',
    '_e',
    '_x',
    '_ex',
    '_n',
    '_nx',
    '_n_noop',
    '_nx_noop',
    'esc_html__',
    'esc_html_e',
    'esc_html_x',
    'esc_attr__',
    'esc_attr_e',
    'esc_attr_x',
];

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

// Strings collection
$strings = [];

/**
 * Extract translatable strings from a PHP file
 */
function extract_strings_from_file($file, $functions) {
    global $strings, $text_domain;

    $content = file_get_contents($file);
    if (empty($content)) {
        return;
    }

    // Pattern to match translation functions
    // Matches: __('string', 'textdomain'), esc_html__('string', 'textdomain'), etc.
    $pattern = '/(?:' . implode('|', array_map('preg_quote', $functions)) . ')\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*[\'"]' . preg_quote($text_domain, '/') . '[\'"]\s*\)/';

    if (preg_match_all($pattern, $content, $matches)) {
        foreach ($matches[1] as $string) {
            // Clean up the string
            $string = str_replace(['\\"', "\\'"], ['"', "'"], $string);

            if (!isset($strings[$string])) {
                $strings[$string] = [];
            }
            $strings[$string][] = str_replace('./', '', $file);
        }
    }

    // Also match sprintf patterns with translation functions
    $sprintf_pattern = '/sprintf\s*\(\s*(?:' . implode('|', array_map('preg_quote', $functions)) . ')\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*[\'"]' . preg_quote($text_domain, '/') . '[\'"]\s*\)/';

    if (preg_match_all($sprintf_pattern, $content, $matches)) {
        foreach ($matches[1] as $string) {
            $string = str_replace(['\\"', "\\'"], ['"', "'"], $string);

            if (!isset($strings[$string])) {
                $strings[$string] = [];
            }
            $strings[$string][] = str_replace('./', '', $file);
        }
    }
}

/**
 * Scan directory recursively for PHP files
 */
function scan_directory($dir, $functions) {
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
            if (in_array($file, ['node_modules', 'vendor', '.auto-claude', '.git', 'bin'])) {
                continue;
            }
            scan_directory($path, $functions);
        } elseif (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            extract_strings_from_file($path, $functions);
        }
    }
}

// Scan all directories
foreach ($scan_dirs as $dir) {
    scan_directory($dir, $translation_functions);
}

// Sort strings alphabetically
ksort($strings);

// Generate POT file header
$pot_content = <<<POT
# Copyright (C) 2026 Arqam Web
# This file is distributed under the GNU General Public License v2 or later.
msgid ""
msgstr ""
"Project-Id-Version: {$theme_name} {$theme_version}\\n"
"Report-Msgid-Bugs-To: {$bugs_address}\\n"
"Last-Translator: FULL NAME <EMAIL@ADDRESS>\\n"
"Language-Team: LANGUAGE <LL@li.org>\\n"
"MIME-Version: 1.0\\n"
"Content-Type: text/plain; charset=UTF-8\\n"
"Content-Transfer-Encoding: 8bit\\n"
"POT-Creation-Date: " . date('Y-m-d\\TH:i:sP') . "\\n"
"PO-Revision-Date: YEAR-MO-DA HO:MI+ZONE\\n"
"X-Generator: Arqam Web POT Generator\\n"
"X-Domain: {$text_domain}\\n"

#. Theme Name of the theme
#: style.css
msgid "{$theme_slug}"
msgstr ""

#. Theme URI of the theme
#. Author URI of the theme
#: style.css
msgid "{$theme_uri}"
msgstr ""

#. Description of the theme
#: style.css
msgid "Arqam Web is a custom WordPress theme for the Arqam Web agency, focused on fast marketing pages, structured SEO output, multilingual support, and tailored service, project, review, and quote-request experiences."
msgstr ""

#. Author of the theme
#: style.css
msgid "{$theme_name}"
msgstr ""


POT;

// Add extracted strings
foreach ($strings as $string => $files) {
    // Add file references
    $pot_content .= '#: ' . implode(', ', array_unique($files)) . "\n";

    // Escape special characters
    $escaped = addcslashes($string, "\"\n\r\t");

    // Add msgid
    $pot_content .= 'msgid "' . $escaped . '"' . "\n";
    $pot_content .= 'msgstr ""' . "\n\n";
}

// Write POT file
$pot_file = 'languages/' . $text_domain . '.pot';
file_put_contents($pot_file, $pot_content);

// Output statistics
$total_strings = count($strings);
$total_files = count(array_unique(array_merge(...array_values($strings))));

echo "POT file generated successfully!\n";
echo "Location: {$pot_file}\n";
echo "Total translatable strings: {$total_strings}\n";
echo "Total files scanned: {$total_files}\n";
echo "POT file line count: " . count(file($pot_file)) . "\n";
