# Translation Audit Report - Arqam Web Theme

**Audit Date:** 2026-09-27  
**Scope:** Main WordPress template files  
**Text Domain:** `arqamweb`

---

## Executive Summary

This comprehensive audit reviews the Arqam Web WordPress theme to identify hard-coded strings that need to be wrapped in WordPress translation functions for proper bilingual support (English/Arabic). 

### Scope Coverage
The audit systematically examined **39 PHP files** across all major theme components:
- **Main template files** (8 files: header, footer, index, home, archive, single, search, 404)
- **Frontpage components** (13 files: all homepage section template-parts)
- **Content & page templates** (15 files: content templates, services, projects, pricing, reviews, about, quote, contact, partials)
- **Helper files** (3 files: acf-helpers.php, ajax-handlers.php, template-helpers.php)

### Overall Results
- **Total files audited:** 39
- **Files passing:** 28 (71.8%)
- **Files needing fixes:** 10 (25.6%)
- **Files with minor issues:** 1 (2.6%)
- **Total hard-coded strings identified:** 164

### Priority Breakdown by Severity
- 🔴 **CRITICAL:** 93 strings (email communication system in ajax-handlers.php)
- 🔴 **HIGH:** 64 strings (frontpage components - user-facing content arrays)
- 🟡 **MEDIUM:** 4 strings (main templates - category fallback text)
- 🟢 **LOW:** 3 strings (1 placeholder, 2 optional platform names)

### Business Impact
The most critical finding is the **email communication system** (`inc/helpers/ajax-handlers.php`) which sends English-only emails to all users regardless of site language. This directly impacts:
- Quote request submissions (primary lead generation channel)
- Professional perception of bilingual capabilities
- User experience for Arabic-speaking prospects
- Brand consistency in customer communications

---

## Files Checked - Complete Audit Status

### Main Templates (8 files)

| Template | Status | Hard-coded Strings | Severity |
|----------|--------|-------------------|----------|
| header.php | ✅ Pass | 0 | - |
| footer.php | ✅ Pass | 0 | - |
| index.php | ✅ Pass | 0 | - |
| home.php | ⚠️ Issues Found | 4 | Medium |
| archive.php | ✅ Pass | 0 | - |
| single.php | ⚠️ Optional Review | 2 | Low |
| search.php | ✅ Pass | 0 | - |
| 404.php | ✅ Pass | 0 | - |

### Frontpage Components (13 files)

| Component | Status | Hard-coded Strings | Severity |
|-----------|--------|-------------------|----------|
| frontpage-blog.php | ✅ Pass | 0 | - |
| frontpage-contact.php | ⚠️ Issues Found | 8 | High |
| frontpage-faqs.php | ✅ Pass | 0 | - |
| frontpage-find_us.php | ⚠️ Issues Found | 11 | High |
| frontpage-founder.php | ✅ Pass | 0 | - |
| frontpage-numbers.php | ⚠️ Issues Found | 8 | High |
| frontpage-partners.php | ✅ Pass | 0 | - |
| frontpage-projects.php | ✅ Pass | 0 | - |
| frontpage-reviews.php | ⚠️ Issues Found | 1 | High |
| frontpage-services.php | ⚠️ Issues Found | 16 | High |
| frontpage-slider.php | ⚠️ Issues Found | 8 | High |
| frontpage-testimonials.php | ✅ Pass | 0 | - |
| frontpage-why_us.php | ⚠️ Issues Found | 12 | High |

### Template Parts - Content & Pages (15 files)

| Template Part | Status | Hard-coded Strings | Severity |
|---------------|--------|-------------------|----------|
| content/content-none.php | ✅ Pass | 0 | - |
| content/content-page.php | ✅ Pass | 0 | - |
| content/content-project.php | ✅ Pass | 0 | - |
| content/content-review.php | ⚠️ Minor Issue | 1 | Low |
| content/content-search.php | ✅ Pass | 0 | - |
| content/content.php | ✅ Pass | 0 | - |
| services.php | ✅ Pass | 0 | - |
| projects.php | ✅ Pass | 0 | - |
| pricing.php | ✅ Pass | 0 | - |
| pricing-v2.php | ✅ Pass | 0 | - |
| reviews.php | ✅ Pass | 0 | - |
| about.php | ✅ Pass | 0 | - |
| quote.php | ✅ Pass | 0 | - |
| contact.php | ✅ Pass | 0 | - |
| partials/floating-contact.php | ✅ Pass | 0 | - |

### Helper Files (3 files)

| Helper File | Status | Hard-coded Strings | Severity |
|-------------|--------|-------------------|----------|
| inc/helpers/acf-helpers.php | ✅ Pass | 0 | - |
| inc/helpers/ajax-handlers.php | 🔴 CRITICAL | 93 | Critical |
| inc/helpers/template-helpers.php | ✅ Pass | 0 | - |

### Summary Statistics

