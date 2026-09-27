# Arqam Web - WordPress Theme

A fully bilingual (Arabic/English) WordPress theme for Arqam Web digital agency, built with performance, accessibility, and 100% translation coverage.

## Features

- **Fully Bilingual:** 100% translation coverage with zero English leakage in Arabic mode
- **RTL Support:** Full right-to-left layout support for Arabic
- **Performance Optimized:** Fast loading times with modern best practices
- **Accessibility:** WCAG compliant with proper ARIA labels and semantic HTML
- **Translation Validation:** Automated script to ensure translation completeness

## Development

### Translation Validation

**Before every commit**, run the translation validation script to ensure no hard-coded English strings:

```bash
php bin/validate-translations.php --check
```

This script automatically detects:
- Hard-coded strings in PHP arrays
- Untranslated HTML attributes (aria-label, placeholder, alt, title)
- Echo/print statements without translation functions
- String concatenation that needs sprintf()

**Exit codes:**
- `0` = All strings properly wrapped ✅
- `1` = Hard-coded strings detected ❌

**For detailed output:**
```bash
php bin/validate-translations.php --verbose
```

**For JSON report (CI/CD):**
```bash
php bin/validate-translations.php --report
```

📖 **[Complete Translation Validation Guide](./docs/translation-validation.md)**

### Translation Functions

Always use WordPress translation functions with the `arqamweb` text domain:

```php
// Return translated string
__('Hello', 'arqamweb')

// Echo translated string
_e('Welcome', 'arqamweb')

// Escaped HTML (return)
esc_html__('Title', 'arqamweb')

// Escaped HTML (echo)
esc_html_e('Content', 'arqamweb')

// Escaped attribute (return)
esc_attr__('Label', 'arqamweb')

// Escaped attribute (echo)
esc_attr_e('Placeholder', 'arqamweb')

// Dynamic strings
printf(__('Posted on %s', 'arqamweb'), $date)
```

### Translation Files

- `languages/arqamweb.pot` - Template file with all translatable strings (885 strings)
- `languages/arqamweb-ar.po` - Arabic translations (888 translations)
- `languages/arqamweb-ar.mo` - Compiled Arabic translation file (75KB)

**To regenerate translation files:**

```bash
# Generate .pot file
php bin/generate-pot.php

# Merge new strings into .po and translate
# (See bin/final-po-merger.php for automation)

# Compile .mo file
# Use Poedit or msgfmt command
```

## Pre-Commit Hook (Recommended)

Set up automatic validation before every commit:

```bash
# Create pre-commit hook
cat > .git/hooks/pre-commit << 'EOF'
#!/bin/sh
echo "Running translation validation..."
php bin/validate-translations.php --check

if [ $? -ne 0 ]; then
    echo "❌ COMMIT BLOCKED: Fix translation issues first"
    echo "Run: php bin/validate-translations.php --verbose"
    exit 1
fi

echo "✅ Translation validation passed"
EOF

# Make it executable
chmod +x .git/hooks/pre-commit
```

## Documentation

- **[Translation Validation Guide](./docs/translation-validation.md)** - How to use the validation script and ensure translation coverage
- **[Translation Audit Report](./docs/translation-audit-report.md)** - Comprehensive audit findings from all template files

## Tech Stack

- PHP 8.x + WordPress 6.x
- Advanced Custom Fields (ACF) Pro
- Tailwind CSS 3.x
- WPML (WordPress Multilingual Plugin)
- AOS.js (scroll animations)

## Requirements

- PHP >= 8.0
- WordPress >= 6.0
- WPML plugin for language switching
- ACF Pro for custom fields

## Installation

1. Upload theme to `wp-content/themes/arqamweb/`
2. Activate theme in WordPress admin
3. Install required plugins (WPML, ACF Pro)
4. Configure WPML for Arabic/English languages
5. Import demo content (if available)

## Quality Standards

This theme maintains:

- ✅ **100% Translation Coverage** - Zero hard-coded English strings
- ✅ **Validated Translations** - Automated validation on every commit
- ✅ **WCAG Accessibility** - Proper ARIA labels, semantic HTML
- ✅ **Performance Best Practices** - Optimized loading, minimal dependencies
- ✅ **Clean Code** - WordPress coding standards, documented functions

## License

Proprietary - © 2026 Arqam Web. All rights reserved.

## Support

For translation issues or questions about bilingual development:

1. Review the [Translation Validation Guide](./docs/translation-validation.md)
2. Check the [Translation Audit Report](./docs/translation-audit-report.md)
3. Run validation script with `--verbose` flag for detailed output
4. Contact the development team

---

**Built with ❤️ by Arqam Web** - Expert bilingual WordPress development
