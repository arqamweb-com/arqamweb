# Browser DevTools Inspection Guide - Arabic Mode

**Subtask:** 6-2  
**Phase:** Visual Verification  
**Status:** Ready for Manual Execution  
**Date:** 2026-09-27

---

## Purpose

This guide provides step-by-step instructions for inspecting hidden HTML attributes (aria-label, placeholder, title, alt) in Arabic mode using browser DevTools. This verification ensures that screen readers and assistive technologies receive Arabic text, not English, when the site language is set to Arabic.

---

## Prerequisites

1. **MAMP Server Running**
   - Start MAMP application
   - Verify Apache and MySQL are active (green lights)
   - Site accessible at: http://localhost:8888

2. **Arabic Mode Active**
   - Open http://localhost:8888/?lang=ar
   - Verify URL contains `?lang=ar` parameter
   - Confirm visible text is in Arabic

3. **Browser DevTools**
   - Recommended: Chrome or Firefox (best DevTools support)
   - Alternative: Safari, Edge (similar functionality)

---

## Step-by-Step Inspection Process

### Step 1: Open DevTools

**Method 1:** Right-click on any element → "Inspect"  
**Method 2:** Keyboard shortcut
- Windows/Linux: `F12` or `Ctrl+Shift+I`
- macOS: `Cmd+Option+I`

### Step 2: Navigate to Elements/Inspector Tab

The Elements (Chrome) or Inspector (Firefox) tab shows the HTML structure of the page.

---

## Attribute Inspection Checklist

### A. Inspect Aria-Label Attributes

**Purpose:** Screen readers announce these labels to visually impaired users.

**How to Check:**
1. In DevTools Elements tab, press `Ctrl+F` / `Cmd+F`
2. Search for: `aria-label=`
3. Review each result

**Expected:** All aria-label values should be in Arabic

**Example - CORRECT:**
```html
<button aria-label="افتح القائمة الرئيسية">
  <svg>...</svg>
</button>
```

**Example - WRONG:**
```html
<button aria-label="Open main menu">
  <svg>...</svg>
</button>
```

**Critical Elements to Check:**
- [ ] Navigation menu toggle button
- [ ] Social media icons in footer
- [ ] Search button
- [ ] Language switcher
- [ ] Floating contact buttons
- [ ] Video play buttons
- [ ] Close/dismiss buttons
- [ ] Carousel next/previous buttons

---

### B. Inspect Placeholder Attributes

**Purpose:** Placeholder text appears inside empty form inputs as hints.

**How to Check:**
1. In DevTools Elements tab, press `Ctrl+F` / `Cmd+F`
2. Search for: `placeholder=`
3. Review each result

**Expected:** All placeholder values should be in Arabic

**Example - CORRECT:**
```html
<input 
  type="text" 
  name="full_name" 
  placeholder="الاسم الكامل"
/>
```

**Example - WRONG:**
```html
<input 
  type="text" 
  name="full_name" 
  placeholder="Full Name"
/>
```

**Critical Elements to Check:**
- [ ] Contact form: Name field
- [ ] Contact form: Email field
- [ ] Contact form: Phone field
- [ ] Contact form: Message/comments field
- [ ] Quote request form fields
- [ ] Search input field
- [ ] Newsletter subscription field
- [ ] Comment form fields

---

### C. Inspect Title Attributes

**Purpose:** Title attributes show tooltips on hover.

**How to Check:**
1. In DevTools Elements tab, press `Ctrl+F` / `Cmd+F`
2. Search for: `title=`
3. Review each result

**Expected:** All title values should be in Arabic (if user-facing)

**Example - CORRECT:**
```html
<a href="/contact" title="اتصل بنا">
  <svg>...</svg>
</a>
```

**Example - ACCEPTABLE (Contact Form 7 shortcode - handled by CF7):**
```html
[contact-form-7 id="123" title="نموذج الاتصال"]
```

**Critical Elements to Check:**
- [ ] Navigation links
- [ ] Social media links
- [ ] Icon-only buttons
- [ ] Footer links
- [ ] Call-to-action buttons

**Note:** Some elements may not have title attributes (this is acceptable).

---

### D. Inspect Alt Attributes

**Purpose:** Alt text describes images for screen readers and appears when images fail to load.

**How to Check:**
1. In DevTools Elements tab, press `Ctrl+F` / `Cmd+F`
2. Search for: `alt=`
3. Review each result

**Expected:** 
- Meaningful images: Alt text in Arabic
- Decorative images: Empty alt (`alt=""`) or use `aria-hidden="true"`

**Example - CORRECT (Meaningful):**
```html
<img 
  src="logo.png" 
  alt="شعار أرقام ويب"
/>
```

**Example - CORRECT (Decorative):**
```html
<img 
  src="decorative-pattern.svg" 
  alt=""
/>
```

**Example - WRONG:**
```html
<img 
  src="logo.png" 
  alt="Arqam Web logo"
/>
```

**Critical Elements to Check:**
- [ ] Site logo
- [ ] Project thumbnails
- [ ] Service icons/images
- [ ] Team member photos
- [ ] Client logos (acceptable: no alt or brand name in English)
- [ ] Blog post featured images
- [ ] Testimonial photos

---

## Verification Procedure by Page

### 1. Homepage (`http://localhost:8888/?lang=ar`)

**Inspect:**
- Hero section: Button aria-labels
- Services section: Icon alt text (if images)
- Stats/Numbers: No attributes expected (text-based)
- Projects section: Project image alt text
- Testimonials: Client photo alt text, navigation aria-labels
- Contact section: Form placeholders (if visible), button aria-labels

