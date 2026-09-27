# Translation Audit Report - Arqam Web Theme

**Audit Date:** 2026-09-27  
**Scope:** Main WordPress template files  
**Text Domain:** `arqamweb`

---

## Executive Summary

This audit reviews the main template files of the Arqam Web WordPress theme to identify hard-coded strings that need to be wrapped in WordPress translation functions for proper bilingual support (English/Arabic).

### Audit Status by Template

| Template | Status | Hard-coded Strings Found |
|----------|--------|--------------------------|
| header.php | ✅ Pass | 0 |
| footer.php | ✅ Pass | 0 |
| index.php | ✅ Pass | 0 |
| home.php | ⚠️ Issues Found | 4 instances |
| archive.php | ✅ Pass | 0 |
| single.php | ⚠️ Issues Found | 2 instances |
| search.php | ✅ Pass | 0 |
| 404.php | ✅ Pass | 0 |

---

## 1. Main Templates Audit

### 1.1 header.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All user-facing strings use proper WordPress translation functions
- Correct usage of `esc_html_e()`, `esc_attr_e()`, `esc_html__()`, `esc_attr__()`
- Text domain `arqamweb` consistently applied
- Examples of correct implementation:
  ```php
  esc_html_e('Skip to content', 'arqamweb');
  esc_attr_e('Toggle menu', 'arqamweb');
  esc_html_e('Request a Quote', 'arqamweb');
  esc_html_e('Navigation', 'arqamweb');
  ```

---

### 1.2 footer.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All user-facing strings use proper WordPress translation functions
- Social media aria-labels properly translated
- Footer sections, navigation, and legal links all translatable
- Examples of correct implementation:
  ```php
  esc_attr_e('Facebook', 'arqamweb');
  esc_html_e('Company', 'arqamweb');
  esc_html_e('Services', 'arqamweb');
  esc_html_e('Get in touch', 'arqamweb');
  esc_html_e('Privacy Policy', 'arqamweb');
  ```

---

### 1.3 index.php ✅

**Status:** PASS - No user-facing hard-coded strings

**Findings:**
- Template uses WordPress loop functions and template parts
- No direct user-facing strings requiring translation
- Uses standard WordPress functions: `single_post_title()`, `get_template_part()`, `the_posts_navigation()`

---

### 1.4 home.php ⚠️

**Status:** ISSUES FOUND - 4 instances of hard-coded strings

**Hard-coded Strings Identified:**

#### Issue #1: Fallback Category Name (Line 18)
```php
// Current code:
$first_cat_fn = function ($post_id) {
    $cats = get_the_category($post_id);
    return !empty($cats) ? esc_html($cats[0]->name) : 'General';
};
```

**Problem:** `'General'` is hard-coded in English  
**Impact:** Arabic users will see "General" instead of translated text  
**Recommended Fix:**
```php
return !empty($cats) ? esc_html($cats[0]->name) : esc_html__('General', 'arqamweb');
```

---

#### Issue #2: Fallback Category Name (Line 100)
```php
// Current code:
'cat' => !empty($fcats) ? esc_html($fcats[0]->name) : 'General',
```

**Problem:** `'General'` is hard-coded in English  
**Impact:** Arabic users will see "General" instead of translated text  
**Recommended Fix:**
```php
'cat' => !empty($fcats) ? esc_html($fcats[0]->name) : esc_html__('General', 'arqamweb'),
```

---

#### Issue #3: Language Labels (Line 182)
```php
// Current code:
<span>EN / AR</span>
```

**Problem:** Language labels are hard-coded  
**Impact:** Cannot be customized or translated for different language pairs  
**Recommended Fix:**
```php
<span><?php esc_html_e('EN / AR', 'arqamweb'); ?></span>
```

**Note:** Consider making this dynamic based on available languages or using language switcher if WPML/Polylang is active.

---

#### Issue #4: Fallback Category Name (Line 284)
```php
// Current code:
$gcat = !empty($gcats) ? esc_html($gcats[0]->name) : 'General';
```

**Problem:** `'General'` is hard-coded in English  
**Impact:** Arabic users will see "General" instead of translated text  
**Recommended Fix:**
```php
$gcat = !empty($gcats) ? esc_html($gcats[0]->name) : esc_html__('General', 'arqamweb');
```

---

