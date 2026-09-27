<?php
/**
 * Merge POT file into Arabic PO file and add Arabic translations
 *
 * This script:
 * 1. Reads the .pot file to get all translatable strings
 * 2. Reads the existing .po file to preserve existing translations
 * 3. Merges new strings from .pot into .po
 * 4. Adds Arabic translations for all strings
 * 5. Outputs a complete, translated .po file
 *
 * Usage: php bin/merge-and-translate-po.php
 */

// File paths
$pot_file = __DIR__ . '/../languages/arqamweb.pot';
$po_file = __DIR__ . '/../languages/arqamweb-ar.po';
$output_file = __DIR__ . '/../languages/arqamweb-ar.po';

if (!file_exists($pot_file)) {
    die("Error: POT file not found at {$pot_file}\n");
}

if (!file_exists($po_file)) {
    die("Error: PO file not found at {$po_file}\n");
}

echo "Starting PO file merge and translation...\n";
echo "Reading POT file: {$pot_file}\n";
echo "Reading PO file: {$po_file}\n";

// Read and parse existing PO file to preserve translations
$po_content = file_get_contents($po_file);
$existing_translations = [];
$current_msgid = '';
$current_msgstr = '';
$in_msgstr = false;

$po_lines = explode("\n", $po_content);
foreach ($po_lines as $line) {
    $line = trim($line);

    if (strpos($line, 'msgid "') === 0) {
        // Save previous entry if exists
        if ($current_msgid && $current_msgstr) {
            $existing_translations[$current_msgid] = $current_msgstr;
        }
        // Start new entry
        $current_msgid = substr($line, 7, -1); // Remove 'msgid "' and trailing '"'
        $current_msgstr = '';
        $in_msgstr = false;
    } elseif (strpos($line, 'msgstr "') === 0) {
        $current_msgstr = substr($line, 8, -1); // Remove 'msgstr "' and trailing '"'
        $in_msgstr = true;
    } elseif ($in_msgstr && strpos($line, '"') === 0) {
        // Continuation of msgstr
        $current_msgstr .= substr($line, 1, -1);
    }
}

// Save last entry
if ($current_msgid && $current_msgstr) {
    $existing_translations[$current_msgid] = $current_msgstr;
}

echo "Found " . count($existing_translations) . " existing translations\n";

// Comprehensive Arabic translation dictionary
$translations = [
    // New strings from frontpage-services.php
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

    // New strings from footer.php
    '© %s Arqam Web. All rights reserved.' => '© %s Arqam Web. جميع الحقوق محفوظة.',

    // New strings from inc/template-tags.php
    'Posted in %1$s' => 'نُشر في %1$s',
    'Tagged %1$s' => 'موسوم بـ %1$s',

    // Additional common strings
    'Learn More' => 'اعرف المزيد',
    'Get Started' => 'ابدأ الآن',
    'View More' => 'عرض المزيد',
    'Read More' => 'اقرأ المزيد',
    'See All' => 'شاهد الكل',
    'Show More' => 'عرض المزيد',
    'Show Less' => 'عرض أقل',
    'Load More' => 'تحميل المزيد',
    'View Details' => 'عرض التفاصيل',
    'Close' => 'إغلاق',
    'Open' => 'فتح',
    'Submit' => 'إرسال',
    'Send' => 'إرسال',
    'Cancel' => 'إلغاء',
    'Save' => 'حفظ',
    'Delete' => 'حذف',
    'Edit' => 'تحرير',
    'Update' => 'تحديث',
    'Add' => 'إضافة',
    'Remove' => 'إزالة',
    'Next' => 'التالي',
    'Previous' => 'السابق',
    'First' => 'الأول',
    'Last' => 'الأخير',
    'Yes' => 'نعم',
    'No' => 'لا',
    'OK' => 'موافق',
    'Confirm' => 'تأكيد',
    'Continue' => 'متابعة',
    'Back' => 'رجوع',
    'Skip' => 'تخطي',
    'Finish' => 'إنهاء',
    'Done' => 'تم',
    'Success' => 'نجح',
    'Error' => 'خطأ',
    'Warning' => 'تحذير',
    'Info' => 'معلومات',
    'Loading...' => 'جارٍ التحميل...',
    'Please wait...' => 'يرجى الانتظار...',
    'Processing...' => 'جارٍ المعالجة...',
    'Uploading...' => 'جارٍ الرفع...',
    'Downloading...' => 'جارٍ التنزيل...',
    'Saving...' => 'جارٍ الحفظ...',
    'Deleting...' => 'جارٍ الحذف...',
    'Updating...' => 'جارٍ التحديث...',
    'Searching...' => 'جارٍ البحث...',
];

