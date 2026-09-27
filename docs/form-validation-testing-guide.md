# Form Validation Testing Guide - Arabic Mode

## Purpose
This guide provides step-by-step instructions for testing form validation messages and dynamic content in Arabic mode to ensure zero English text leakage in error messages, success messages, and AJAX responses.

## Prerequisites

Before starting this verification, ensure:

1. **MAMP Server Running:** Start MAMP and verify WordPress is accessible at `http://localhost:8888`
2. **Arabic Language Active:** WordPress language set to Arabic (العربية)
3. **WPML/Polylang Plugin Active:** Language switcher plugin working correctly
4. **Contact Form 7 Plugin Active:** CF7 plugin installed and configured
5. **Browser Developer Tools:** Chrome/Firefox/Safari DevTools available for network inspection

## Forms to Test

This theme contains two main form systems:

### 1. Contact Form 7 (Contact Us Page)
- **Location:** `/contact-us/` or Contact Us page
- **File:** `template-parts/contact.php`
- **Shortcode:** `[contact-form-7 id="4f85ced"]`
- **Validation:** Handled by Contact Form 7 plugin + WPML/Polylang integration

### 2. Custom Quote Request Form (AJAX)
- **Location:** `/request-a-quote/` or Quote page
- **File:** `template-parts/quote.php`
- **Handler:** `inc/helpers/ajax-handlers.php` (function: `arqamweb_handle_quote_request()`)
- **Validation:** Custom PHP validation with `wp_send_json_error()` and `wp_send_json_success()`

---

## Testing Procedure

### Part A: Contact Form 7 Validation Messages

#### Step 1: Navigate to Contact Form
1. Open browser: `http://localhost:8888/?lang=ar`
2. Click on Contact Us / اتصل بنا menu item
3. Verify page loads in Arabic
4. Scroll to contact form section

#### Step 2: Test Required Field Validation
**Test Case:** Submit empty form

1. Click the submit button WITHOUT filling any fields
2. **Expected Result:** Validation errors appear in Arabic
   - "الرجاء ملء هذا الحقل." (Please fill out this field)
   - Or CF7's default Arabic message configured in WPML

**✅ PASS Criteria:**
- All error messages display in Arabic
- No English text appears in validation messages

**❌ FAIL Criteria:**
- Any error message appears in English
- Mixed Arabic/English validation messages

#### Step 3: Test Email Field Validation
**Test Case:** Submit invalid email format

1. Fill in name field with any text
2. Enter invalid email: `test` (without @ symbol)
3. Fill in message field
4. Click submit button
5. **Expected Result:** Email validation error in Arabic
   - "البريد الإلكتروني غير صالح." (Invalid email address)
   - Or CF7's configured Arabic email error

**✅ PASS Criteria:**
- Email validation message displays in Arabic
- Error message clearly indicates email format issue

#### Step 4: Test Success Message
**Test Case:** Submit valid contact form

1. Fill all required fields correctly:
   - Name: `محمد أحمد` (Arabic name)
   - Email: `test@example.com`
   - Message: `رسالة تجريبية` (Test message)
2. Click submit button
3. **Expected Result:** Success message in Arabic
   - "تم إرسال رسالتك بنجاح." (Your message has been sent successfully)
   - Or CF7's configured Arabic success message

**✅ PASS Criteria:**
- Success message displays in Arabic
- No English text in confirmation message
- Form may reset or show loading indicator

**Record Results:**

| Test Case | Expected (AR) | Actual | Status |
|-----------|--------------|--------|--------|
| Empty form validation | الرجاء ملء هذا الحقل | | ⬜ |
| Invalid email validation | البريد الإلكتروني غير صالح | | ⬜ |
| Success message | تم إرسال رسالتك بنجاح | | ⬜ |

---

### Part B: Custom Quote Form AJAX Validation

The custom quote form uses AJAX with validation messages defined in `inc/helpers/ajax-handlers.php`. All validation messages were verified as properly wrapped with `__()` translation function during Phase 1 audit.

#### Step 1: Navigate to Quote Form
1. Open browser: `http://localhost:8888/?lang=ar`
2. Navigate to: `/request-a-quote/` or "احصل على عرض سعر"
3. Verify page loads in Arabic

#### Step 2: Test Service Selection Validation
**Test Case:** Submit without selecting service

**Code Reference (ajax-handlers.php:14):**
```php
wp_send_json_error( __( 'Please select a service.', 'arqamweb' ) );
```

**Expected Arabic Translation:**
```
"الرجاء اختيار خدمة."
```

**Steps:**
1. Scroll to the quote form
2. Fill in name and email fields
3. Do NOT select any service (Branding/Website/SEO tabs)
4. Click submit button
5. Open DevTools → Console/Network tab to see AJAX response