### 1.5 archive.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- Archive type labels properly translated using `__()` function
- Pagination labels correctly implemented
- Empty state messages properly translatable
- Plural forms correctly handled with `_n()`
- Examples:
  ```php
  __('Category', 'arqamweb');
  __('Tag', 'arqamweb');
  __('Author', 'arqamweb');
  _n('essay', 'essays', $total_posts, 'arqamweb');
  ```

---

### 1.6 single.php ⚠️

**Status:** ISSUES FOUND - 2 instances of potentially hard-coded strings

**Hard-coded Strings Identified:**

#### Issue #1: Social Media Platform Names (Lines 185, 191)
```php
// Current code (Line 185):
X / Twitter

// Current code (Line 191):
LinkedIn
```

**Problem:** Social media platform names are not wrapped in translation functions  
**Impact:** Minor - Platform names are typically kept in English, but for consistency with translation best practices, they should be translatable  
**Severity:** LOW (Platform names are brand names and often remain in English)  
**Recommended Fix:**
```php
// Line 185:
<?php esc_html_e('X / Twitter', 'arqamweb'); ?>

// Line 191:
<?php esc_html_e('LinkedIn', 'arqamweb'); ?>
```

**Alternative Approach:** These could remain as-is if the theme guidelines specify that brand/platform names should not be translated. This is a common practice.

---

### 1.7 search.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- Search form placeholder properly translatable
- Result messages use `_n()` for plural forms
- Empty state messages properly translated
- Popular topics section properly translatable
- Examples:
  ```php
  esc_attr_e('Search essays, topics, authors…', 'arqamweb');
  _n('%d result found', '%d results found', $total_results, 'arqamweb');
  esc_html_e('No results for "%s"', 'arqamweb');
  ```

---

### 1.8 404.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All error messages properly translatable
- CTA buttons properly implemented
- Quick links section properly translatable
- Search form properly translatable
- Examples:
  ```php
  esc_html_e('Page not found', 'arqamweb');
  esc_html_e("This page took a wrong turn.", 'arqamweb');
  esc_html_e("Let's get you back.", 'arqamweb');
  esc_html_e('Back to home', 'arqamweb');
  ```

---

## 3. Summary of Issues

### Critical Issues: 0
No critical issues found.

### High Priority Issues: 64
All found in frontpage template parts - content arrays with hard-coded strings:
- **frontpage-contact.php**: 8 contact stat strings (values and labels)
- **frontpage-find_us.php**: 11 country names
- **frontpage-numbers.php**: 8 statistics (labels and notes)
- **frontpage-services.php**: 16 service strings (titles, eyebrows, descriptions, tags)
- **frontpage-slider.php**: 8 hero metrics (values and labels)
- **frontpage-why_us.php**: 12 why items (titles and descriptions)
- **frontpage-reviews.php**: 1 rating format string

### Medium Priority Issues: 4
All found in `home.php`:
1. Line 18: Hard-coded `'General'` category fallback
2. Line 100: Hard-coded `'General'` category fallback
3. Line 182: Hard-coded `'EN / AR'` language labels
4. Line 284: Hard-coded `'General'` category fallback

### Low Priority Issues: 2
All found in `single.php`:
1. Line 185: Social media platform name "X / Twitter" (optional translation)
2. Line 191: Social media platform name "LinkedIn" (optional translation)

### Total Issues: 70 instances
- **High Priority**: 64 instances (frontpage components)
- **Medium Priority**: 4 instances (main templates)
- **Low Priority**: 2 instances (optional)

---

## 4. Recommendations

### Immediate Actions Required (Priority: HIGH)

#### Frontpage Template Parts (64 strings)

1. **frontpage-contact.php - Contact Stats Array**
   - Wrap all 8 stat values and labels in `__()` function
   - Move inline array to properly formatted variable with translation functions
   - Update output to use `esc_html()` for escaped output

2. **frontpage-find_us.php - Country Names**
   - Wrap all 11 country names in `__()` function in the `$countries` array
   - Ensure output uses `esc_html()` for proper escaping

3. **frontpage-numbers.php - Statistics**
   - Wrap all 8 stat labels and notes in `__()` function in the `$stats` array
   - Remove duplicate `__()` calls in output (use `esc_html()` only)

4. **frontpage-services.php - Services Content**
   - Wrap all 16 service strings (titles, eyebrows, descriptions, tags) in `__()` function
   - Ensure all nested array items (tags) are individually wrapped
   - Remove duplicate `__()` in output line 57

