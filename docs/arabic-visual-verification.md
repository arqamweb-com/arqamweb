# Arabic Visual Verification Report

**Feature:** Complete Bilingual Translation Audit & Hard-coded String Elimination  
**Phase:** Visual Verification  
**Date:** 2026-09-27  
**Reviewer:** Claude Sonnet 4.5  
**Status:** Ready for Manual Review

---

## Executive Summary

This document provides a comprehensive checklist for visual verification of Arabic translation coverage across all pages of the Arqam Web theme. The goal is to ensure **zero English text leakage** when the site is viewed in Arabic mode.

**Verification Method:** Manual browser inspection with WPML language switcher set to Arabic  
**Target URL:** http://localhost:8888  
**Required:** MAMP server running with WordPress installation

---

## Prerequisites

### Server Setup
1. **Start MAMP Server**
   - Open MAMP application
   - Click "Start Servers"
   - Verify Apache and MySQL are running (green indicators)

2. **Verify WordPress Access**
   - Open browser to: http://localhost:8888
   - Ensure site loads without errors
   - Verify WPML plugin is active

3. **Switch to Arabic Mode**
   - Locate language switcher in header/footer
   - Click Arabic (العربية) option
   - URL should include `?lang=ar` parameter
   - Page should reload with Arabic text

---

## Page-by-Page Verification Checklist

### 1. Homepage (`http://localhost:8888/?lang=ar`)

#### Visual Elements to Check
- [ ] **Hero Section**
  - [ ] Main headline in Arabic
  - [ ] Subheadline/tagline in Arabic
  - [ ] CTA button text in Arabic
  - [ ] No English fallback text visible

- [ ] **Services Section**
  - [ ] Section heading in Arabic
  - [ ] Service cards: titles in Arabic
  - [ ] Service cards: descriptions in Arabic
  - [ ] Service cards: tags/labels in Arabic
  - [ ] "View All Services" button in Arabic

- [ ] **Numbers/Statistics Section**
  - [ ] Stat labels in Arabic
  - [ ] Stat descriptions/notes in Arabic
  - [ ] Numbers formatted correctly for RTL

- [ ] **Projects Section**
  - [ ] Section heading in Arabic
  - [ ] Project titles in Arabic
  - [ ] Project descriptions in Arabic
  - [ ] "View All Projects" button in Arabic

- [ ] **Testimonials/Reviews Section**
  - [ ] Section heading in Arabic
  - [ ] Client names (acceptable if in English - proper nouns)
  - [ ] Testimonial text in Arabic
  - [ ] Navigation controls (prev/next) in Arabic

- [ ] **Contact Section**
  - [ ] Section heading in Arabic
  - [ ] Form field labels in Arabic (via Contact Form 7)
  - [ ] Submit button in Arabic
  - [ ] Contact information labels in Arabic

#### Hidden Attributes (DevTools Inspection)
- [ ] `aria-label` attributes in Arabic
- [ ] `placeholder` attributes in Arabic
- [ ] `title` attributes in Arabic
- [ ] `alt` attributes in Arabic (or appropriately empty for decorative images)

---

### 2. Services Page (`http://localhost:8888/services/?lang=ar`)

#### Visual Elements to Check
- [ ] **Page Title/Heading**
  - [ ] Main page title in Arabic
  - [ ] Breadcrumb navigation in Arabic

- [ ] **Service Listings**
  - [ ] Service card titles in Arabic
  - [ ] Service card descriptions in Arabic
  - [ ] Service icons/images have Arabic alt text
  - [ ] Service tags/categories in Arabic

- [ ] **Service Detail Sections**
  - [ ] Section headings in Arabic
  - [ ] Body content in Arabic
  - [ ] List items/bullet points in Arabic
  - [ ] CTA buttons in Arabic

- [ ] **Sidebar/Filters** (if present)
  - [ ] Filter labels in Arabic
  - [ ] Category names in Arabic
  - [ ] Search placeholder in Arabic

#### Hidden Attributes (DevTools Inspection)
- [ ] All `aria-label` attributes in Arabic
- [ ] All `title` attributes in Arabic
- [ ] All `alt` text in Arabic

---

### 3. Projects Page (`http://localhost:8888/projects/?lang=ar`)

#### Visual Elements to Check
- [ ] **Page Title/Heading**
  - [ ] Main page title in Arabic
  - [ ] Breadcrumb navigation in Arabic

