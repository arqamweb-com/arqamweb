# Translation Validation Guide

## Overview

The Arqam Web theme includes a comprehensive translation validation script that ensures 100% bilingual coverage. This script automatically detects hard-coded English strings that are not wrapped in WordPress translation functions, preventing English text from appearing in the Arabic version of the site.

**Location:** `bin/validate-translations.php`

## Why This Matters

For a bilingual WordPress agency, showing untranslated English text in Arabic mode damages credibility and trust. This validation script:

- **Prevents English leakage** in Arabic mode by catching hard-coded strings before they reach production
- **Enforces translation best practices** across all template files, components, and helper functions
- **Saves time** by automating manual translation audits
- **Integrates with CI/CD** to block deployments with translation gaps

## Quick Start

### Run Before Every Commit

```bash
php bin/validate-translations.php --check
```

**Exit codes:**
- `0` = All strings properly wrapped ✅
- `1` = Hard-coded strings detected ❌

### Get Detailed Report

```bash
php bin/validate-translations.php --verbose
```

Shows file paths, line numbers, and code snippets for each issue found.

### Generate JSON Report

```bash
php bin/validate-translations.php --report
```

Machine-readable JSON output for CI/CD integration or automated workflows.

## What It Checks

The validation script scans **all PHP files** in the theme for:

### 1. Hard-coded Strings in PHP Arrays

**❌ FAILS:**
```php
$services = [
    ['title' => 'Website Design', 'copy' => 'We build websites']
];
```

**✅ PASSES:**
```php
$services = [
    ['title' => __('Website Design', 'arqamweb'), 'copy' => __('We build websites', 'arqamweb')]
];
```

### 2. Hard-coded HTML Attributes

**❌ FAILS:**
```php
<button aria-label="Close menu">X</button>
<input placeholder="Enter your name" />
<img alt="Company logo" />
<a title="Read more">...</a>
```

**✅ PASSES:**
```php
<button aria-label="<?php esc_attr_e('Close menu', 'arqamweb'); ?>">X</button>
<input placeholder="<?php esc_attr_e('Enter your name', 'arqamweb'); ?>" />
<img alt="<?php esc_attr_e('Company logo', 'arqamweb'); ?>" />
<a title="<?php esc_attr_e('Read more', 'arqamweb'); ?>">...</a>
```

### 3. Hard-coded Echo Statements

**❌ FAILS:**
```php
echo 'Welcome to our website';
print 'Contact us today';
```

**✅ PASSES:**
```php
echo esc_html__('Welcome to our website', 'arqamweb');
esc_html_e('Contact us today', 'arqamweb');
```

### 4. String Concatenation Without sprintf()

**❌ FAILS:**
```php
echo 'Copyright © ' . $year . ' Company Name';
```

**✅ PASSES:**
```php
printf(__('Copyright © %s Company Name', 'arqamweb'), $year);
```

## Smart Filtering

The script intelligently **excludes** common false positives:

- **Proper nouns:** Brand names, country names, person names
- **Technical strings:** URLs, file paths, CSS classes, HTML IDs
- **Variables:** PHP variable names and function parameters
- **Wrapped arrays:** Arrays where values are wrapped during output (e.g., `echo esc_html(__($item['title'], 'arqamweb'))`)

This reduces noise and focuses on genuine translation gaps.

## Output Modes

### 1. Check Mode (CI/CD)

```bash
php bin/validate-translations.php --check
```

**Output:**
```
✅ All strings properly wrapped (0 issues found)
```

**Use for:** Pre-commit hooks, GitHub Actions, CI/CD pipelines

### 2. Verbose Mode (Development)

```bash
php bin/validate-translations.php --verbose
```

**Output:**
```
Translation Validation Report
============================

Files scanned: 153

Issues found in 2 files:

File: template-parts/frontpage/frontpage-services.php
Line 12: 'title' => 'Website Design'
  → Wrap with __('Website Design', 'arqamweb')

File: header.php
Line 45: <button aria-label="Menu">
  → Change to aria-label="<?php esc_attr_e('Menu', 'arqamweb'); ?>"

Total issues: 2
```

**Use for:** Local development, debugging translation issues

### 3. Report Mode (Automation)

```bash
php bin/validate-translations.php --report
```

**Output:**
```json
{
  "summary": {
    "files_scanned": 153,
    "files_with_issues": 2,
    "total_issues": 2,
    "status": "FAIL"
  },
  "issues": [
    {
      "file": "template-parts/frontpage/frontpage-services.php",
      "line": 12,
      "code": "'title' => 'Website Design'",
      "suggestion": "Wrap with __('Website Design', 'arqamweb')"
    }
  ]
}
```

**Use for:** Integration with other tools, dashboards, reporting systems

## Integration with Development Workflow

### Pre-Commit Hook (Recommended)

Add to `.git/hooks/pre-commit`:

```bash
#!/bin/sh
echo "Running translation validation..."
php bin/validate-translations.php --check

if [ $? -ne 0 ]; then
    echo "❌ COMMIT BLOCKED: Fix translation issues first"
    echo "Run: php bin/validate-translations.php --verbose"
    exit 1
fi

echo "✅ Translation validation passed"
```

Make it executable:
```bash
chmod +x .git/hooks/pre-commit
```

### GitHub Actions (CI/CD)

Add to `.github/workflows/validate-translations.yml`:

```yaml
name: Translation Validation

on: [push, pull_request]

jobs:
  validate:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.0'
      - name: Validate translations
        run: php bin/validate-translations.php --check
```

### Manual Testing Before Deployment