5. **frontpage-slider.php - Hero Metrics**
   - Convert inline array to `$heroMetrics` variable
   - Wrap all 8 metric values and labels in `__()` function
   - Simplify output to use `esc_html()` only

6. **frontpage-why_us.php - Why Items**
   - Wrap all 12 titles and descriptions in `__()` function in the `$whyItems` array
   - Remove duplicate `__()` calls in output (lines 29-30)

7. **frontpage-reviews.php - Rating Display**
   - Wrap rating format string in `__()` function for consistency

#### Main Templates (4 strings)

1. **Fix home.php Category Fallbacks**
   - Replace all instances of hard-coded `'General'` with `esc_html__('General', 'arqamweb')`
   - Locations: Lines 18, 100, 284

2. **Fix home.php Language Labels**
   - Wrap `EN / AR` in translation function on line 182
   - Consider making this dynamic based on active languages

### Optional Improvements (Priority: LOW)

1. **Single.php Social Media Labels**
   - Review theme guidelines on translating brand names
   - If translating, wrap platform names in translation functions
   - Consider using aria-labels for accessibility that can be translated while keeping visible brand names in English

### Implementation Pattern for Array-based Content

Many frontpage components use arrays to define content. The correct pattern is:

```php
// ❌ INCORRECT - Hard-coded strings
$items = [
    ['title' => 'Some Title', 'copy' => 'Some text'],
];

// ✅ CORRECT - Translatable strings
$items = [
    ['title' => __('Some Title', 'arqamweb'), 'copy' => __('Some text', 'arqamweb')],
];

// Output
foreach ($items as $item) {
    // ❌ INCORRECT - Double translation
    echo esc_html(__($item['title'], 'arqamweb'));
    
    // ✅ CORRECT - Single escaping only
    echo esc_html($item['title']);
}
```

### Best Practices Observed

The theme generally follows WordPress translation best practices:
- ✅ Consistent use of `arqamweb` text domain
- ✅ Proper escaping with translation functions (`esc_html_e`, `esc_attr_e`)
- ✅ Correct use of plural forms with `_n()`
- ✅ Context provided in translator comments where needed
- ✅ Proper use of `printf()` with `esc_html__()` for dynamic strings

### Areas Needing Improvement

- ⚠️ Array-based content often hard-coded without translation wrappers
- ⚠️ Some templates have duplicate `__()` calls (wrapping in array AND output)
- ⚠️ Inline arrays in foreach loops make translation harder to manage

---

## 6. Testing Recommendations

After implementing fixes:

### 1. Generate Translation Template
```bash
wp i18n make-pot . languages/arqamweb.pot
```

### 2. Verify Frontpage Strings in .pot File
Search for these key strings to confirm they're extractable:
- Country names: "Egypt", "Saudi Arabia", "United Arab Emirates"
- Service titles: "Website Design & Development", "Search Engine Optimization"
- Why items: "Custom-built, never templated", "SEO-ready from day one"
- Stats: "Years of experience", "Countries served"
- Contact stats: "Avg. response time", "Available all week"

### 3. Verify Main Template Strings in .pot File
- Search for "General" category fallback
- Verify "EN / AR" language label appears
- Check social media platform names if included

### 4. Test with RTL (Arabic) Language
**Main Templates:**
- Switch site to Arabic
- Check category fallbacks on posts without categories
- Verify language labels on home page

**Frontpage Components:**
- Load homepage in Arabic
- Verify all sections display Arabic translations:
  - Hero slider metrics
  - Services section (all titles, descriptions, tags)
  - Why Us items (titles and descriptions)
  - Statistics section (labels and notes)
  - Contact stats grid
  - Find Us section (country names)
  - Reviews section (rating format)

### 5. Visual QA in Arabic
- Check text alignment (RTL)
- Verify stat values remain properly formatted
- Ensure country names display correctly
- Check that service tags wrap properly in Arabic
- Verify all arrays maintain proper structure

### 6. Use Translation Plugin
- Install Loco Translate or Poedit
- Translate sample strings from each frontpage component
- Verify all 64 frontpage strings are available for translation
- Test that translations display correctly on frontend
- Check for any encoding issues with Arabic text

### 7. Regression Testing
After implementing fixes, test that:
- All frontpage components still render correctly
- No PHP warnings or errors appear
- Arrays are properly formatted
- Duplicate `__()` calls are removed
- Output escaping (`esc_html()`) is consistently applied