- **Total files audited:** 39
- **Files passing (✅):** 28 (71.8%)
- **Files requiring fixes (⚠️):** 10 (25.6%)
- **Files with minor issues:** 1 (2.6%)
- **Total hard-coded strings:** 164

---

## Critical Issues (93 strings)

### 🔴 Priority: CRITICAL - Email Communication System

**File:** `inc/helpers/ajax-handlers.php`  
**Function:** `arqamweb_handle_quote_request()`  
**Lines:** 107-278  
**Impact:** Business-critical - Primary lead generation channel sends English-only emails

#### Problem Summary
The quote request handler constructs email bodies with 93 hard-coded English strings, affecting all three quote form types (branding, website, SEO). Arabic-speaking users receive completely English emails regardless of site language.

#### Breakdown of Issues

**Section Headers (25 instances):**
- `"── Contact ───────────────────────────────"` (Line 107)
- `"── Project Overview ────────────────────"` (Line 118)
- `"── Branding Level ───────────────────────"` (Line 131)
- `"── Logo Status ─────────────────────────"` (Line 134)
- `"── Brand Assets ─────────────────────────"` (Line 145)
- `"── Execution Details ──────────────────────"` (Line 150)
- `"── Strategy ──────────────────────────────"` (Line 156)
- `"── Decision & Communication ────────────────"` (Line 163)
- `"── Investment & Timeline ───────────────────"` (Line 168)
- `"── Website Status ────────────────────────"` (Line 176)
- `"── Website Type ──────────────────────────"` (Line 182)
- `"── Project Scope ─────────────────────────"` (Line 188)
- `"── Features ──────────────────────────────"` (Line 196)
- `"── Design & Branding ─────────────────────"` (Line 201)
- `"── Audience & Objectives ────────────────────"` (Line 206)
- Plus 10 more section headers

**Field Labels (68 instances):**

*Contact Section:*
- `'Name:    '`, `'Phone:   '`, `'Email:   '`, `'Company: '`, `'Role:    '`

*Project Overview Section:*
- `'Industry: '`, `'Target Market: '`, `'Business Type: '`, `'Business Stage: '`, `'Has Investment: '`, `'Website/Social Link: '`

*Branding Service Section:*
- `'Level: '`, `'Logo Status: '`, `'Designer: '`, `'Has Source Files: '`, `'Reason: '`, `'Assets: '`, `'Other: '`, `'Content Writing: '`, `'Translation: '`, `'Product Count: '`, `'Branches Count: '`, `'Objective:'`, `'Audience:'`, `'Competitors:'`, `'Brand Personality: '`, `'Success Metrics: '`, `'Decision Maker: '`, `'Urgency: '`, `'Communication: '`, `'Budget Level: '`, `'Start Date: '`, `'Launch Date: '`, `'Referral: '`

*Website Service Section:*
- `'Website Status: '`, `'Website URL: '`, `'Website Issue:'`, `'Has Investment: '`, `'Website Type: '`, `'Page Count: '`, `'Expected Sections:'`, `'Require CMS: '`, `'CMS Elements: '`, `'Other: '`, `'Features: '`, `'Has Visual Identity: '`, `'Follow Existing Brand: '`, `'Reference Websites:'`, `'Target Audience:'`, `'Primary Objective: '`, `'Success Measurement:'`, `'Execution Level: '`, `'Has Fixed Launch Date: '`

*SEO Service Section:*
- `'Website Live: '`, `'Previous SEO Work: '`, `'SEO Challenges:'`, `'Analytics Tools: '`, `'Has Previous Reports: '`, `'Monthly Traffic: '`, `'Primary SEO Goal: '`, `'Target Keywords:'`, `'SEO Focus: '`, `'Knows Ranking Position: '`, `'Internal Content Team: '`, `'Publish Blog Regularly: '`, `'Article Count: '`, `'Content Writing Required: '`, `'Technical SEO Done: '`, `'Website Platform: '`, `'Speed Issues: '`

#### Business Impact
- **Customer Experience:** Arabic users see unprofessional English emails
- **Brand Perception:** Undermines bilingual expertise claims
- **Lead Quality:** Potential confusion for non-English speakers
- **Conversion Impact:** May deter Arabic-speaking prospects

#### Recommended Fix Pattern
```php
// ❌ INCORRECT - Hard-coded English
$body = "── Contact ───────────────────────────────\n";
$body .= 'Name:    ' . $full_name . "\n";

// ✅ CORRECT - Translatable
$body = __('── Contact ───────────────────────────────', 'arqamweb') . "\n";
$body .= __('Name:', 'arqamweb') . '    ' . $full_name . "\n";
```

#### Testing Requirements
1. Submit quote forms in English mode → verify English emails
2. Switch site to Arabic → submit forms → verify Arabic emails
3. Check RTL formatting for Arabic email content
4. Test all three quote types (branding, website, SEO)
5. Use WP_DEBUG mode to log emails instead of sending during testing

---

