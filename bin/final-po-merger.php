<?php
/**
 * Final PO File Merger - Comprehensive Arabic Translation
 *
 * This script merges the POT file with the existing PO file,
 * preserving all existing translations and adding Arabic translations
 * for all new strings identified in Phase 2 refactoring.
 */

$pot_file = __DIR__ . '/../languages/arqamweb.pot';
$po_file_old = __DIR__ . '/../languages/arqamweb-ar.po';
$po_file_new = __DIR__ . '/../languages/arqamweb-ar.po';

echo "=== Arqam Web PO File Merger ===\n\n";

// Step 1: Read existing PO file and extract all translations
echo "Step 1: Reading existing translations...\n";
$existing = file_get_contents($po_file_old);
$existing_translations = [];

// Parse existing translations using regex
preg_match_all('/msgid\s+"([^"]*)"\s*\nmsgstr\s+"([^"]*)"/m', $existing, $matches, PREG_SET_ORDER);
foreach ($matches as $match) {
    if ($match[1] !== '' && $match[2] !== '') {
        $existing_translations[$match[1]] = $match[2];
    }
}

echo "Found " . count($existing_translations) . " existing translations\n\n";

// Step 2: Define new translations for Phase 2 strings
echo "Step 2: Loading new translations from Phase 2...\n";
$new_translations = [
    // frontpage-services.php
    'Website Design & Development' => 'تصميم وتطوير المواقع',
    'Custom-built. Performance-obsessed.' => 'مبني خصيصاً. مهووس بالأداء.',
    'Bespoke websites and platforms — engineered on a clean, scalable codebase that loads fast, ranks well, and converts.' => 'مواقع ومنصات مصممة خصيصاً — مبنية على كود نظيف وقابل للتوسع يحمّل بسرعة ويتصدر النتائج ويحقق التحويل.',
    'UX & visual design' => 'تصميم تجربة المستخدم والتصميم البصري',
    'Headless / WordPress / custom' => 'بدون رأس / ووردبريس / مخصص',
    'Core Web Vitals tuned' => 'مُحسَّن لمؤشرات Core Web Vitals',

    'Search Engine Optimization' => 'تحسين محركات البحث',
    'Rank where buying happens.' => 'تصدّر حيث يحدث الشراء.',
    'Technical SEO, content architecture and authority building — engineered for both Google and the new AI search surfaces.' => 'تحسين محركات البحث التقني، وبنية المحتوى، وبناء السلطة — مصمم لكل من Google ومحركات البحث بالذكاء الاصطناعي الجديدة.',
    'Technical audit & fixes' => 'تدقيق تقني وإصلاحات',
    'Keyword & topic strategy' => 'استراتيجية الكلمات المفتاحية والمواضيع',
    'Authority & links' => 'السلطة والروابط',

    'Brand Identity' => 'الهوية البصرية',
    'Brands worth remembering.' => 'علامات تجارية تستحق أن تُتذكَّر.',
    'Logo systems, typography and the full visual language — across digital, print and packaging — that defines how the world sees you.' => 'أنظمة الشعار، والطباعة، واللغة البصرية الكاملة — عبر الرقمي، والمطبوع، والعبوات — التي تحدد كيف يراك العالم.',
    'Logo & marks' => 'الشعار والعلامات',
    'Type & color systems' => 'أنظمة الخطوط والألوان',
    'Brand guidelines' => 'دليل الهوية البصرية',

    'Social Media Marketing' => 'التسويق عبر السوشيال ميديا',
    'Audiences that convert.' => 'جمهور يحقق التحويل.',
    'Strategy, creative production, paid social and community management across Instagram, TikTok, LinkedIn, X and YouTube.' => 'استراتيجية، وإنتاج إبداعي، وإعلانات مدفوعة، وإدارة المجتمع عبر إنستجرام وتيك توك ولينكد إن وX ويوتيوب.',
    'Content strategy' => 'استراتيجية المحتوى',
    'Creative production' => 'الإنتاج الإبداعي',
    'Paid social' => 'الإعلانات المدفوعة',

    // frontpage-slider.php
    'Google Search Console' => 'Google Search Console',
    'Organic visibility growth across competitive markets' => 'نمو الظهور العضوي عبر الأسواق التنافسية',
    'Ridge Labs' => 'Ridge Labs',
    'Custom UI/UX engineered for speed, precision, and product growth' => 'واجهة مستخدم/تجربة مخصصة مصممة للسرعة والدقة ونمو المنتج',
    'Kidana Travel' => 'Kidana Travel',
    'Conversion-focused travel experience designed for global audiences' => 'تجربة سفر تركز على التحويل مصممة للجمهور العالمي',
    'Don\'t Sit · Get Fit' => 'Don\'t Sit · Get Fit',
    'Bold branding and immersive web experience built for engagement' => 'هوية بصرية جريئة وتجربة ويب غامرة مبنية للتفاعل',
    'Data-driven SEO campaigns focused on measurable business growth' => 'حملات تحسين محركات بحث مبنية على البيانات وتركز على نمو الأعمال القابل للقياس',
    'Brands' => 'العلامات التجارية',
    'Grow.' => 'تنمو.',
    'Scale.' => 'تتوسع.',
    'Convert.' => 'تحقق التحويل.',

    // frontpage-numbers.php
    'Years of experience' => 'سنوات من الخبرة',
    'since 2010' => 'منذ عام 2010',
    'Countries served' => 'دول خدمناها',
    'GCC · MENA · UK · USA' => 'دول الخليج · الشرق الأوسط وشمال أفريقيا · المملكة المتحدة · الولايات المتحدة',
    'Client retention' => 'الاحتفاظ بالعملاء',
    'long-term partnerships' => 'شراكات طويلة الأمد',
    'Average client rating' => 'متوسط تقييم العملاء',
    'out of 5.0' => 'من 5.0',

    // footer.php - refactored copyright with sprintf
    '© %s Arqam Web. All rights reserved.' => '© %s Arqam Web. جميع الحقوق محفوظة.',

    // inc/template-tags.php - refactored category/tag output
    'Posted in %1$s' => 'نُشر في %1$s',
    'Tagged %1$s' => 'موسوم بـ %1$s',
];

