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

## 2. Summary of Issues

### Critical Issues: 0
No critical issues found.

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

---

## 3. Recommendations

### Immediate Actions Required

1. **Fix home.php Category Fallbacks**
   - Replace all instances of hard-coded `'General'` with `esc_html__('General', 'arqamweb')`
   - Locations: Lines 18, 100, 284

2. **Fix home.php Language Labels**
   - Wrap `EN / AR` in translation function on line 182
   - Consider making this dynamic based on active languages

### Optional Improvements

1. **Single.php Social Media Labels**
   - Review theme guidelines on translating brand names
   - If translating, wrap platform names in translation functions
   - Consider using aria-labels for accessibility that can be translated while keeping visible brand names in English

### Best Practices Observed

The theme generally follows WordPress translation best practices:
- ✅ Consistent use of `arqamweb` text domain
- ✅ Proper escaping with translation functions (`esc_html_e`, `esc_attr_e`)
- ✅ Correct use of plural forms with `_n()`
- ✅ Context provided in translator comments where needed
- ✅ Proper use of `printf()` with `esc_html__()` for dynamic strings

---

## 4. Testing Recommendations

After implementing fixes:

1. **Test with .pot file generation:**
   ```bash
   wp i18n make-pot . languages/arqamweb.pot
   ```

2. **Verify all strings appear in .pot file:**
   - Search for "General" in translations
   - Verify "EN / AR" appears
   - Check social media platform names if included

3. **Test with RTL (Arabic) language:**
   - Switch site to Arabic
   - Verify all fixed strings display correctly
   - Check category fallbacks on posts without categories
   - Verify language labels on home page

4. **Use translation plugin to verify:**
   - Install Loco Translate or similar
   - Check that all identified strings are available for translation
   - Translate test strings to verify they display correctly

---

## 5. Files Affected Summary

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
