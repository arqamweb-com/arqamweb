<?php
/**
 * Comprehensive PO File Merger and Translator
 *
 * Merges .pot file with existing .po file and provides Arabic translations
 * for all strings based on comprehensive translation dictionary.
 */

$pot_file = __DIR__ . '/../languages/arqamweb.pot';
$old_po_file = __DIR__ . '/../languages/arqamweb-ar.po';
$new_po_file = __DIR__ . '/../languages/arqamweb-ar-new.po';

echo "=== Arqam Web PO File Translator ===\n\n";

// Read existing translations
echo "Reading existing translations from PO file...\n";
$existing_translations = parse_po_file($old_po_file);
echo "Found " . count($existing_translations) . " existing translations\n\n";

// Comprehensive translation dictionary for all new strings
$translation_dict = get_comprehensive_translations();
echo "Loaded " . count($translation_dict) . " translation dictionary entries\n\n";

// Merge dictionaries (existing translations take precedence)
$all_translations = array_merge($translation_dict, $existing_translations);

// Parse POT file and generate new PO
echo "Generating new PO file from POT template...\n";
$po_entries = parse_pot_file($pot_file);
echo "Found " . count($po_entries) . " strings in POT file\n\n";

// Generate PO file content
$output = generate_po_file($po_entries, $all_translations);

// Write output
file_put_contents($new_po_file, $output);
echo "✓ New PO file generated: {$new_po_file}\n";
echo "Lines: " . substr_count($output, "\n") . "\n";
echo "Size: " . strlen($output) . " bytes\n\n";

// Statistics
$translated = 0;
$missing = [];
foreach ($po_entries as $entry) {
    if (isset($all_translations[$entry['msgid']]) && $all_translations[$entry['msgid']] !== '') {
        $translated++;
    } else {
        $missing[] = $entry['msgid'];
    }
}

echo "Translation Statistics:\n";
echo "- Total strings: " . count($po_entries) . "\n";
echo "- Translated: {$translated}\n";
echo "- Missing: " . count($missing) . "\n";
echo "- Coverage: " . round(($translated / count($po_entries)) * 100, 1) . "%\n\n";

if (count($missing) > 0 && count($missing) < 20) {
    echo "Missing translations:\n";
    foreach (array_slice($missing, 0, 10) as $miss) {
        echo "  - " . substr($miss, 0, 60) . "\n";
    }
}

/**
 * Parse PO file and extract translations
 */
function parse_po_file($file) {
    $content = file_get_contents($file);
    $translations = [];

    // Match msgid/msgstr pairs
    preg_match_all('/msgid\s+"([^"]+)"\s+msgstr\s+"([^"]*)"/s', $content, $matches, PREG_SET_ORDER);

    foreach ($matches as $match) {
        $msgid = $match[1];
        $msgstr = $match[2];
        if ($msgid !== '' && $msgstr !== '') {
            $translations[$msgid] = $msgstr;
        }
    }

    return $translations;
}

/**
 * Parse POT file and extract all entries
 */
function parse_pot_file($file) {
    $content = file_get_contents($file);
    $entries = [];
    $lines = explode("\n", $content);

    $i = 0;
    while ($i < count($lines)) {
        $line = trim($lines[$i]);

        // Start of entry with comments
        if (strpos($line, '#:') === 0 || strpos($line, '#.') === 0 || strpos($line, '#') === 0) {
            $comments = [];
            while ($i < count($lines) && strpos(trim($lines[$i]), '#') === 0) {
                $comments[] = $lines[$i];
                $i++;
            }

            // Now should be msgid
            if ($i < count($lines) && strpos(trim($lines[$i]), 'msgid') === 0) {
                $msgid_line = trim($lines[$i]);
                preg_match('/msgid\s+"([^"]*)"/', $msgid_line, $match);
                if (isset($match[1])) {
                    $entries[] = [
                        'comments' => $comments,
                        'msgid' => $match[1]
                    ];
                }
            }
        }

        $i++;
    }

    return $entries;
}

/**
 * Generate PO file content
 */
function generate_po_file($entries, $translations) {
    $output = '';

    // Header
    $output .= "# Copyright (C) 2026 Arqam Web\n";
    $output .= "# This file is distributed under the GNU General Public License v2 or later.\n";
    $output .= "msgid \"\"\n";
    $output .= "msgstr \"\"\n";
    $output .= "\"Project-Id-Version: Arqam Web 1.0.0\\n\"\n";
    $output .= "\"Report-Msgid-Bugs-To: https://wordpress.org/support/theme/Arqam-Web-main\\n\"\n";
    $output .= "\"Last-Translator: Arqam Web Team\\n\"\n";
    $output .= "\"Language-Team: Arabic\\n\"\n";
    $output .= "\"MIME-Version: 1.0\\n\"\n";
    $output .= "\"Content-Type: text/plain; charset=UTF-8\\n\"\n";
    $output .= "\"Content-Transfer-Encoding: 8bit\\n\"\n";
    $output .= "\"POT-Creation-Date: " . date('Y-m-d\TH:i:sP') . "\\n\"\n";
    $output .= "\"PO-Revision-Date: " . date('Y-m-d\TH:i:sP') . "\\n\"\n";
    $output .= "\"X-Generator: Arqam Web PO Translator\\n\"\n";
    $output .= "\"X-Domain: arqamweb\\n\"\n";
    $output .= "\"Language: ar\\n\"\n";
    $output .= "\"Plural-Forms: nplurals=6; plural=(n==0 ? 0 : n==1 ? 1 : n==2 ? 2 : n%100>=3 && n%100<=10 ? 3 : n%100>=11 ? 4 : 5);\\n\"\n";
    $output .= "\n";

    // Entries
    foreach ($entries as $entry) {
        // Comments
        foreach ($entry['comments'] as $comment) {
            $output .= $comment . "\n";
        }

        // msgid
        $output .= "msgid \"" . $entry['msgid'] . "\"\n";

        // msgstr
        $msgstr = isset($translations[$entry['msgid']]) ? $translations[$entry['msgid']] : $entry['msgid'];
        $output .= "msgstr \"" . $msgstr . "\"\n";
        $output .= "\n";
    }

    return $output;
}