---

## 2. Frontpage Template Parts Audit

This section audits all 13 frontpage component files in `template-parts/frontpage/` for hard-coded strings.

### Audit Status by Component

| Component | Status | Hard-coded Strings Found |
|-----------|--------|--------------------------|
| frontpage-blog.php | ✅ Pass | 0 |
| frontpage-contact.php | ⚠️ Issues Found | 8 instances |
| frontpage-faqs.php | ✅ Pass | 0 |
| frontpage-find_us.php | ⚠️ Issues Found | 11 instances |
| frontpage-founder.php | ✅ Pass | 0 |
| frontpage-numbers.php | ⚠️ Issues Found | 8 instances |
| frontpage-partners.php | ✅ Pass | 0 |
| frontpage-projects.php | ✅ Pass | 0 |
| frontpage-reviews.php | ⚠️ Issues Found | 1 instance |
| frontpage-services.php | ⚠️ Issues Found | 16 instances |
| frontpage-slider.php | ⚠️ Issues Found | 8 instances |
| frontpage-testimonials.php | ✅ Pass | 0 |
| frontpage-why_us.php | ⚠️ Issues Found | 12 instances |

---

### 2.1 frontpage-blog.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All user-facing strings use proper WordPress translation functions
- Section headings, CTAs, and navigation properly wrapped
- Examples:
  ```php
  esc_html_e('Field notes', 'arqamweb');
  esc_html_e('Latest from the', 'arqamweb');
  esc_html_e('All articles', 'arqamweb');
  ```

---

### 2.2 frontpage-contact.php ⚠️

**Status:** ISSUES FOUND - 8 instances in stats array

**Hard-coded Strings Identified:**

#### Issue #1: Contact Stats Array (Line 36-44)
```php
// Current code:
<?php foreach ([['< 1m', 'Avg. response time'], ['7 days', 'Available all week'], ['AR · EN', 'Bilingual team'], ['Free', 'Discovery call']] as $contactStat) : ?>
    <div class="text-2xl lg:text-3xl font-semibold"><?php echo $contactStat[0]; ?></div>
    <div class="text-xs text-primary-foreground/75 mt-0.5"><?php echo $contactStat[1]; ?></div>
<?php endforeach; ?>
```

**Problem:** All stat values and labels are hard-coded in English without translation functions  
**Impact:** Arabic users will see English-only statistics  
**Hard-coded strings:**
- `'< 1m'` (value)
- `'Avg. response time'` (label)
- `'7 days'` (value)
- `'Available all week'` (label)
- `'AR · EN'` (value)
- `'Bilingual team'` (label)
- `'Free'` (value)
- `'Discovery call'` (label)

**Recommended Fix:**
```php
<?php 
$contactStats = [
    [__('< 1m', 'arqamweb'), __('Avg. response time', 'arqamweb')],
    [__('7 days', 'arqamweb'), __('Available all week', 'arqamweb')],
    [__('AR · EN', 'arqamweb'), __('Bilingual team', 'arqamweb')],
    [__('Free', 'arqamweb'), __('Discovery call', 'arqamweb')]
];
foreach ($contactStats as $contactStat) : ?>
    <div class="text-2xl lg:text-3xl font-semibold"><?php echo esc_html($contactStat[0]); ?></div>
    <div class="text-xs text-primary-foreground/75 mt-0.5"><?php echo esc_html($contactStat[1]); ?></div>
<?php endforeach; ?>
```

---

### 2.3 frontpage-faqs.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- Section headings properly wrapped
- Examples:
  ```php
  esc_html_e('Questions, answered', 'arqamweb');
  esc_html_e('Frequently asked', 'arqamweb');
  ```

---

### 2.4 frontpage-find_us.php ⚠️

**Status:** ISSUES FOUND - 11 country names in array

**Hard-coded Strings Identified:**

#### Issue #1: Countries Array (Lines 6-18)
```php
// Current code:
$countries = [
    ['name' => 'Egypt', 'code' => 'eg'],
    ['name' => 'Saudi Arabia', 'code' => 'sa'],
    ['name' => 'United Arab Emirates', 'code' => 'ae'],
    ['name' => 'Kuwait', 'code' => 'kw'],
    ['name' => 'Oman', 'code' => 'om'],
    ['name' => 'Qatar', 'code' => 'qa'],
    ['name' => 'United States', 'code' => 'us'],
    ['name' => 'United Kingdom', 'code' => 'gb'],
    ['name' => 'Ireland', 'code' => 'ie'],
    ['name' => 'Germany', 'code' => 'de'],
    ['name' => 'Spain', 'code' => 'es'],
];
```