// Merge existing translations with new ones (preserve existing)
$all_translations = array_merge($translations, $existing_translations);

echo "Total translations available: " . count($all_translations) . "\n";

// Read POT file and generate complete PO file
$pot_content = file_get_contents($pot_file);
$output_lines = [];

// Add PO file header
$output_lines[] = '# Copyright (C) 2026 Arqam Web';
$output_lines[] = '# This file is distributed under the GNU General Public License v2 or later.';
$output_lines[] = 'msgid ""';
$output_lines[] = 'msgstr ""';
$output_lines[] = '"Project-Id-Version: Arqam Web 1.0.0\n"';
$output_lines[] = '"Report-Msgid-Bugs-To: https://wordpress.org/support/theme/Arqam-Web-main\n"';
$output_lines[] = '"Last-Translator: Arqam Web <info@arqamweb.com>\n"';
$output_lines[] = '"Language-Team: Arabic\n"';
$output_lines[] = '"MIME-Version: 1.0\n"';
$output_lines[] = '"Content-Type: text/plain; charset=UTF-8\n"';
$output_lines[] = '"Content-Transfer-Encoding: 8bit\n"';
$output_lines[] = '"POT-Creation-Date: ' . date('Y-m-d\TH:i:sP') . '\n"';
$output_lines[] = '"PO-Revision-Date: ' . date('Y-m-d\TH:i:sP') . '\n"';
$output_lines[] = '"X-Generator: Arqam Web PO Merger & Translator\n"';
$output_lines[] = '"X-Domain: arqamweb\n"';
$output_lines[] = '"Language: ar\n"';
$output_lines[] = '"Plural-Forms: nplurals=6; plural=(n==0 ? 0 : n==1 ? 1 : n==2 ? 2 : n%100>=3 && n%100<=10 ? 3 : n%100>=11 ? 4 : 5);\n"';
$output_lines[] = '';

// Parse POT file and add translations
$pot_lines = explode("\n", $pot_content);
$i = 0;
$in_header = true;
$comment_buffer = [];
$translated_count = 0;
$untranslated_count = 0;

while ($i < count($pot_lines)) {
    $line = $pot_lines[$i];

    // Skip header section
    if ($in_header) {
        if (trim($line) === '' && $i > 10) {
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
        $msgid = substr($line, 7, -1); // Remove 'msgid "' and trailing '"'

        // Multi-line msgid
        $i++;
        while ($i < count($pot_lines) && strpos($pot_lines[$i], '"') === 0) {
            $msgid .= substr($pot_lines[$i], 1, -1);
            $i++;
        }

        // Skip msgstr in POT
        if ($i < count($pot_lines) && strpos($pot_lines[$i], 'msgstr "') === 0) {
            $i++;
            while ($i < count($pot_lines) && strpos($pot_lines[$i], '"') === 0) {
                $i++;
            }
        }

        // Add comments to output
        foreach ($comment_buffer as $comment) {
            $output_lines[] = $comment;
        }
        $comment_buffer = [];

        // Add msgid
        $output_lines[] = 'msgid "' . $msgid . '"';

        // Add msgstr with translation
        if (isset($all_translations[$msgid]) && $all_translations[$msgid] !== '') {
            $output_lines[] = 'msgstr "' . $all_translations[$msgid] . '"';
            $translated_count++;
        } else {
            // For untranslated strings, use the English text as fallback
            $output_lines[] = 'msgstr "' . $msgid . '"';
            $untranslated_count++;
            echo "Warning: No translation for: " . substr($msgid, 0, 50) . "...\n";
        }

        $output_lines[] = '';
        continue;
    }

    $i++;
}

echo "\nTranslation summary:\n";
echo "- Translated strings: {$translated_count}\n";
echo "- Untranslated (using English fallback): {$untranslated_count}\n";
echo "- Total strings: " . ($translated_count + $untranslated_count) . "\n";

// Write output file
$output_content = implode("\n", $output_lines);
file_put_contents($output_file, $output_content);

echo "\n✓ Successfully merged and translated PO file!\n";
echo "Output: {$output_file}\n";
echo "File size: " . filesize($output_file) . " bytes\n";
echo "Lines: " . count($output_lines) . "\n";