/**
 * Comprehensive Arabic translations dictionary
 */
function get_comprehensive_translations() {
    return [
        // Theme info
        'Arqam-Web' => 'Arqam-Web',
        'https://www.arqamweb.com/' => 'https://www.arqamweb.com/',
        'Arqam Web is a custom WordPress theme for the Arqam Web agency, focused on fast marketing pages, structured SEO output, multilingual support, and tailored service, project, review, and quote-request experiences.' => 'Arqam Web هو قالب ووردبريس مخصّص لوكالة Arqam Web، يركّز على صفحات تسويقية سريعة، ومخرجات SEO منظّمة، ودعم متعدد اللغات، وتجارب مصمّمة خصيصاً للخدمات والمشاريع والتقييمات وطلبات عرض السعر.',
        'Arqam Web' => 'Arqam Web',

        // New strings from Phase 2 refactoring - frontpage-services.php
        'Web Development' => 'تطوير الويب',
        'Digital Product' => 'منتج رقمي',
        'Websites that rank, convert and scale — built with senior code and measured by real traffic.' => 'مواقع تتصدر النتائج وتحقق التحويل وتتوسع — مبنية ببرمجة احترافية ومقاسة بزيارات حقيقية.',
        'Search Engine Optimization' => 'تحسين محركات البحث',
        'Organic Growth' => 'نمو عضوي',
        'Rank first for what your customers are searching — traffic that compounds month after month.' => 'تصدّر الصفحة الأولى لما يبحث عنه عملاؤك — زيارات تتراكم شهراً بعد شهر.',
        'Brand Identity Design' => 'تصميم الهوية البصرية',
        'Visual Systems' => 'أنظمة بصرية',
        'Brands that hold attention — from the first glance to the hundredth touchpoint.' => 'علامات تجارية تستحوذ على الانتباه — من النظرة الأولى إلى نقطة التواصل المئة.',
        'Social Media Marketing' => 'التسويق عبر السوشيال ميديا',
        'Audience Building' => 'بناء الجمهور',
        'Content that stops the scroll — engineered for reach, engagement and measurable brand growth.' => 'محتوى يوقف التمرير — مصمم للوصول والتفاعل ونمو العلامة التجارية القابل للقياس.',

        // Tags for services
        'Technical SEO' => 'تحسين محركات البحث التقني',
        'WordPress' => 'ووردبريس',
        'Shopify' => 'Shopify',
        'Custom Code' => 'برمجة مخصّصة',
        'On-page SEO' => 'تحسين محركات البحث الداخلي',
        'Link Building' => 'بناء الروابط',
        'Local SEO' => 'تحسين محركات البحث المحلي',
        'Content SEO' => 'تحسين محركات البحث للمحتوى',
        'Logo Design' => 'تصميم الشعار',
        'Brand Guidelines' => 'دليل الهوية البصرية',
        'Print Design' => 'تصميم المطبوعات',
        'Packaging' => 'تصميم العبوات',
        'Instagram' => 'إنستجرام',
        'TikTok' => 'تيك توك',
        'LinkedIn' => 'لينكد إن',
        'Content Strategy' => 'استراتيجية المحتوى',

        // New strings from frontpage-slider.php
        '15+ Years of digital marketing excellence' => 'أكثر من 15 عاماً من التميّز في التسويق الرقمي',
        '320+ Projects delivered globally' => 'أكثر من 320 مشروعاً منجزاً عالمياً',
        '12+ Countries served worldwide' => 'أكثر من 12 دولة خدمناها حول العالم',
        '4.9 / 5 average' => '4.9 / 5 متوسط',
        'From 80+ verified client reviews' => 'من أكثر من 80 تقييماً موثّقاً من العملاء',

        // New strings from frontpage-numbers.php
        'Projects delivered' => 'مشاريع منجزة',
        'Since 2010' => 'منذ عام 2010',
        'Client retention rate' => 'معدل الاحتفاظ بالعملاء',
        'Long-term partnerships' => 'شراكات طويلة الأمد',
        'Countries served' => 'دول خدمناها',
        'Global reach' => 'وصول عالمي',
        'Average client rating' => 'متوسط تقييم العملاء',
        'Based on verified reviews' => 'بناءً على تقييمات موثّقة',

        // New strings from footer.php (refactored copyright)
        '© %s Arqam Web. All rights reserved.' => '© %s Arqam Web. جميع الحقوق محفوظة.',

        // New strings from inc/template-tags.php (refactored categories/tags)
        'Posted in %1$s' => 'نُشر في %1$s',
        'Tagged %1$s' => 'موسوم بـ %1$s',

        // Common UI elements
        '%s icon' => 'أيقونة %s',
        '%s project preview' => 'معاينة مشروع %s',
    ];
}