- [ ] **Project Grid/List**
  - [ ] Project titles in Arabic
  - [ ] Project descriptions/excerpts in Arabic
  - [ ] Project categories/tags in Arabic
  - [ ] "Read More" / "View Project" links in Arabic

- [ ] **Project Filters** (if present)
  - [ ] Filter controls in Arabic
  - [ ] Category labels in Arabic
  - [ ] Sort options in Arabic

- [ ] **Project Detail View** (click on a project)
  - [ ] Project title in Arabic
  - [ ] Project description in Arabic
  - [ ] Section headings in Arabic
  - [ ] Client name (acceptable if in English - proper noun)
  - [ ] Technologies/tags in Arabic or English (technical terms acceptable)
  - [ ] Navigation (previous/next project) in Arabic

#### Hidden Attributes (DevTools Inspection)
- [ ] Project image `alt` attributes in Arabic
- [ ] Link `aria-label` attributes in Arabic
- [ ] Icon `title` attributes in Arabic

---

### 4. About Page (`http://localhost:8888/about/?lang=ar`)

#### Visual Elements to Check
- [ ] **Page Title/Heading**
  - [ ] Main page title in Arabic
  - [ ] Breadcrumb navigation in Arabic

- [ ] **About Content**
  - [ ] Section headings in Arabic
  - [ ] Paragraphs in Arabic
  - [ ] Team member names (acceptable if in English)
  - [ ] Team member titles/roles in Arabic
  - [ ] Company information in Arabic

- [ ] **Timeline/Milestones** (if present)
  - [ ] Timeline labels in Arabic
  - [ ] Milestone descriptions in Arabic
  - [ ] Dates formatted appropriately

#### Hidden Attributes (DevTools Inspection)
- [ ] Team member image `alt` attributes in Arabic
- [ ] All `aria-label` attributes in Arabic

---

### 5. Contact Page (`http://localhost:8888/contact-us/?lang=ar`)

#### Visual Elements to Check
- [ ] **Page Title/Heading**
  - [ ] Main page title in Arabic
  - [ ] Breadcrumb navigation in Arabic

- [ ] **Contact Form**
  - [ ] Form field labels in Arabic
  - [ ] Placeholder text in Arabic
  - [ ] Submit button in Arabic
  - [ ] Required field indicators in Arabic
  - [ ] Privacy/consent text in Arabic

- [ ] **Contact Information**
  - [ ] Section headings in Arabic
  - [ ] Address labels in Arabic
  - [ ] Phone/email labels in Arabic
  - [ ] Social media links labeled in Arabic

- [ ] **Form Validation Testing**
  - [ ] Submit empty form - error messages in Arabic
  - [ ] Submit invalid email - error message in Arabic
  - [ ] Submit successfully - success message in Arabic

#### Hidden Attributes (DevTools Inspection)
- [ ] Input `placeholder` attributes in Arabic
- [ ] Input `aria-label` attributes in Arabic
- [ ] Button `aria-label` attributes in Arabic

---

### 6. Header Navigation (All Pages)

#### Visual Elements to Check
- [ ] **Logo**
  - [ ] Logo alt text in Arabic (if applicable)
  - [ ] Company name in Arabic or English (brand name acceptable)

- [ ] **Main Navigation Menu**
  - [ ] Menu item labels in Arabic
  - [ ] Dropdown/submenu items in Arabic
  - [ ] Mobile menu toggle button in Arabic

- [ ] **Language Switcher**
  - [ ] Current language displayed correctly
  - [ ] Language options labeled appropriately

- [ ] **Search Bar** (if present)
  - [ ] Search placeholder in Arabic
  - [ ] Search button text in Arabic

- [ ] **Call-to-Action Buttons**
  - [ ] "Get Quote" / "Contact Us" buttons in Arabic

#### Hidden Attributes (DevTools Inspection)
- [ ] Navigation `aria-label` attributes in Arabic
- [ ] Menu toggle `aria-label` in Arabic
- [ ] Search input `aria-label` in Arabic

---

### 7. Footer (All Pages)

#### Visual Elements to Check
- [ ] **Footer Sections**
  - [ ] Section headings in Arabic
  - [ ] Link text in Arabic
  - [ ] Contact information labels in Arabic
  - [ ] Social media labels in Arabic

- [ ] **Copyright Notice**
  - [ ] Copyright text in Arabic
  - [ ] Year displayed correctly
  - [ ] Company name (acceptable if in English)