echo "Loaded " . count($new_translations) . " new translations\n\n";

// Step 3: Merge translations (existing takes precedence)
$all_translations = array_merge($new_translations, $existing_translations);
echo "Step 3: Total translations available: " . count($all_translations) . "\n\n";

// Step 4: Read POT file
echo "Step 4: Reading POT file...\n";
$pot_content = file_get_contents($pot_file);

// Step 5: Generate new PO file
echo "Step 5: Generating new PO file...\n";
$output = generate_complete_po($pot_content, $all_translations);

// Step 6: Write output
file_put_contents($po_file_new, $output);
echo "✓ PO file updated successfully!\n\n";

// Step 7: Statistics
$lines = substr_count($output, "\n");
$size = strlen($output);
echo "Output Statistics:\n";
echo "- Lines: {$lines}\n";
echo "- Size: {$size} bytes\n";
echo "- File: {$po_file_new}\n\n";

// Step 8: Validation
echo "Step 8: Validating translations...\n";
$missing = 0;
$fuzzy = 0;
preg_match_all('/msgid\s+"([^"]*)"\s*\nmsgstr\s+"([^"]*)"/m', $output, $validation_matches, PREG_SET_ORDER);
foreach ($validation_matches as $match) {
    $msgid = $match[1];
    $msgstr = $match[2];

    if ($msgid !== '' && $msgstr === '') {
        $missing++;
        if ($missing <= 5) {
            echo "  Missing: {$msgid}\n";
        }
    }
    if (strpos($msgstr, 'fuzzy') !== false) {
        $fuzzy++;
    }
}

echo "\nValidation Results:\n";
echo "- Missing translations: {$missing}\n";
echo "- Fuzzy translations: {$fuzzy}\n";
echo "- Status: " . ($missing == 0 && $fuzzy == 0 ? "✓ PASS" : "⚠ NEEDS REVIEW") . "\n\n";

echo "=== Complete! ===\n";

/**
 * Generate complete PO file content
 */
function generate_complete_po($pot_content, $translations) {
    $lines = explode("\n", $pot_content);
    $output = [];

    // Add header
    $output[] = '# Copyright (C) 2026 Arqam Web';
    $output[] = '# This file is distributed under the GNU General Public License v2 or later.';
    $output[] = 'msgid ""';
    $output[] = 'msgstr ""';
    $output[] = '"Project-Id-Version: Arqam Web 1.0.0\n"';
    $output[] = '"Report-Msgid-Bugs-To: https://wordpress.org/support/theme/Arqam-Web-main\n"';
    $output[] = '"Last-Translator: Arqam Web Team <info@arqamweb.com>\n"';
    $output[] = '"Language-Team: Arabic\n"';
    $output[] = '"MIME-Version: 1.0\n"';
    $output[] = '"Content-Type: text/plain; charset=UTF-8\n"';
    $output[] = '"Content-Transfer-Encoding: 8bit\n"';
    $output[] = '"POT-Creation-Date: ' . date('Y-m-d\TH:i:sP') . '\n"';
    $output[] = '"PO-Revision-Date: ' . date('Y-m-d\TH:i:sP') . '\n"';
    $output[] = '"X-Generator: Arqam Web PO Merger\n"';
    $output[] = '"X-Domain: arqamweb\n"';
    $output[] = '"Language: ar\n"';
    $output[] = '"Plural-Forms: nplurals=6; plural=(n==0 ? 0 : n==1 ? 1 : n==2 ? 2 : n%100>=3 && n%100<=10 ? 3 : n%100>=11 ? 4 : 5);\n"';
    $output[] = '';

    $i = 0;
    $in_header = true;
    $comment_buffer = [];

    while ($i < count($lines)) {
        $line = $lines[$i];

        // Skip POT header
        if ($in_header) {
            if (trim($line) === '' && $i > 15) {
                $in_header = false;
            }
            $i++;
            continue;
        }

        // Collect comments
        if (strpos($line, '#') === 0) {
            $comment_buffer[] = $line;
            $i++;
            continue;
        }

        // Process msgid
        if (strpos($line, 'msgid "') === 0) {
            preg_match('/msgid\s+"([^"]*)"/', $line, $match);
            if (isset($match[1])) {
                $msgid = $match[1];

                // Add comments
                foreach ($comment_buffer as $comment) {
                    $output[] = $comment;
                }
                $comment_buffer = [];

                // Add msgid
                $output[] = $line;

                // Skip msgstr in POT
                $i++;
                if ($i < count($lines) && strpos($lines[$i], 'msgstr') === 0) {
                    // Add msgstr with translation
                    if (isset($translations[$msgid]) && $translations[$msgid] !== '') {
                        $output[] = 'msgstr "' . $translations[$msgid] . '"';
                    } else {
                        $output[] = 'msgstr "' . $msgid . '"';
                    }
                    $i++;
                }

                $output[] = '';
                continue;
            }
        }

        $i++;
    }

    return implode("\n", $output);
}