**Problem:** All country names are hard-coded in English  
**Impact:** Arabic users will see country names in English instead of Arabic  
**Hard-coded strings:** 11 country names

**Recommended Fix:**
```php
$countries = [
    ['name' => __('Egypt', 'arqamweb'), 'code' => 'eg'],
    ['name' => __('Saudi Arabia', 'arqamweb'), 'code' => 'sa'],
    ['name' => __('United Arab Emirates', 'arqamweb'), 'code' => 'ae'],
    ['name' => __('Kuwait', 'arqamweb'), 'code' => 'kw'],
    ['name' => __('Oman', 'arqamweb'), 'code' => 'om'],
    ['name' => __('Qatar', 'arqamweb'), 'code' => 'qa'],
    ['name' => __('United States', 'arqamweb'), 'code' => 'us'],
    ['name' => __('United Kingdom', 'arqamweb'), 'code' => 'gb'],
    ['name' => __('Ireland', 'arqamweb'), 'code' => 'ie'],
    ['name' => __('Germany', 'arqamweb'), 'code' => 'de'],
    ['name' => __('Spain', 'arqamweb'), 'code' => 'es'],
];
```

**Also update output (Line 40):**
```php
// Current:
<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php echo $country['name']; ?></div>

// Fixed:
<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php echo esc_html($country['name']); ?></div>
```

---

### 2.5 frontpage-founder.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All biographical text properly wrapped
- Image alt text properly translatable
- Button labels properly translatable
- Examples:
  ```php
  esc_attr_e('Youssef Salah Hassanein — Founder of Arqam Web', 'arqamweb');
  esc_html_e('Meet the founder', 'arqamweb');
  esc_html_e('The founder behind', 'arqamweb');
  ```

---

### 2.6 frontpage-numbers.php ⚠️

**Status:** ISSUES FOUND - 8 instances in stats array

**Hard-coded Strings Identified:**

#### Issue #1: Stats Array (Lines 3-8)
```php
// Current code:
$stats = [
    ['value' => '15+', 'label' => 'Years of experience', 'note' => 'since 2010'],
    ['value' => '10+', 'label' => 'Countries served', 'note' => 'GCC · MENA · UK · USA'],
    ['value' => '92%', 'label' => 'Client retention', 'note' => 'long-term partnerships'],
    ['value' => '4.9★', 'label' => 'Average client rating', 'note' => 'out of 5.0'],
];
```

**Problem:** All stat labels and notes are hard-coded in English  
**Impact:** Arabic users will see English-only statistics  
**Hard-coded strings:** 8 instances (4 labels + 4 notes)

**Recommended Fix:**
```php
$stats = [
    ['value' => '15+', 'label' => __('Years of experience', 'arqamweb'), 'note' => __('since 2010', 'arqamweb')],
    ['value' => '10+', 'label' => __('Countries served', 'arqamweb'), 'note' => __('GCC · MENA · UK · USA', 'arqamweb')],
    ['value' => '92%', 'label' => __('Client retention', 'arqamweb'), 'note' => __('long-term partnerships', 'arqamweb')],
    ['value' => '4.9★', 'label' => __('Average client rating', 'arqamweb'), 'note' => __('out of 5.0', 'arqamweb')],
];
```

**Also update output (Lines 56-57):**
```php
// Current:
<div class="relative mt-5 text-base font-semibold text-primary-foreground"><?php echo esc_html(__($stat['label'], 'arqamweb')); ?></div>
<div class="relative text-sm text-primary-foreground/55 mt-1"><?php echo esc_html(__($stat['note'], 'arqamweb')); ?></div>

// Fixed (already using __, just need to ensure array uses __):
<div class="relative mt-5 text-base font-semibold text-primary-foreground"><?php echo esc_html($stat['label']); ?></div>
<div class="relative text-sm text-primary-foreground/55 mt-1"><?php echo esc_html($stat['note']); ?></div>
```

---