- [ ] **Footer Navigation**
  - [ ] Menu item labels in Arabic
  - [ ] Legal links (Privacy, Terms) in Arabic

- [ ] **Newsletter/Subscription** (if present)
  - [ ] Form labels in Arabic
  - [ ] Placeholder text in Arabic
  - [ ] Submit button in Arabic

#### Hidden Attributes (DevTools Inspection)
- [ ] Social media icon `aria-label` attributes in Arabic
- [ ] Footer link `title` attributes in Arabic

---

### 8. Additional Pages (if applicable)

#### Blog/News Page
- [ ] Page title in Arabic
- [ ] Post titles in Arabic
- [ ] Post excerpts in Arabic
- [ ] "Read More" links in Arabic
- [ ] Pagination controls in Arabic
- [ ] Category/tag labels in Arabic

#### Search Results Page
- [ ] "Search Results" heading in Arabic
- [ ] Result count text in Arabic
- [ ] "No results found" message in Arabic
- [ ] Search again prompt in Arabic

#### 404 Error Page
- [ ] "Page Not Found" heading in Arabic
- [ ] Error message in Arabic
- [ ] "Return Home" button in Arabic

---

## DevTools Inspection Procedure

### How to Inspect Hidden Attributes

1. **Open DevTools**
   - Right-click on any element → "Inspect"
   - Or press F12 / Cmd+Option+I

2. **Inspect Aria Labels**
   ```html
   <!-- Look for aria-label attributes -->
   <button aria-label="افتح القائمة">...</button>
   ```

3. **Inspect Placeholders**
   ```html
   <!-- Check input placeholders -->
   <input placeholder="اكتب رسالتك هنا..." />
   ```

4. **Inspect Alt Text**
   ```html
   <!-- Check image alt attributes -->
   <img src="..." alt="شعار أرقام ويب" />
   ```

5. **Inspect Title Attributes**
   ```html
   <!-- Check title attributes on links/icons -->
   <a href="..." title="اتصل بنا">...</a>
   ```

### Common DevTools Shortcuts
- **Select Element:** Ctrl+Shift+C / Cmd+Shift+C
- **Search HTML:** Ctrl+F / Cmd+F in Elements tab
- **Filter by Attribute:** Type `[aria-label]` in Elements search

---

## Acceptable English Text

The following English text is **acceptable** and not considered "leakage":

### Proper Nouns
- Company name: "Arqam Web" (brand identity)
- Client names: "Coca-Cola", "Samsung", etc.
- Person names: "John Smith", etc.

### Technical Terms
- Technology names: "WordPress", "React", "PHP"
- Code snippets or technical specifications
- Social media platform names: "Facebook", "Twitter"

### Brand Elements
- Trademarked terms
- Product names
- Third-party service names

### Domain-Specific Terms
- Terms commonly used in English in the Arabic market
- Industry-standard abbreviations (SEO, UI/UX, CMS)

---

## Known Issues to Document

If any English text is found during verification, document it here:

### Critical Issues (User-Facing Text)
| Location | Element | English Text Found | Expected Arabic | Priority |
|----------|---------|-------------------|-----------------|----------|
| _Example: Homepage_ | _Hero CTA_ | _"Learn More"_ | _"اعرف المزيد"_ | _High_ |

### Medium Issues (Attributes/Hidden Text)
| Location | Attribute | English Text Found | Expected Arabic | Priority |
|----------|-----------|-------------------|-----------------|----------|
| _Example: Header_ | _aria-label_ | _"Open menu"_ | _"افتح القائمة"_ | _Medium_ |

### Low Issues (Acceptable/Edge Cases)
| Location | Element | Text | Reason Acceptable | Notes |
|----------|---------|------|-------------------|-------|
| _Example: Footer_ | _Brand name_ | _"Arqam Web"_ | _Proper noun_ | _OK_ |

---

## Form Validation Testing

### Contact Form Testing Procedure

1. **Test Required Field Validation**
   - Leave all fields empty
   - Click submit button
   - **Expected:** Error messages in Arabic

2. **Test Email Validation**
   - Enter invalid email: "test@"
   - Click submit button
   - **Expected:** "البريد الإلكتروني غير صحيح" or similar

3. **Test Character Limits** (if applicable)
   - Enter very long text in message field
   - **Expected:** Character limit message in Arabic