```bash
# 1. Run validation
php bin/validate-translations.php --check

# 2. If issues found, get details
php bin/validate-translations.php --verbose

# 3. Fix issues in your code editor

# 4. Verify fixes
php bin/validate-translations.php --check

# 5. Commit when clean
git add .
git commit -m "Fix translation coverage"
```

## Common Issues & Fixes

### Issue: Hard-coded Array Values

**Problem:**
```php
$stats = [
    ['label' => 'Years of experience', 'value' => '10+']
];
```

**Fix:**
```php
$stats = [
    ['label' => __('Years of experience', 'arqamweb'), 'value' => '10+']
];
// Output: echo esc_html($stat['label']); (NOT __() again)
```

### Issue: Missing aria-label Translation

**Problem:**
```php
<button aria-label="Close">X</button>
```

**Fix:**
```php
<button aria-label="<?php esc_attr_e('Close', 'arqamweb'); ?>">X</button>
```

### Issue: Concatenated Dynamic Strings

**Problem:**
```php
echo 'Posted on ' . $date . ' by ' . $author;
```

**Fix:**
```php
printf(__('Posted on %1$s by %2$s', 'arqamweb'), $date, $author);
```

### Issue: Email Body Hard-coded Strings

**Problem:**
```php
$body = "Name: " . $name . "\n";
$body .= "Email: " . $email . "\n";
```

**Fix:**
```php
$body = __('Name:', 'arqamweb') . ' ' . $name . "\n";
$body .= __('Email:', 'arqamweb') . ' ' . $email . "\n";
```

## Interpreting Results

### ✅ PASS (Exit code 0)

```
All strings properly wrapped (0 issues found)
```

**Meaning:** Your theme has 100% translation coverage. Safe to deploy.

### ❌ FAIL (Exit code 1)

```
Issues found in 3 files:
- template-parts/contact.php (2 issues)
- inc/helpers/ajax-handlers.php (15 issues)
- footer.php (1 issue)
```

**Action Required:**
1. Run `php bin/validate-translations.php --verbose` for details
2. Fix each issue by wrapping strings in appropriate translation functions
3. Re-run validation until it passes
4. Do NOT deploy until validation passes

## Translation Function Reference

Use these WordPress functions based on context:

| Function | Use Case | Example |
|----------|----------|---------|
| `__()` | Return translated string | `$text = __('Hello', 'arqamweb');` |
| `_e()` | Echo translated string | `_e('Welcome', 'arqamweb');` |
| `esc_html__()` | Return escaped HTML | `$safe = esc_html__('Title', 'arqamweb');` |
| `esc_html_e()` | Echo escaped HTML | `esc_html_e('Content', 'arqamweb');` |
| `esc_attr__()` | Return escaped attribute | `$attr = esc_attr__('Label', 'arqamweb');` |
| `esc_attr_e()` | Echo escaped attribute | `esc_attr_e('Placeholder', 'arqamweb');` |
| `sprintf()` | Dynamic strings | `sprintf(__('Hello %s', 'arqamweb'), $name);` |
| `printf()` | Echo dynamic strings | `printf(__('Posted: %s', 'arqamweb'), $date);` |

**Always use text domain:** `'arqamweb'`

## Troubleshooting

### "Permission denied" Error

**Solution:**
```bash
chmod +x bin/validate-translations.php
```

### Script Hangs or Takes Too Long

**Cause:** Very large theme with 500+ files

**Solution:** The script is optimized for performance but scans all PHP files. If needed, modify `$scan_dirs` array in the script to exclude non-template directories.

### False Positives

**Example:** Script flags brand names or proper nouns

**Solution:** The script already filters common proper nouns. If you encounter persistent false positives:
1. Check if the string is truly user-facing
2. If it's a brand name that should NOT be translated, verify it's excluded in the script's `is_proper_noun()` function
3. For edge cases, you can add exclusions to the script

### "No issues found" But English Still Shows in Arabic Mode

**Possible causes:**
1. **JavaScript strings:** This script only checks PHP. Check your `.js` files for hard-coded strings.
2. **Plugin text:** Third-party plugins may have their own translation files. Check plugin settings.
3. **Browser cache:** Clear cache and hard refresh (Cmd+Shift+R / Ctrl+Shift+R)
4. **Missing .mo file:** Ensure `languages/arqamweb-ar.mo` exists and is up to date

## Performance

- **Scan speed:** ~150 files in under 1 second
- **Memory usage:** < 10MB
- **Safe for CI/CD:** Fast enough for every commit/PR

## Best Practices

1. **Run validation before every commit** (use pre-commit hook)
2. **Never skip validation failures** - fix issues immediately
3. **Review verbose output** to understand what needs fixing
4. **Keep .pot, .po, .mo files in sync** after fixing issues
5. **Test in Arabic mode** after validation passes
6. **Document team standards** for translation function usage

## Related Documentation

- [Translation Audit Report](./translation-audit-report.md) - Comprehensive audit findings from Phase 1
- [WordPress i18n Documentation](https://developer.wordpress.org/apis/handbook/internationalization/) - Official WordPress translation guide
- [WPML Best Practices](https://wpml.org/documentation/support/translation-best-practices/) - Multilingual WordPress standards

## Support

If you encounter issues with the validation script:

1. Check this documentation first
2. Review the [Translation Audit Report](./translation-audit-report.md) for examples
3. Ensure you're using the latest version of the script
4. Verify PHP version >= 7.4

## Changelog

- **2026-09-27:** Initial release with comprehensive validation patterns
  - Scans 153 files across all theme directories
  - Smart filtering for proper nouns and false positives
  - Three output modes (check, verbose, report)
  - Ready for CI/CD integration