**✅ PASS Criteria:**
- Error message displays in Arabic: "الرجاء اختيار خدمة."
- No English text in error alert/notification

**❌ FAIL Criteria:**
- Error shows "Please select a service." (English)
- No error message appears

#### Step 3: Test Name and Email Validation
**Test Case:** Submit with empty name or invalid email

**Code Reference (ajax-handlers.php:33):**
```php
wp_send_json_error( __( 'Name and a valid email address are required.', 'arqamweb' ) );
```

**Expected Arabic Translation:**
```
"الاسم وعنوان بريد إلكتروني صالح مطلوبان."
```

**Test Steps:**
1. Select a service (e.g., Website Design)
2. Leave name field empty OR enter invalid email
3. Click submit button

**✅ PASS Criteria:**
- Error message displays in Arabic
- Message clearly states name and email requirements

#### Step 4: Test File Upload Validation
**Test Case:** Upload file larger than 8MB

**Code Reference (ajax-handlers.php:77):**
```php
wp_send_json_error( __( 'Uploaded files must be 8 MB or smaller.', 'arqamweb' ) );
```

**Expected Arabic Translation:**
```
"يجب أن تكون الملفات المرفوعة بحجم 8 ميجابايت أو أصغر."
```

**Test Steps:**
1. Fill out quote form correctly
2. Attempt to upload a file > 8MB (if file upload field exists)
3. Click submit button

**✅ PASS Criteria:**
- File size error displays in Arabic
- Clear indication of 8MB limit

**Note:** Only test this if the quote form has file upload fields visible for the selected service.

#### Step 5: Test Success Response
**Test Case:** Submit valid quote request

**Code Reference (ajax-handlers.php:288, 295):**
```php
wp_send_json_success( __( 'Your quote request has been received.', 'arqamweb' ) );
```

**Expected Arabic Translation:**
```
"تم استلام طلب عرض السعر الخاص بك."
```

**Test Steps:**
1. Select a service (Branding, Website, or SEO)
2. Fill all required fields correctly:
   - Name: `أحمد محمد`
   - Email: `ahmed@example.com`
   - Phone: `+966501234567`
   - Answer all service-specific questions
3. Click submit button
4. Wait for AJAX response

**✅ PASS Criteria:**
- Success message displays in Arabic
- No English text in confirmation
- Form may show success state or reset

**❌ FAIL Criteria:**
- Success message appears in English
- Mixed language confirmation

#### Step 6: Test Security/Nonce Validation
**Test Case:** Submit with invalid security token (edge case)

**Code Reference (ajax-handlers.php:7):**
```php
wp_send_json_error( __( 'Security check failed. Please refresh and try again.', 'arqamweb' ) );
```

**Expected Arabic Translation:**
```
"فشل فحص الأمان. الرجاء تحديث الصفحة والمحاولة مرة أخرى."
```

**Test Steps:**
1. Open DevTools → Console
2. Try to manipulate nonce field (advanced testing)
3. Submit form
4. OR simply wait 24+ hours with form open and try to submit

**✅ PASS Criteria:**
- Security error displays in Arabic
- Clear instruction to refresh page

---

### Part C: DevTools Network Inspection

For AJAX forms, you can inspect the actual JSON responses to verify translations:

#### Step 1: Open Browser DevTools
1. Press `F12` or `Cmd+Option+I` (Mac) / `Ctrl+Shift+I` (Windows)
2. Go to **Network** tab
3. Filter by **XHR** or **Fetch** requests

#### Step 2: Submit Quote Form
1. Fill out and submit the quote form
2. Watch Network tab for AJAX request named `admin-ajax.php`
3. Click on the request to inspect

#### Step 3: Check Response Data
1. Go to **Response** tab in the request details
2. Verify JSON structure:

**Error Response Example:**
```json
{
  "success": false,
  "data": "الرجاء اختيار خدمة."
}
```

**Success Response Example:**
```json
{
  "success": true,
  "data": "تم استلام طلب عرض السعر الخاص بك."
}
```

**✅ PASS Criteria:**
- `data` field contains Arabic text
- No English strings in JSON response

**❌ FAIL Criteria:**
- `data` field contains English text
- Response shows untranslated strings

---

## Expected Validation Messages (Arabic Translations)

All validation messages in `inc/helpers/ajax-handlers.php` are properly wrapped with `__()` function and should have Arabic translations in `languages/arqamweb-ar.po`:

### Custom Quote Form Messages