### 2.7 frontpage-partners.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- Section headings properly wrapped
- Partner names are brand names and typically not translated (correct approach)
- Examples:
  ```php
  esc_html_e('Our success partners', 'arqamweb');
  esc_html_e('Powered by the platforms that', 'arqamweb');
  ```

---

### 2.8 frontpage-projects.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- CTA button properly wrapped
- Example:
  ```php
  esc_html__('View All Projects', 'arqamweb');
  ```

---

### 2.9 frontpage-reviews.php ⚠️

**Status:** ISSUES FOUND - 1 instance

**Hard-coded Strings Identified:**

#### Issue #1: Rating Value (Line 18)
```php
// Current code:
<span class="font-semibold text-foreground">4.9 / 5</span>
```

**Problem:** Rating format is hard-coded  
**Impact:** MINOR - Numeric format, but should be translatable for consistency  
**Severity:** LOW

**Recommended Fix:**
```php
<span class="font-semibold text-foreground"><?php echo esc_html__('4.9 / 5', 'arqamweb'); ?></span>
```

**Note:** Consider making this dynamic if rating is pulled from database/API.

---

### 2.10 frontpage-services.php ⚠️

**Status:** ISSUES FOUND - 16 instances in services array

**Hard-coded Strings Identified:**

#### Issue #1: Services Array (Lines 6-35)
```php
// Current code:
$services = [
    [
        'title' => 'Website Design & Development',
        'eyebrow' => 'Custom-built. Performance-obsessed.',
        'copy' => 'Bespoke websites and platforms — engineered on a clean, scalable codebase that loads fast, ranks well, and converts.',
        'tags' => ['UX & visual design', 'Headless / WordPress / custom', 'Core Web Vitals tuned'],
        'icon' => 'website',
    ],
    // ... 3 more services
];
```

**Problem:** All service titles, eyebrows, descriptions, and tags are hard-coded  
**Impact:** Arabic users will see English-only service information  
**Hard-coded strings:** 16 instances (4 titles + 4 eyebrows + 4 descriptions + 12 tags across 4 services)

**Recommended Fix:**
```php
$services = [
    [
        'title' => __('Website Design & Development', 'arqamweb'),
        'eyebrow' => __('Custom-built. Performance-obsessed.', 'arqamweb'),
        'copy' => __('Bespoke websites and platforms — engineered on a clean, scalable codebase that loads fast, ranks well, and converts.', 'arqamweb'),
        'tags' => [
            __('UX & visual design', 'arqamweb'),
            __('Headless / WordPress / custom', 'arqamweb'),
            __('Core Web Vitals tuned', 'arqamweb')
        ],
        'icon' => 'website',
    ],
    [
        'title' => __('Search Engine Optimization', 'arqamweb'),
        'eyebrow' => __('Rank where buying happens.', 'arqamweb'),
        'copy' => __('Technical SEO, content architecture and authority building — engineered for both Google and the new AI search surfaces.', 'arqamweb'),
        'tags' => [
            __('Technical audit & fixes', 'arqamweb'),
            __('Keyword & topic strategy', 'arqamweb'),
            __('Authority & links', 'arqamweb')
        ],
        'icon' => 'search',
    ],
    [
        'title' => __('Brand Identity', 'arqamweb'),
        'eyebrow' => __('Brands worth remembering.', 'arqamweb'),
        'copy' => __('Logo systems, typography and the full visual language — across digital, print and packaging — that defines how the world sees you.', 'arqamweb'),
        'tags' => [
            __('Logo & marks', 'arqamweb'),
            __('Type & color systems', 'arqamweb'),
            __('Brand guidelines', 'arqamweb')
        ],
        'icon' => 'brand',
    ],
    [
        'title' => __('Social Media Marketing', 'arqamweb'),
        'eyebrow' => __('Audiences that convert.', 'arqamweb'),
        'copy' => __('Strategy, creative production, paid social and community management across Instagram, TikTok, LinkedIn, X and YouTube.', 'arqamweb'),
        'tags' => [
            __('Content strategy', 'arqamweb'),
            __('Creative production', 'arqamweb'),
            __('Paid social', 'arqamweb')
        ],
        'icon' => 'social',
    ],
];
```