## High Priority Issues (64 strings)

### 🔴 Priority: HIGH - Frontpage Component Arrays

All issues found in homepage template-parts with array-based content that's not wrapped in translation functions.

#### Common Pattern Problem
```php
// ❌ INCORRECT - Hard-coded array values
$items = [
    ['title' => 'Hard-coded Title', 'copy' => 'Hard-coded text']
];
foreach ($items as $item) {
    echo esc_html(__($item['title'], 'arqamweb')); // Double translation
}

// ✅ CORRECT - Translatable array values
$items = [
    ['title' => __('Translatable Title', 'arqamweb'), 'copy' => __('Translatable text', 'arqamweb')]
];
foreach ($items as $item) {
    echo esc_html($item['title']); // Single escaping only
}
```

#### Files and String Counts

| File | Strings | Issue Type |
|------|---------|------------|
| frontpage-services.php | 16 | Service titles, eyebrows, descriptions, tags |
| frontpage-why_us.php | 12 | Why item titles and descriptions |
| frontpage-find_us.php | 11 | Country names |
| frontpage-contact.php | 8 | Contact stat values and labels |
| frontpage-numbers.php | 8 | Statistic labels and notes |
| frontpage-slider.php | 8 | Hero metric values and labels |
| frontpage-reviews.php | 1 | Rating format string |
| **TOTAL** | **64** | - |

#### Detailed Breakdown

**1. frontpage-services.php (16 strings) - Lines 6-35**
- 4 service titles: "Website Design & Development", "Search Engine Optimization", "Brand Identity", "Social Media Marketing"
- 4 service eyebrows: "Custom-built. Performance-obsessed.", etc.
- 4 service descriptions (long-form copy)
- 12 service tags (3 tags × 4 services)

**2. frontpage-why_us.php (12 strings) - Lines 2-9**
- 6 why item titles: "Custom-built, never templated", "SEO-ready from day one", etc.
- 6 why item descriptions (long-form copy)

**3. frontpage-find_us.php (11 strings) - Lines 6-18**
- 11 country names: Egypt, Saudi Arabia, UAE, Kuwait, Oman, Qatar, USA, UK, Ireland, Germany, Spain

**4. frontpage-contact.php (8 strings) - Line 36-44**
- 4 stat values: "< 1m", "7 days", "AR · EN", "Free"
- 4 stat labels: "Avg. response time", "Available all week", "Bilingual team", "Discovery call"

**5. frontpage-numbers.php (8 strings) - Lines 3-8**
- 4 stat labels: "Years of experience", "Countries served", "Client retention", "Average client rating"
- 4 stat notes: "since 2010", "GCC · MENA · UK · USA", "long-term partnerships", "out of 5.0"

**6. frontpage-slider.php (8 strings) - Line 80**
- 4 metric values: "+15", "+10", "4.9★", "Web · SEO"
- 4 metric labels: "Years experience", "Countries served", "Global client rating", "Branding · Social"

**7. frontpage-reviews.php (1 string) - Line 18**
- Rating format: "4.9 / 5"

#### Impact
These are all **user-facing homepage content** that Arabic visitors see in English. The homepage is the primary entry point for prospects evaluating Arqam Web's bilingual capabilities.

---

## Medium Priority Issues (4 strings)

### 🟡 Priority: MEDIUM - Template Fallback Text

**File:** `home.php`  
**Impact:** Displays English fallback text when posts lack categories

#### Issue #1-3: Category Fallback 'General' (Lines 18, 100, 284)

```php
// ❌ Current code (Line 18):
return !empty($cats) ? esc_html($cats[0]->name) : 'General';

// ❌ Current code (Line 100):
'cat' => !empty($fcats) ? esc_html($fcats[0]->name) : 'General',

// ❌ Current code (Line 284):
$gcat = !empty($gcats) ? esc_html($gcats[0]->name) : 'General';
```

**Fix:**
```php
// ✅ Corrected:
return !empty($cats) ? esc_html($cats[0]->name) : esc_html__('General', 'arqamweb');
'cat' => !empty($fcats) ? esc_html($fcats[0]->name) : esc_html__('General', 'arqamweb'),
$gcat = !empty($gcats) ? esc_html($gcats[0]->name) : esc_html__('General', 'arqamweb');
```

#### Issue #4: Language Labels (Line 182)

```php
// ❌ Current code:
<span>EN / AR</span>
```

**Fix:**
```php
// ✅ Corrected:
<span><?php esc_html_e('EN / AR', 'arqamweb'); ?></span>
```

**Note:** Consider making this dynamic based on active languages or using WPML language switcher.

---

## Low Priority Issues (3 strings)

### 🟢 Priority: LOW - Optional/Minor

#### Issue #1: Placeholder Role Text

**File:** `template-parts/content/content-review.php`  
**Line:** 25  
**Severity:** LOW - String IS wrapped in translation function, but appears to be placeholder data