| English (Source) | Arabic Translation | Context |
|------------------|-------------------|---------|
| Security check failed. Please refresh and try again. | فشل فحص الأمان. الرجاء تحديث الصفحة والمحاولة مرة أخرى. | Nonce validation |
| Please select a service. | الرجاء اختيار خدمة. | Service selection |
| Name and a valid email address are required. | الاسم وعنوان بريد إلكتروني صالح مطلوبان. | Required fields |
| One of the uploaded files could not be processed. | تعذر معالجة أحد الملفات المرفوعة. | File upload error |
| Uploaded files must be 8 MB or smaller. | يجب أن تكون الملفات المرفوعة بحجم 8 ميجابايت أو أصغر. | File size limit |
| Your quote request has been received. | تم استلام طلب عرض السعر الخاص بك. | Success message |
| We could not send your request. Please email us directly. | لم نتمكن من إرسال طلبك. يرجى مراسلتنا عبر البريد الإلكتروني مباشرة. | Email failure |

**Verification Note:** These translations should exist in `languages/arqamweb-ar.po` from Phase 4 (subtask-4-2). If any message appears in English, check that:
1. The `.mo` file is compiled and loaded
2. The translation exists in the `.po` file
3. WordPress is using the correct locale

---

## Contact Form 7 Messages

Contact Form 7 has its own set of validation messages that are translated separately through WPML/Polylang integration:

| Message Type | English Default | Expected Arabic |
|--------------|----------------|-----------------|
| Required field | The field is required. | هذا الحقل مطلوب. |
| Invalid email | The e-mail address entered is invalid. | عنوان البريد الإلكتروني المُدخل غير صحيح. |
| Invalid phone | The telephone number is invalid. | رقم الهاتف غير صحيح. |
| Mail sent successfully | Thank you for your message. It has been sent. | شكراً لك على رسالتك. تم إرسالها. |
| Mail failed | There was an error trying to send your message. | حدث خطأ أثناء محاولة إرسال رسالتك. |
| Validation error | One or more fields have an error. | حقل واحد أو أكثر به خطأ. |
| Spam blocked | Failed to send your message. Please try later or contact the administrator. | فشل إرسال رسالتك. يُرجى المحاولة لاحقاً. |
| Acceptance required | You must accept the terms and conditions. | يجب عليك قبول الشروط والأحكام. |

**Note:** CF7 messages are configured in:
1. CF7 plugin settings (Messages tab)
2. WPML String Translation (if using WPML)
3. `.po` file for Contact Form 7 domain (`contact-form-7`)

---

## Issue Tracking

Use this table to record any English text found during testing:

| Form Type | Field/Action | Expected (AR) | Found (Actual) | Severity | Status |
|-----------|-------------|--------------|----------------|----------|--------|
| Contact Form 7 | Empty name validation | هذا الحقل مطلوب | | 🔴 Critical | ⬜ |
| Quote Form | Service selection error | الرجاء اختيار خدمة | | 🔴 Critical | ⬜ |
| Quote Form | Email validation | الاسم وعنوان بريد إلكتروني صالح مطلوبان | | 🔴 Critical | ⬜ |
| Quote Form | File upload error | يجب أن تكون الملفات المرفوعة بحجم 8 ميجابايت أو أصغر | | 🟡 Medium | ⬜ |
| Quote Form | Success message | تم استلام طلب عرض السعر الخاص بك | | 🔴 Critical | ⬜ |

**Severity Legend:**
- 🔴 **Critical:** User-facing error/success messages (high visibility)
- 🟡 **Medium:** Edge case errors (file upload, security checks)
- 🟢 **Low:** Optional messages or rare scenarios

---

## Acceptance Criteria

### Overall PASS Criteria
To mark this subtask as **COMPLETED**, the following must be true:

✅ **Contact Form 7:**
- [ ] All required field validation messages display in Arabic
- [ ] Email format validation message displays in Arabic
- [ ] Success message after form submission displays in Arabic
- [ ] No English text appears in any CF7 validation scenario

✅ **Custom Quote Form:**
- [ ] Service selection error displays in Arabic
- [ ] Name/email validation error displays in Arabic
- [ ] Success message displays in Arabic
- [ ] AJAX JSON responses contain Arabic text (verified in DevTools)
- [ ] No English text in any validation message or dynamic content

✅ **DevTools Verification:**
- [ ] Network tab shows `admin-ajax.php` responses with Arabic `data` values
- [ ] No English strings in JSON responses
- [ ] All error and success messages properly translated

### Overall FAIL Criteria
Mark as **FAILED** if:

❌ Any validation message appears in English
❌ Mixed Arabic/English text in error messages
❌ Success messages show untranslated strings
❌ DevTools JSON responses show English text in `data` field

---

## Troubleshooting

### Issue: All Messages Appear in English

**Possible Causes:**
1. WordPress locale not set to Arabic
2. `.mo` file not loaded or outdated
3. Translation strings missing from `.po` file
4. Wrong text domain used

**Solutions:**
1. Check Settings → General → Site Language is set to "العربية"
2. Verify `languages/arqamweb-ar.mo` exists and is recent (75KB, compiled in Phase 4)
3. Check `languages/arqamweb-ar.po` contains the validation messages
4. Run `php bin/validate-translations.php --verbose` to check for issues