4. **Test Success Message**
   - Fill form correctly
   - Click submit
   - **Expected:** Success message in Arabic

### Expected Arabic Validation Messages
- **Required field:** "هذا الحقل مطلوب"
- **Invalid email:** "البريد الإلكتروني غير صحيح"
- **Success:** "تم إرسال رسالتك بنجاح"
- **Error:** "حدث خطأ، يرجى المحاولة مرة أخرى"

---

## Verification Results

### Summary Statistics
- **Total Pages Checked:** _[To be filled]_
- **Pages Passing:** _[To be filled]_
- **English Leakage Instances Found:** _[To be filled]_
- **Critical Issues:** _[To be filled]_
- **Medium Issues:** _[To be filled]_
- **Low Issues (Acceptable):** _[To be filled]_

### Pass/Fail Status by Page
| Page | Status | Issues Found | Notes |
|------|--------|--------------|-------|
| Homepage | ⏳ Pending | - | - |
| Services | ⏳ Pending | - | - |
| Projects | ⏳ Pending | - | - |
| About | ⏳ Pending | - | - |
| Contact | ⏳ Pending | - | - |
| Header | ⏳ Pending | - | - |
| Footer | ⏳ Pending | - | - |

### Overall Verification Status
- [ ] **PASS:** Zero English leakage (excluding acceptable proper nouns)
- [ ] **FAIL:** English text found - see issues table above

---

## Recommendations

### For Developers
1. Use the translation validation script before each deployment:
   ```bash
   php bin/validate-translations.php --check
   ```

2. Always wrap new strings in translation functions:
   ```php
   // Correct
   esc_html_e('Click here', 'arqamweb');
   
   // Incorrect
   echo 'Click here';
   ```

3. Test in Arabic mode during development, not just before deployment

### For Content Editors
1. Always preview content in both languages before publishing
2. Verify ACF field content is entered in both language versions
3. Check WPML translation status for each page/post

### For QA Team
1. Include Arabic mode verification in every release checklist
2. Screenshot each page in Arabic for regression testing
3. Test all interactive elements (forms, menus, modals) in Arabic

---

## Technical Notes

### Translation Coverage Summary
Based on the translation audit and refactoring phases:

- **Total translatable strings identified:** 885 strings
- **Strings wrapped in Phase 2 (Critical):** 68 strings
- **Strings wrapped in Phase 3 (Attributes):** 4 strings
- **Arabic translations completed:** 888 translations
- **.pot file line count:** 3,577 lines (52.8% increase from baseline)
- **.mo file size:** 75KB
- **Validation script status:** PASS (zero unwrapped strings detected)

### Files Refactored
- `template-parts/frontpage/frontpage-services.php` ✅
- `template-parts/frontpage/frontpage-slider.php` ✅
- `template-parts/frontpage/frontpage-numbers.php` ✅
- `footer.php` ✅
- `inc/template-tags.php` ✅
- `about.php` ✅
- `contact.php` ✅

### Validation Tools Available
- **Translation validation script:** `bin/validate-translations.php`
- **POT generator script:** `bin/generate-pot.php`
- **Documentation:** `docs/translation-validation.md`

---

## Appendix: Screenshot Checklist

For each page, take the following screenshots:

### Homepage
1. Above the fold (hero section)
2. Services section
3. Numbers/statistics section
4. Projects section
5. Testimonials section
6. Contact section
7. Footer

### Services Page
1. Full page view
2. Individual service card (zoomed)
3. Service detail view

### Projects Page
1. Project grid view
2. Individual project card
3. Project detail view

### Contact Page
1. Full page view
2. Contact form (empty state)
3. Form validation errors
4. Form success message

### Header/Footer
1. Desktop header (full navigation)
2. Mobile header (hamburger menu open)
3. Footer (full view)

### DevTools Screenshots
1. Example of aria-label inspection
2. Example of placeholder inspection
3. Example of alt text inspection

---

## Sign-off

**Visual Verification Completed By:** _[Name]_  
**Date:** _[Date]_  
**Status:** _[PASS / FAIL]_  
**Notes:** _[Additional comments]_

---

**Next Steps:**
- [ ] Start MAMP server
- [ ] Perform visual verification following this checklist
- [ ] Document all findings in the tables above
- [ ] Update sign-off section upon completion
- [ ] File issues for any English leakage found
- [ ] Re-test after fixes applied