**Also update output (Line 57):**
```php
// Current:
<span class="text-5xl lg:text-7xl xl:text-8xl font-semibold tracking-[-0.025em] text-[#4674b0]"><?php echo esc_html(__($service['title'], 'arqamweb')); ?></span>

// Fixed (remove duplicate __):
<span class="text-5xl lg:text-7xl xl:text-8xl font-semibold tracking-[-0.025em] text-[#4674b0]"><?php echo esc_html($service['title']); ?></span>
```

---

### 2.11 frontpage-slider.php ⚠️

**Status:** ISSUES FOUND - 8 instances

**Hard-coded Strings Identified:**

#### Issue #1: Hero Metrics Array (Line 80)
```php
// Current code:
<?php foreach ([['+15', 'Years experience'], ['+10', 'Countries served'], ['4.9★', 'Global client rating'], ['Web · SEO', 'Branding · Social']] as $metric) : ?>
    <div class="text-lg sm:text-xl font-semibold text-foreground tracking-tight"><?php echo $metric[0]; ?></div>
    <div class="text-xs text-muted-foreground leading-snug mt-0.5"><?php echo esc_html(__($metric[1], 'arqamweb')); ?></div>
<?php endforeach; ?>
```

**Problem:** Metric labels are hard-coded in the array, though output uses `__()`. The values are also hard-coded.  
**Impact:** Need to ensure consistency by wrapping in translation in the array definition  
**Hard-coded strings:** 8 instances (4 values + 4 labels)

**Recommended Fix:**
```php
<?php 
$heroMetrics = [
    [__('+15', 'arqamweb'), __('Years experience', 'arqamweb')],
    [__('+10', 'arqamweb'), __('Countries served', 'arqamweb')],
    [__('4.9★', 'arqamweb'), __('Global client rating', 'arqamweb')],
    [__('Web · SEO', 'arqamweb'), __('Branding · Social', 'arqamweb')]
];
foreach ($heroMetrics as $metric) : ?>
    <div class="text-lg sm:text-xl font-semibold text-foreground tracking-tight"><?php echo esc_html($metric[0]); ?></div>
    <div class="text-xs text-muted-foreground leading-snug mt-0.5"><?php echo esc_html($metric[1]); ?></div>
<?php endforeach; ?>
```

---

### 2.12 frontpage-testimonials.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All user-facing strings properly wrapped
- Aria-labels properly translatable
- Examples:
  ```php
  esc_html_e('VIDEO TESTIMONIALS', 'arqamweb');
  esc_html_e('Verified Client', 'arqamweb');
  esc_attr_e('Close video', 'arqamweb');
  ```

---

### 2.13 frontpage-why_us.php ⚠️

**Status:** ISSUES FOUND - 12 instances in why items array

**Hard-coded Strings Identified:**

#### Issue #1: Why Items Array (Lines 2-9)
```php
// Current code:
$whyItems = [
    ['title' => 'Custom-built, never templated', 'copy' => 'Every line of code, every pixel of design — written for your business, not pulled from a theme library.', 'icon' => 'code'],
    ['title' => 'SEO-ready from day one', 'copy' => 'Schema, semantic HTML, Core Web Vitals, indexable architecture — search-engine fundamentals are baked in, not bolted on.', 'icon' => 'search'],
    // ... 4 more items
];
```

**Problem:** All item titles and descriptions are hard-coded  
**Impact:** Arabic users will see English-only content  
**Hard-coded strings:** 12 instances (6 titles + 6 descriptions)

**Recommended Fix:**
```php
$whyItems = [
    [
        'title' => __('Custom-built, never templated', 'arqamweb'),
        'copy' => __('Every line of code, every pixel of design — written for your business, not pulled from a theme library.', 'arqamweb'),
        'icon' => 'code'
    ],
    [
        'title' => __('SEO-ready from day one', 'arqamweb'),
        'copy' => __('Schema, semantic HTML, Core Web Vitals, indexable architecture — search-engine fundamentals are baked in, not bolted on.', 'arqamweb'),
        'icon' => 'search'
    ],
    [
        'title' => __('Conversion-focused UX', 'arqamweb'),
        'copy' => __('We design for the action, not just the aesthetic. Every section is engineered to move the user one step closer to yes.', 'arqamweb'),
        'icon' => 'spark'
    ],
    [
        'title' => __('Performance you can measure', 'arqamweb'),
        'copy' => __('Sub-second loads, 95+ Lighthouse scores, and infrastructure that scales — performance is a feature, not a luxury.', 'arqamweb'),
        'icon' => 'bolt'
    ],
    [
        'title' => __('Long-term growth mindset', 'arqamweb'),
        'copy' => __("We're not a one-and-done vendor. We partner with clients for years, optimizing as the market — and your business — evolves.", 'arqamweb'),
        'icon' => 'growth'
    ],
    [
        'title' => __('Senior team, no hand-offs', 'arqamweb'),
        'copy' => __('The strategist who scopes your project also ships it. No junior shuffling, no broken telephone — direct access to expertise.', 'arqamweb'),
        'icon' => 'team'
    ],
];
```