```php
// Current code:
<div class="text-xs text-muted-foreground">
    <?php esc_html_e('CEO · Riyadh, Saudi Arabia', 'arqamweb'); ?>
</div>
```

**Recommendation:** Verify if this should be dynamic content from ACF field instead:
```php
<?php 
$role_location = get_field('role_location', get_the_ID());
if ($role_location) {
    echo esc_html($role_location);
} else {
    esc_html_e('CEO · Riyadh, Saudi Arabia', 'arqamweb');
}
?>
```

#### Issue #2-3: Social Media Platform Names

**File:** `single.php`  
**Lines:** 185, 191  
**Severity:** LOW - Brand names typically remain in English

```php
// Line 185:
X / Twitter

// Line 191:
LinkedIn
```

**Note:** These are brand/platform names. Standard practice is to keep brand names untranslated. However, for complete consistency, they could be wrapped:

```php
<?php esc_html_e('X / Twitter', 'arqamweb'); ?>
<?php esc_html_e('LinkedIn', 'arqamweb'); ?>
```

**Alternative:** Keep visible brand names in English but provide translated aria-labels for accessibility.

---

## Total String Count

### Summary by Severity

| Severity | Strings | Files Affected | Business Impact |
|----------|---------|----------------|-----------------|
| 🔴 Critical | 93 | 1 | Email communication (primary lead channel) |
| 🔴 High | 64 | 7 | Homepage content (first impression) |
| 🟡 Medium | 4 | 1 | Category fallback text (edge case) |
| 🟢 Low | 3 | 2 | Placeholder text and brand names (optional) |
| **TOTAL** | **164** | **10** | - |

### Breakdown by Component Type

| Component Type | Files Audited | Files Passing | Files w/ Issues | Total Strings |
|----------------|---------------|---------------|-----------------|---------------|
| Helper Files | 3 | 2 (66.7%) | 1 (33.3%) | 93 |
| Frontpage Components | 13 | 6 (46.2%) | 7 (53.8%) | 64 |
| Main Templates | 8 | 6 (75.0%) | 2 (25.0%) | 6 |
| Template Parts | 15 | 14 (93.3%) | 1 (6.7%) | 1 |
| **TOTAL** | **39** | **28 (71.8%)** | **11 (28.2%)** | **164** |

### Translation Workload Estimate

- **Critical strings (email):** ~2-3 hours (93 strings, complex email formatting)
- **High priority (homepage):** ~3-4 hours (64 strings, array refactoring)
- **Medium priority (fallbacks):** ~30 minutes (4 strings, simple)
- **Low priority (optional):** ~15 minutes (3 strings, review-based)
- **Total estimated effort:** 6-8 hours for refactoring + testing

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

## 3. Template Parts Audit (content & other)