### 2. Services Page

**Inspect:**
- Service card images: alt text
- Filter buttons: aria-labels (if icon-only)
- Service detail modal/accordion: aria-labels for expand/collapse

### 3. Projects Page

**Inspect:**
- Project thumbnail images: alt text
- Filter buttons: aria-labels
- Lightbox/modal close button: aria-label

### 4. About Page

**Inspect:**
- Team member photos: alt text
- About page images: alt text
- Timeline icons: alt text or aria-hidden

### 5. Contact Page

**Inspect:**
- Contact form placeholders
- Submit button aria-label (if icon)
- Map placeholder (if applicable)
- Contact method icons: aria-labels

### 6. Header (All Pages)

**Inspect:**
- Logo: alt text
- Menu toggle button: aria-label
- Search input: placeholder, aria-label
- Language switcher: aria-label
- CTA buttons: aria-label (if icon-only)

### 7. Footer (All Pages)

**Inspect:**
- Social media icons: aria-labels
- Newsletter input: placeholder, aria-label
- Footer logo: alt text

---

## Using DevTools Search Filters

### Find All Aria-Labels
1. Open DevTools → Elements tab
2. Press `Ctrl+F` / `Cmd+F`
3. Type: `aria-label`
4. Use up/down arrows to navigate through all instances

### Find All Placeholders
1. Open DevTools → Elements tab
2. Press `Ctrl+F` / `Cmd+F`
3. Type: `placeholder`
4. Review each match

### Find All Alt Attributes
1. Open DevTools → Elements tab
2. Press `Ctrl+F` / `Cmd+F`
3. Type: `alt=`
4. Review each match

---

## Issue Tracking

### Recording Issues

If you find English text in any attribute, record it in this format:

**File:** `[file name]`  
**Line:** `[line number if known]`  
**Element:** `[button/input/image/link]`  
**Attribute:** `[aria-label/placeholder/alt/title]`  
**Current Value:** `[English text found]`  
**Expected Value:** `[Arabic translation needed]`  
**Severity:** `[Critical/Medium/Low]`

### Example Issue Report

```
File: template-parts/frontpage/frontpage-contact.php
Line: 45
Element: Submit button
Attribute: aria-label
Current Value: "Submit your message"
Expected Value: "إرسال رسالتك"
Severity: Critical
```

---

## Acceptance Criteria

**PASS Condition:** All of the following must be true:
- [ ] All aria-label attributes are in Arabic (or appropriately omitted)
- [ ] All placeholder attributes are in Arabic
- [ ] All meaningful image alt attributes are in Arabic
- [ ] All user-facing title attributes are in Arabic
- [ ] Decorative elements use `alt=""` or `aria-hidden="true"`
- [ ] No English text found in screen reader content

**FAIL Condition:** Any English text found in:
- aria-label for user-facing elements
- placeholder for form inputs
- alt text for meaningful images
- title tooltips for navigation/actions

---

## Common False Positives (Acceptable)

The following are **NOT** translation issues:

1. **Contact Form 7 Shortcodes:** `[contact-form-7 title="..."]` - Managed by CF7/WPML
2. **Brand Names in Alt:** `alt="Coca-Cola logo"` - Proper nouns acceptable
3. **Technical Attributes:** `class="..."`, `id="..."`, `data-*="..."` - Not user-facing
4. **Empty Alt:** `alt=""` - Correct for decorative images
5. **Aria-Hidden Elements:** `aria-hidden="true"` - Not announced to screen readers

---

## Technical Notes

### Translation Coverage (Phase 2-5 Results)

- **Total strings in .pot file:** 885
- **Total Arabic translations in .po file:** 888
- **Compiled .mo file size:** 75KB
- **Validation script status:** PASS (zero hard-coded strings detected)

### Files Refactored with Attributes
- `header.php` - All aria-labels verified
- `footer.php` - All aria-labels verified
- `template-parts/partials/floating-contact.php` - All aria-labels verified
- `template-parts/about.php` - Alt and title attributes wrapped
- `template-parts/contact.php` - Contact Form 7 title attribute wrapped
- `comments.php` - All placeholder attributes wrapped
- `inc/helpers/template-helpers.php` - Logo alt text verified

All attribute wrapping completed in **Phase 3 (Refactor Accessibility Attributes)**.

---

## Next Steps After Inspection

1. **If PASS:**
   - Update `implementation_plan.json` → subtask-6-2 → status: "completed"
   - Update `docs/arabic-visual-verification.md` → Add verification results
   - Proceed to subtask-6-3 (Form validation testing)

2. **If FAIL:**
   - Create issue list in `docs/arabic-visual-verification.md`
   - Fix issues in source files
   - Re-run `php bin/validate-translations.php --check`
   - Re-generate translation files (bin/generate-pot.php)
   - Re-inspect in browser

---

## Related Documentation

- **Comprehensive Checklist:** `docs/arabic-visual-verification.md`
- **Translation Validation:** `docs/translation-validation.md`
- **Audit Report:** `docs/translation-audit-report.md`
- **Validation Script:** `bin/validate-translations.php`

---

## Support

**For Questions:**
- Review Phase 3 completion notes in `build-progress.txt`
- Check translation function reference in `docs/translation-validation.md`
- Consult WordPress i18n documentation: https://developer.wordpress.org/apis/handbook/internationalization/

---

**Ready for Manual Execution**

This document provides everything needed to perform a thorough DevTools inspection of all accessibility attributes in Arabic mode. Follow the step-by-step procedures above, use the checklists for each page, and record any issues found.