**Also update output (Lines 29-30):**
```php
// Current:
<h3 class="font-semibold text-base group-hover:text-primary transition-colors"><?php echo esc_html(__($item['title'], 'arqamweb')); ?></h3>
<p class="mt-1.5 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html(__($item['copy'], 'arqamweb')); ?></p>

// Fixed (remove duplicate __):
<h3 class="font-semibold text-base group-hover:text-primary transition-colors"><?php echo esc_html($item['title']); ?></h3>
<p class="mt-1.5 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($item['copy']); ?></p>
```

---

### 2.14 Frontpage Summary of Issues

**Components requiring fixes: 7 of 13**

| Priority | Count | Description |
|----------|-------|-------------|
| High | 64 | Total hard-coded strings across all frontpage components |
| Medium | 52 | Content strings (titles, descriptions, labels) |
| Low | 12 | Numeric values and formatting |

**Breakdown by component:**
- frontpage-contact.php: 8 strings
- frontpage-find_us.php: 11 strings
- frontpage-numbers.php: 8 strings
- frontpage-reviews.php: 1 string
- frontpage-services.php: 16 strings
- frontpage-slider.php: 8 strings
- frontpage-why_us.php: 12 strings

**Total: 64 hard-coded strings to fix**

---

## 7. Files Affected Summary

### Main Templates

**Files requiring changes: 1**
- `home.php` - 4 hard-coded strings to fix

**Files requiring optional review: 1**
- `single.php` - 2 platform names (based on theme guidelines)

**Files passing audit: 6**
- `header.php` ✅
- `footer.php` ✅
- `index.php` ✅
- `archive.php` ✅
- `search.php` ✅
- `404.php` ✅

### Frontpage Template Parts

**Files requiring changes: 7 of 13**
- `template-parts/frontpage/frontpage-contact.php` - 8 hard-coded strings
- `template-parts/frontpage/frontpage-find_us.php` - 11 hard-coded strings
- `template-parts/frontpage/frontpage-numbers.php` - 8 hard-coded strings
- `template-parts/frontpage/frontpage-reviews.php` - 1 hard-coded string
- `template-parts/frontpage/frontpage-services.php` - 16 hard-coded strings
- `template-parts/frontpage/frontpage-slider.php` - 8 hard-coded strings
- `template-parts/frontpage/frontpage-why_us.php` - 12 hard-coded strings

**Files passing audit: 6 of 13**
- `template-parts/frontpage/frontpage-blog.php` ✅
- `template-parts/frontpage/frontpage-faqs.php` ✅
- `template-parts/frontpage/frontpage-founder.php` ✅
- `template-parts/frontpage/frontpage-partners.php` ✅
- `template-parts/frontpage/frontpage-projects.php` ✅
- `template-parts/frontpage/frontpage-testimonials.php` ✅

### Overall Statistics
- **Total files audited:** 21 (8 main templates + 13 frontpage components)
- **Files passing:** 12 (57%)
- **Files requiring fixes:** 8 (38%)
- **Files for optional review:** 1 (5%)
- **Total hard-coded strings identified:** 70 (4 in main templates + 64 in frontpage + 2 optional)

---

## Appendix: Translation Function Reference

For developer reference:

```php
// Translate and echo
esc_html_e('String', 'arqamweb');
esc_attr_e('String', 'arqamweb'); // For attributes

// Translate and return
esc_html__('String', 'arqamweb');
esc_attr__('String', 'arqamweb'); // For attributes

// Plurals
_n('Singular', 'Plural', $count, 'arqamweb');
esc_html(_n('Singular', 'Plural', $count, 'arqamweb'));

// With context (when same word has different meanings)
_x('String', 'context', 'arqamweb');

// With sprintf
printf(
    esc_html__('String with %s', 'arqamweb'),
    $variable
);
```

---

**End of Report**