This section audits template-parts/content/* files and other major template-parts (services, projects, pricing, reviews, contact, about, quote, etc.) for hard-coded strings.

### Audit Status by Template Part

| Template Part | Status | Hard-coded Strings Found |
|---------------|--------|--------------------------|
| content/content-none.php | ✅ Pass | 0 |
| content/content-page.php | ✅ Pass | 0 |
| content/content-project.php | ✅ Pass | 0 |
| content/content-review.php | ⚠️ Minor Issue | 1 instance |
| content/content-search.php | ✅ Pass | 0 |
| content/content.php | ✅ Pass | 0 |
| services.php | ✅ Pass | 0 |
| projects.php | ✅ Pass | 0 |
| pricing.php | ✅ Pass | 0 |
| pricing-v2.php | ✅ Pass | 0 |
| reviews.php | ✅ Pass | 0 |
| about.php | ✅ Pass | 0 |
| quote.php | ✅ Pass | 0 |
| contact.php | ✅ Pass | 0 |
| partials/floating-contact.php | ✅ Pass | 0 |

---

### 3.1 content/content-none.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All user-facing strings use proper WordPress translation functions
- Examples:
  ```php
  esc_html_e('Nothing Found', 'arqamweb');
  __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'arqamweb');
  esc_html_e('Sorry, but nothing matched your search terms...', 'arqamweb');
  ```

---

### 3.2 content/content-page.php ✅

**Status:** PASS - No user-facing strings

**Findings:**
- Template uses WordPress functions to output content
- No hard-coded strings requiring translation

---

### 3.3 content/content-project.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- View Project button properly translatable:
  ```php
  echo __('View Project', 'arqamweb');
  ```

---

### 3.4 content/content-review.php ⚠️

**Status:** MINOR ISSUE - 1 instance of hard-coded placeholder text

**Hard-coded String Identified:**

#### Issue #1: Placeholder Role/Location (Line 25)
```php
// Current code:
<div class="text-xs text-muted-foreground">
    <?php esc_html_e('CEO · Riyadh, Saudi Arabia', 'arqamweb'); ?>
</div>
```

**Problem:** This appears to be placeholder text that should be replaced with dynamic content from ACF field `role_location` or similar  
**Impact:** LOW - The string is wrapped in `esc_html_e()`, so it IS translatable, but appears to be hardcoded placeholder text rather than actual dynamic content  
**Severity:** LOW - More of a data issue than translation issue

**Recommended Fix:**
Consider replacing with dynamic field if available, or confirm this is intentional placeholder text:
```php
<div class="text-xs text-muted-foreground">
    <?php 
    $role_location = get_field('role_location', get_the_ID());
    if ($role_location) {
        echo esc_html($role_location);
    } else {
        esc_html_e('CEO · Riyadh, Saudi Arabia', 'arqamweb');
    }
    ?>
</div>
```

---

### 3.5 content/content-search.php ✅

**Status:** PASS - No user-facing strings in this file

---

### 3.6 content/content.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- Read more link properly translatable:
  ```php
  esc_html_e( 'اقرأ المزيد', 'arqamweb' );
  ```

---

### 3.7 services.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Large (351 lines)

**Findings:**
- Excellent implementation of translation functions throughout
- All section headings, CTAs, service cards properly translated
- Filter labels properly translated
- Examples:
  ```php
  esc_html_e('Services that', 'arqamweb');
  esc_html_e('grow', 'arqamweb');
  esc_html_e('Start your project', 'arqamweb');
  esc_html_e('All', 'arqamweb');
  esc_html_e('Learn more', 'arqamweb');
  esc_attr_e('Filter services by category', 'arqamweb');
  ```

---

### 3.8 projects.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Large (441 lines)

**Findings:**
- Comprehensive translation coverage
- Complex aria-labels properly translated
- Dynamic content properly handled with `sprintf()` and `__()`:
  ```php
  esc_html_e('Selected work · 2023–2026', 'arqamweb');
  esc_html_e('Selected digital', 'arqamweb');
  esc_html_e('experiences', 'arqamweb');
  esc_attr_e('Filter projects by category', 'arqamweb');
  esc_html_e('Featured', 'arqamweb');
  esc_html_e('View case study', 'arqamweb');
  sprintf(__('View %s case study', 'arqamweb'), $title);
  ```

---

### 3.9 pricing.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Very Large (2466 lines)

**Findings:**
- Extensive translation coverage across all pricing tiers
- All package features, descriptions, and CTAs properly translated
- Country names in marquee section properly translated
- Currency labels properly handled
- Examples:
  ```php
  esc_html_e('Transparent pricing for', 'arqamweb');
  esc_html_e('ambitious brands.', 'arqamweb');
  esc_html_e('Trusted globally', 'arqamweb');
  esc_html_e('Partnering with brands across', 'arqamweb');
  esc_html_e('Clients in', 'arqamweb');
  esc_html_e('Egypt', 'arqamweb');
  esc_html_e('Starting from', 'arqamweb');
  ```

---

### 3.10 pricing-v2.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Very Large (1304 lines)

**Findings:**
- New pricing page with comprehensive translation support
- All service tiers, features, and descriptions properly wrapped
- Helper functions properly implement translations:
  ```php
  __('Websites pricing', 'arqamweb'),
  __('Launch — Informative', 'arqamweb'),
  __('A complete site, live in one week.', 'arqamweb'),
  __('Buy Launch now', 'arqamweb'),
  __('SEO / AEO pricing', 'arqamweb'),
  esc_html_e('Quoted to scope', 'arqamweb');
  ```

---

### 3.11 reviews.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Large (828 lines)

**Findings:**
- All testimonial-related content properly translated
- Video testimonial modal labels properly translated
- Statistics and trust signals properly wrapped
- Examples:
  ```php
  esc_html_e('Real words from', 'arqamweb');
  esc_html_e('real clients.', 'arqamweb');
  esc_html_e('CLIENT VOICES · VERIFIED', 'arqamweb');
  esc_html_e('80+ verified reviews', 'arqamweb');
  esc_html_e('Verified Client', 'arqamweb');
  esc_attr_e('Close video', 'arqamweb');
  ```

---

### 3.12 about.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Very Large (849 lines)

**Findings:**
- Company history timeline properly translated
- All biographical content properly wrapped
- Mission, vision, values sections fully translatable
- Examples:
  ```php
  esc_html_e('A 15-YEAR STORY · SINCE 2010', 'arqamweb');
  esc_html_e('We build', 'arqamweb');
  esc_html_e('digital systems', 'arqamweb');
  esc_html_e('Our story', 'arqamweb');
  esc_html_e('The first line of code', 'arqamweb');
  esc_html_e('Vision', 'arqamweb');
  esc_html_e('Mission', 'arqamweb');
  ```

---

### 3.13 quote.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Small (126 lines)

**Findings:**
- All form-related labels and trust signals properly translated
- Examples:
  ```php
  esc_html_e('Start your project', 'arqamweb');
  esc_html_e('Tell us about', 'arqamweb');
  esc_html_e('your project.', 'arqamweb');
  esc_html_e('Response in 24h', 'arqamweb');
  esc_html_e('No commitment', 'arqamweb');
  ```

---

### 3.14 contact.php ✅

**Status:** PASS - All strings are properly translatable  
**File Size:** Very Large (reviewed in pattern file)

**Findings:**
- All contact methods properly translated
- Office hours, contact stats properly wrapped
- Examples from pattern:
  ```php
  esc_html_e('Let's build something', 'arqamweb');
  esc_html_e('worth scaling.', 'arqamweb');
  esc_html_e('Email the studio', 'arqamweb');
  esc_html_e('Call us directly', 'arqamweb');
  ```

---

### 3.15 partials/floating-contact.php ✅

**Status:** PASS - All strings are properly translatable

**Findings:**
- All aria-labels and tooltips properly translated:
  ```php
  esc_attr_e('WhatsApp', 'arqamweb');
  esc_attr_e('Email', 'arqamweb');
  esc_attr_e('Call', 'arqamweb');
  esc_html_e('WhatsApp', 'arqamweb');
  ```

---

### 3.16 Template Parts Summary

**Total template-parts files audited:** 15
- **Content templates:** 6 files
- **Major page templates:** 7 files (services, projects, pricing, pricing-v2, reviews, about, quote)
- **Partials:** 2 files (contact, floating-contact)

**Files passing audit:** 14 of 15 (93.3%)
**Files with minor issues:** 1 of 15 (6.7%)

**Hard-coded strings identified:** 1 (placeholder text in content-review.php - low severity)

**Quality Assessment:**
- ✅ Excellent overall translation coverage
- ✅ Consistent use of proper WordPress translation functions
- ✅ Proper escaping with `esc_html()` and `esc_attr()`
- ✅ Complex templates (pricing, services, projects) fully translatable
- ✅ Aria-labels and accessibility text properly handled
- ⚠️ One placeholder text issue (minor)

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

### Template Parts

**Files audited: 15**
- Content templates (6 files) - 5 pass, 1 minor issue
- Major page templates (7 files) - all pass ✅
- Partials (2 files) - all pass ✅

**Hard-coded strings identified:** 1 (placeholder text, low severity)

### Overall Statistics
- **Total files audited:** 36 (8 main templates + 13 frontpage components + 15 template-parts)
- **Files passing:** 26 (72.2%)
- **Files requiring fixes:** 8 (22.2%)
- **Files with minor issues:** 1 (2.8%)
- **Files for optional review:** 1 (2.8%)
- **Total hard-coded strings identified:** 71
  - Main templates: 4 (medium priority) + 2 (optional)
  - Frontpage components: 64 (high priority)
  - Template-parts: 1 (low priority)

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

## 4. Helper Files Audit (inc/helpers/)

This section audits PHP helper files in the `inc/helpers/` directory for hard-coded strings.

### Audit Status by Helper File

| Helper File | Status | Hard-coded Strings Found |
|-------------|--------|--------------------------|
| acf-helpers.php | ✅ Pass | 0 |
| ajax-handlers.php | ⚠️ Critical Issues | 93 instances |
| template-helpers.php | ✅ Pass | 0 |

---

### 4.1 inc/helpers/acf-helpers.php ✅

**Status:** PASS - No user-facing strings

**Findings:**
- Contains only utility functions for ACF field access
- No user-facing strings requiring translation
- All fallback values are empty strings, `'#'` for URLs, or empty arrays
- Function documentation comments do not require translation

**Functions reviewed:**
- `arqamweb_get_text_field()` - Fallback: empty string (appropriate)
- `arqamweb_get_image_field()` - Returns null or structured array (no strings)
- `arqamweb_get_relation_field()` - Returns empty array (appropriate)
- `arqamweb_get_url_field()` - Fallback: `'#'` (appropriate for URLs)

---

### 4.2 inc/helpers/ajax-handlers.php ⚠️

**Status:** CRITICAL ISSUES - 93 hard-coded strings in email body construction

**Summary:**
This file handles AJAX quote request submissions and constructs email bodies with extensive hard-coded English text. The email body includes section headers, field labels, and formatting that should all be translatable for a bilingual website.

**Hard-coded Strings Identified:**

#### Issue #1: Email Section Headers (15 instances)

Lines 107-278 contain hard-coded section dividers and headers:

```php
// Line 107:
$body = "── Contact ───────────────────────────────\n";

// Line 118:
$body .= "\n── Project Overview ────────────────────\n";

// Line 131:
$body .= "── Branding Level ───────────────────────\n";

// Line 134:
$body .= "── Logo Status ─────────────────────────\n";

// Line 145:
$body .= "── Brand Assets ─────────────────────────\n";

// Line 150:
$body .= "\n── Execution Details ──────────────────────\n";

// Line 156:
$body .= "── Strategy ──────────────────────────────\n";

// Line 163:
$body .= "── Decision & Communication ────────────────\n";

// Line 168:
$body .= "── Investment & Timeline ───────────────────\n";

// Line 176:
$body .= "── Website Status ────────────────────────\n";

// Line 182:
$body .= "── Website Type ──────────────────────────\n";

// Line 188:
$body .= "\n── Project Scope ─────────────────────────\n";

// Line 196:
$body .= "\n── Features ──────────────────────────────\n";

// Line 201:
$body .= "\n── Design & Branding ─────────────────────\n";

// Line 206:
$body .= "── Audience & Objectives ────────────────────\n";

// ... and more
```

**Total Section Headers:** 25 instances

---

#### Issue #2: Field Labels (68 instances)

Lines 107-278 contain hard-coded field labels throughout:

**Contact Section (Lines 108-116):**
```php
'Name:    ' 
'Phone:   ' 
'Email:   ' 
'Company: ' 
'Role:    ' 
```

**Project Overview Section (Lines 119-128):**
```php
'Industry: '
'Target Market: '
'Business Type: '
'Business Stage: '
'Has Investment: '
'Website/Social Link: '
```

**Branding Service Section (Lines 132-172):**
```php
'Level: '
'Logo Status: '
'Designer: '
'Has Source Files: '
'Reason: '
'[Logo upload attached]'
'Assets: '
'Other: '
'Content Writing: '
'Translation: '
'Product Count: '
'Branches Count: '
'Objective:'
'Audience:'
'Competitors:'
'Brand Personality: '
'Success Metrics: '
'Decision Maker: '
'Urgency: '
'Communication: '
'Budget Level: '
'Start Date: '
'Launch Date: '
'Referral: '
```

**Website Service Section (Lines 177-225):**
```php
'Website Status: '
'Website URL: '
'Website Issue:'
'Has Investment: '
'Website Type: '
'Page Count: '
'Expected Sections:'
'Require CMS: '
'CMS Elements: '
'Other: '
'Features: '
'Other: '
'Has Visual Identity: '
'Follow Existing Brand: '
'Reference Websites:'
'Target Audience:'
'Primary Objective: '
'Success Measurement:'
'Decision Maker: '
'Urgency: '
'Communication: '
'Execution Level: '
'Start Date: '
'Has Fixed Launch Date: '
'Launch Date: '
'Referral: '
```

**SEO Service Section (Lines 229-272):**
```php
'Website Live: '
'Website URL: '
'Previous SEO Work: '
'SEO Challenges:'
'Analytics Tools: '
'Has Previous Reports: '
'Monthly Traffic: '
'Primary SEO Goal: '
'Target Keywords:'
'SEO Focus: '
'Competitors:'
'Knows Ranking Position: '
'Internal Content Team: '
'Publish Blog Regularly: '
'Article Count: '
'Content Writing Required: '
'Technical SEO Done: '
'Website Platform: '
'Speed Issues: '
'Decision Maker: '
'Urgency: '
'Strategy Level: '
'Start Date: '
'Referral: '
```

**Footer Labels (Lines 274-278):**
```php
'── Service: '
'── Attachments: '
'── Submitted: '
' UTC ──'
```

**Total Field Labels:** 68 instances

---

### Recommended Fixes for ajax-handlers.php

**Priority:** HIGH (93 hard-coded strings in critical email functionality)

**Pattern to Apply:**

```php
// ❌ INCORRECT - Hard-coded English
$body = "── Contact ───────────────────────────────\n";
$body .= 'Name:    ' . $full_name . "\n";

// ✅ CORRECT - Translatable
$body = __('── Contact ───────────────────────────────', 'arqamweb') . "\n";
$body .= __('Name:', 'arqamweb') . '    ' . $full_name . "\n";
```

**Implementation Strategy:**

1. **Wrap all section headers** with `__()`
2. **Wrap all field labels** with `__()`  
3. **Keep formatting** (spaces, line breaks, decorative characters) outside translation strings where possible
4. **Maintain structure** of email for readability

**Example Fix for Contact Section (Lines 107-116):**

```php
// Before:
$body = "── Contact ───────────────────────────────\n";
$body .= 'Name:    ' . $full_name . "\n";
if ( ! empty( $data['phone'] ?? '' ) ) $body .= 'Phone:   ' . $data['phone'] . "\n";
$body .= 'Email:   ' . $email . "\n";
if ( ! empty( $data['company_name'] ?? '' ) ) $body .= 'Company: ' . $data['company_name'] . "\n";

// After:
$body = __('── Contact ───────────────────────────────', 'arqamweb') . "\n";
$body .= __('Name:', 'arqamweb') . '    ' . $full_name . "\n";
if ( ! empty( $data['phone'] ?? '' ) ) $body .= __('Phone:', 'arqamweb') . '   ' . $data['phone'] . "\n";
$body .= __('Email:', 'arqamweb') . '   ' . $email . "\n";
if ( ! empty( $data['company_name'] ?? '' ) ) $body .= __('Company:', 'arqamweb') . ' ' . $data['company_name'] . "\n";
```

**Impact Assessment:**
- **Severity:** HIGH - Email is primary contact method
- **User Impact:** Arabic-speaking users receive English-only emails
- **Business Impact:** Unprofessional for bilingual agency
- **Translation Count:** 93 strings requiring translation
- **Files Affected:** 1 file (`inc/helpers/ajax-handlers.php`)
- **Lines Affected:** Lines 107-278 (171 lines)

---

### 4.3 inc/helpers/template-helpers.php ✅

**Status:** PASS - All strings properly translatable

**Findings:**
- All user-facing strings use proper WordPress translation functions
- Logo alt text properly translated with `esc_attr__()`
- Fallback category name properly translated
- Examples of correct implementation:
  ```php
  // Line 28:
  esc_attr__('Digital Marketing Agency in Egypt, Cairo | Arqam Web', 'arqamweb')
  
  // Line 288:
  'category' => $category !== '' ? $category : __('Project', 'arqamweb'),
  ```

**Functions reviewed:**
- `arqamweb_get_logo_markup()` - ✅ Alt text properly translated
- `arqamweb_get_page_permalink()` - ✅ No user-facing strings
- `arqamweb_get_whatsapp_url()` - ✅ Uses constant, appropriate
- `arqamweb_get_contact_email()` - ✅ Uses constant, appropriate  
- `arqamweb_get_copyright_year()` - ✅ Numeric only, appropriate
- `arqamweb_get_language_switcher()` - ✅ Uses WPML shortcode, appropriate
- `arqamweb_get_breadcrumb()` - ✅ Uses Rank Math, appropriate
- `arqam_icon()` - ✅ SVG markup, no translatable strings
- `arqam_stars()` - ✅ SVG markup, no translatable strings
- `arqamweb_get_project_card()` - ✅ Fallback category properly translated
- `arqamweb_get_featured_project_cards()` - ✅ No translatable strings

---

### 4.4 Helper Files Summary

**Total helper files audited:** 3
- **Files passing:** 2 of 3 (66.7%)
- **Files with critical issues:** 1 of 3 (33.3%)

**Hard-coded strings identified:** 93 (all in ajax-handlers.php)

**Breakdown by severity:**
- 🔴 **Critical Priority:** 93 strings (email communication)
  - 25 section headers
  - 68 field labels

**Quality Assessment:**
- ✅ `acf-helpers.php` - Excellent, no translatable content
- ⚠️ `ajax-handlers.php` - Requires complete translation refactor
- ✅ `template-helpers.php` - Excellent translation coverage

**Recommended Action Items:**

1. **Immediate Priority:** Refactor `ajax-handlers.php` email body construction
   - Wrap all 25 section headers in `__()`
   - Wrap all 68 field labels in `__()`
   - Test email output in both English and Arabic
   - Verify translation files include all email strings

2. **Testing Requirements:**
   - Submit quote forms for all three services (branding, website, SEO)
   - Verify emails in English mode
   - Switch to Arabic and verify translated emails
   - Check RTL formatting for Arabic emails
   - Test with WP_DEBUG mode (logs to file instead of sending)

3. **Translation File Impact:**
   - Add 93 new strings to `languages/arqamweb.pot`
   - Provide context for translators about email formatting
   - Consider creating translator notes for technical terms
   - Test Arabic email formatting with actual translations

---

## Updated Executive Summary

### Overall Results (Including Helper Files)
- **Total files audited:** 39 (previously 36)
- **Files passing:** 28 of 39 (71.8%)
- **Files needing fixes:** 10 of 39 (25.6%)
- **Files with minor issues:** 1 of 39 (2.6%)
- **Total hard-coded strings:** 164 (previously 71)

### Updated Priority Breakdown
- 🔴 **Critical Priority:** 93 strings (email communication in ajax-handlers.php)
- 🔴 **High Priority:** 64 strings (frontpage components - arrays with content)
- 🟡 **Medium Priority:** 4 strings (main templates - fallback text)
- 🟢 **Low Priority:** 3 strings (1 placeholder, 2 optional platform names)

### Files by Category

**Helper Files (3):**
- ✅ Pass: 2 files
- ⚠️ Critical issues: 1 file (93 hard-coded strings)

**Main Templates (8):**
- ✅ Pass: 6 files
- ⚠️ Issues: 1 file (4 strings)
- ⚠️ Optional review: 1 file (2 strings)

**Frontpage Components (13):**
- ✅ Pass: 6 files
- ⚠️ Issues: 7 files (64 strings)

**Template Parts (15):**
- ✅ Pass: 14 files
- ⚠️ Minor issue: 1 file (1 string)

**Total Issues: 164 instances**
- **Critical Priority**: 93 instances (helper files - email)
- **High Priority**: 64 instances (frontpage components)
- **Medium Priority**: 4 instances (main templates)
- **Low Priority**: 3 instances (optional/minor)

---

**End of Report**