### Issue: Contact Form 7 Messages Still in English

**Possible Causes:**
1. CF7 uses separate text domain `contact-form-7`
2. WPML String Translation not configured
3. CF7 Messages tab not translated

**Solutions:**
1. Go to CF7 → Contact → Edit → Messages tab
2. Manually translate all messages to Arabic
3. OR install CF7's Arabic language pack
4. OR configure WPML String Translation for CF7 domain

### Issue: AJAX Form Returns English but Code is Wrapped

**Possible Causes:**
1. `.mo` file not loaded at AJAX execution time
2. Locale switched after AJAX handler runs
3. Translation missing from `.po` file

**Solutions:**
1. Clear WordPress object cache
2. Regenerate `.mo` file: `php bin/compile-mo.php`
3. Verify translation exists in `.po` for the exact English string
4. Check `load_theme_textdomain()` is called in `functions.php`

---

## Technical Notes

### Code Verification (Phase 1 Audit Findings)

All validation messages in `inc/helpers/ajax-handlers.php` were verified as properly wrapped with `__()` function:

**File:** `inc/helpers/ajax-handlers.php`

| Line | Function | Status |
|------|----------|--------|
| 7 | `wp_send_json_error( __( 'Security check failed...', 'arqamweb' ) )` | ✅ Wrapped |
| 14 | `wp_send_json_error( __( 'Please select a service.', 'arqamweb' ) )` | ✅ Wrapped |
| 33 | `wp_send_json_error( __( 'Name and a valid email...', 'arqamweb' ) )` | ✅ Wrapped |
| 73 | `wp_send_json_error( __( 'One of the uploaded files...', 'arqamweb' ) )` | ✅ Wrapped |
| 77 | `wp_send_json_error( __( 'Uploaded files must be...', 'arqamweb' ) )` | ✅ Wrapped |
| 288 | `wp_send_json_success( __( 'Your quote request has been received.', 'arqamweb' ) )` | ✅ Wrapped |
| 295 | `wp_send_json_success( __( 'Your quote request has been received.', 'arqamweb' ) )` | ✅ Wrapped |
| 297 | `wp_send_json_error( __( 'We could not send your request...', 'arqamweb' ) )` | ✅ Wrapped |

**Conclusion:** All custom validation messages are properly internationalized. If they appear in English during testing, the issue is with translation files (`.po`/`.mo`) or WordPress locale settings, NOT with the code.

### Translation Files Verification (Phase 4 Completion)

From Session 13 completion notes:
- `.pot` file: 885 strings extracted
- `.po` file: 888 Arabic translations added
- `.mo` file: Compiled successfully (75KB, 888 messages)
- Validation script: **PASS** (zero fuzzy, 100% coverage)

All validation messages from `ajax-handlers.php` were confirmed translated in Phase 4 (subtask-4-2).

---

## Next Steps

### If All Tests PASS ✅

1. **Update implementation plan:**
   ```bash
   # Update subtask-6-3 status to "completed" in implementation_plan.json
   ```

2. **Create summary report:**
   - Document all test results
   - Screenshot examples of Arabic validation messages
   - Note any edge cases discovered

3. **Commit completion:**
   ```bash
   git add docs/form-validation-testing-guide.md
   git commit -m "auto-claude: subtask-6-3 - Form validation testing guide and verification complete"
   ```

4. **Mark Phase 6 complete:**
   - All 3 subtasks in Phase 6 complete (6-1 ✅, 6-2 ✅, 6-3 ✅)
   - Feature spec 006 COMPLETE ✅

### If Tests FAIL ❌

1. **Document specific failures** in Issue Tracking table above
2. **Diagnose root cause** using Troubleshooting section
3. **Fix translations** in `.po` file if missing
4. **Recompile `.mo` file** if needed
5. **Re-run tests** until all validation messages display in Arabic

---

## Related Documentation

- **Translation Audit Report:** `docs/translation-audit-report.md`
- **Translation Validation Script:** `bin/validate-translations.php`
- **Translation Validation Guide:** `docs/translation-validation.md`
- **Visual Verification Checklist:** `docs/arabic-visual-verification.md`
- **DevTools Inspection Guide:** `docs/devtools-inspection-guide.md`

---

## Sign-Off

**Manual Verification Required:**
This is a manual testing task that requires human interaction with forms in a browser. An AI assistant cannot click buttons or submit forms directly.

**Tester Name:** _________________________

**Test Date:** _________________________

**Overall Result:** ⬜ PASS / ⬜ FAIL

**Notes:**
_________________________________________________________________
_________________________________________________________________
_________________________________________________________________

---

**Document Version:** 1.0  
**Created:** 2026-09-27  
**Phase:** 6 - Visual Verification  
**Subtask:** 6-3 - Test form validation messages and dynamic content in Arabic mode
