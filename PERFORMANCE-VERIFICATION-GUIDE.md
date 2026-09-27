# Performance Verification Guide - WebP Image Optimization

## Overview

This guide provides step-by-step instructions for verifying that the automated WebP image optimization pipeline meets the performance acceptance criteria:

- ✅ Lighthouse Performance score >= 85 on mobile
- ✅ LCP (Largest Contentful Paint) < 2.5 seconds

## Prerequisites

Before running performance verification:

1. **WordPress Installation Active**
   - MAMP server running
   - WordPress accessible at http://localhost:8888/
   - Theme installed and activated

2. **Test Images Uploaded**
   - Upload test images via WordPress Media Library
   - Verify WebP versions are generated (check uploads directory)
   - Replace template images with optimized versions using `arqamweb_get_optimized_image()`

3. **Template Implementation**
   - Hero/LCP images use: `loading="eager"` and `fetchpriority="high"`
   - Below-fold images use: `loading="lazy"` (default)
   - Verify using browser DevTools Elements tab

## Verification Methods

### Method 1: Chrome DevTools Lighthouse (Recommended for Development)

#### Step 1: Open Chrome DevTools

```bash
# Navigate to homepage
http://localhost:8888/

# Open DevTools
# Mac: Cmd + Option + I
# Windows/Linux: Ctrl + Shift + I
```

#### Step 2: Run Lighthouse Audit

1. Click **Lighthouse** tab in DevTools
2. Configure audit:
   - Mode: **Navigation (Default)**
   - Categories: ✓ **Performance**
   - Device: **Mobile** (CRITICAL - acceptance criteria specifies mobile)
   - Throttling: **Simulated throttling (default)**
3. Click **Analyze page load**
4. Wait for audit to complete (30-60 seconds)

#### Step 3: Verify Results

**Performance Score:**
- ✅ Target: >= 85
- Location: Top of Lighthouse report (large number with colored circle)
- Pass Criteria: Green circle (90-100) or Orange circle (50-89) with score >= 85

**LCP (Largest Contentful Paint):**
- ✅ Target: < 2.5 seconds
- Location: **Metrics** section → "Largest Contentful Paint"
- Pass Criteria: Green indicator or time value < 2.5s

#### Step 4: Document Results

```
Performance Score: [___] / 100
Status: [PASS / FAIL]

LCP: [___] seconds
Status: [PASS / FAIL]

Date: ___________
Browser: Chrome [version]
Network: [Simulated Slow 4G / Fast 3G / etc.]
```

---

### Method 2: PageSpeed Insights (Production Verification)

**Important:** PageSpeed Insights requires a publicly accessible URL. Use this method only if:
- Site is deployed to staging/production environment
- OR using a tunneling service (ngrok, LocalTunnel, etc.) to expose localhost

#### Step 1: Access PageSpeed Insights

```
URL: https://pagespeed.web.dev/
```

#### Step 2: Run Analysis

1. Enter homepage URL
2. Click **Analyze**
3. Wait for analysis (60-90 seconds)

#### Step 3: View Mobile Results

1. Click **Mobile** tab (top of page)
2. Verify Performance Score (top section)
3. Scroll to **Metrics** section
4. Locate **Largest Contentful Paint (LCP)** row

#### Step 4: Document Results

```
Performance Score (Mobile): [___] / 100
Status: [PASS / FAIL]

LCP (Mobile): [___] seconds
Status: [PASS / FAIL]

URL Tested: ___________
Date: ___________
PageSpeed Insights Report: [link]
```

---

## Interpreting Results

### Performance Score Ranges

| Score | Rating | Status |
|-------|--------|--------|
| 90-100 | Good (Green) | ✅ PASS |
| 85-89 | Needs Improvement (Orange) | ✅ PASS (meets >= 85 criteria) |
| 50-84 | Needs Improvement (Orange) | ❌ FAIL |
| 0-49 | Poor (Red) | ❌ FAIL |

### LCP Ranges

| Time | Rating | Status |
|------|--------|--------|
| 0-2.5s | Good (Green) | ✅ PASS |
| 2.5-4.0s | Needs Improvement (Orange) | ❌ FAIL |
| > 4.0s | Poor (Red) | ❌ FAIL |

---

## Troubleshooting Low Scores

### If Performance Score < 85

**Common Issues:**

1. **Large Images Not Using WebP**
   - Check: Uploads directory contains .webp files?
   - Fix: Run `wp arqamweb webp convert --allow-root`
   - Verify: Check browser DevTools Network tab for image/webp Content-Type

2. **Hero Image Not Optimized**
   - Check: Hero image uses `arqamweb_get_optimized_image()`?
   - Fix: Replace `<img>` with helper function
   - Example:
     ```php
     // Before
     <?php echo wp_get_attachment_image($hero_id, 'full'); ?>
     
     // After
     <?php echo arqamweb_get_optimized_image($hero_id, 'full', [
       'loading' => 'eager',
       'fetchpriority' => 'high'
     ]); ?>
     ```

3. **Render-Blocking Resources**
   - Check: Lighthouse "Opportunities" section
   - Common: Non-critical CSS/JS loaded synchronously
   - Fix: Defer non-critical scripts, inline critical CSS

4. **Server Response Time**
   - Check: Lighthouse "Diagnostics" → "Server response time"
   - Issue: MAMP local development can be slow
   - Note: This may improve in production environment

### If LCP > 2.5 seconds

**Common Issues:**

1. **Hero Image Not Eager Loaded**
   - Check: `<img loading="eager" fetchpriority="high">`?
   - Fix: Add to `arqamweb_get_optimized_image()` args:
     ```php
     ['loading' => 'eager', 'fetchpriority' => 'high']
     ```

2. **Large Hero Image File Size**
   - Check: Network tab → Hero image size
   - Target: < 200KB for hero images
   - Fix: Use appropriate image size (e.g., 'large' instead of 'full')
   - Fix: Ensure WebP version is being served

3. **LCP Element Not Optimized**
   - Check: Lighthouse → "Largest Contentful Paint element" shows what element
   - Common: Text block instead of image (if no hero image)
   - Fix: Ensure web fonts are preloaded if text is LCP

4. **Network Throttling**
   - Note: Lighthouse simulates slow connections (Slow 4G)
   - Local MAMP may have additional overhead
   - Consider: Re-test in staging environment

---

## Performance Checklist

Before running verification, confirm:

- [ ] All images converted to WebP via WP-CLI: `wp arqamweb webp convert`
- [ ] Hero/LCP images use `arqamweb_get_optimized_image()` with:
  - [ ] `'loading' => 'eager'`
  - [ ] `'fetchpriority' => 'high'`
- [ ] Below-fold images use `arqamweb_get_optimized_image()` (lazy loading default)
- [ ] Browser cache cleared before testing
- [ ] Tested in Incognito/Private browsing mode
- [ ] Mobile device selected in Lighthouse settings

---

## Example Template Updates for LCP Optimization

### Homepage Hero Image

```php
<?php
// Get hero image from ACF or post thumbnail
$hero_id = get_field('hero_image') ?: get_post_thumbnail_id();

if ($hero_id) {
  echo arqamweb_get_optimized_image($hero_id, 'arqam-hero', [
    'loading' => 'eager',         // Eager load for LCP
    'fetchpriority' => 'high',    // High priority for LCP
    'class' => 'hero-image',
    'alt' => get_field('hero_alt_text') ?: get_the_title()
  ]);
}
?>
```

### Below-Fold Gallery Images

```php
<?php
$gallery_images = get_field('gallery_images');

if ($gallery_images) {
  foreach ($gallery_images as $image_id) {
    // Default lazy loading for below-fold
    echo arqamweb_get_optimized_image($image_id, 'large', [
      'class' => 'gallery-item'
    ]);
  }
}
?>
```

---

## Verification Report Template

Copy and fill out after running Lighthouse audit:

```
═══════════════════════════════════════════════════════════
PERFORMANCE VERIFICATION REPORT
Automated WebP Image Optimization Pipeline
═══════════════════════════════════════════════════════════

Date: ___________
Tester: ___________
Environment: [Development / Staging / Production]

─────────────────────────────────────────────────────────
LIGHTHOUSE AUDIT (Mobile)
─────────────────────────────────────────────────────────

URL Tested: http://localhost:8888/
Browser: Chrome [version]
Lighthouse Version: [version]
Device: Mobile
Network: Simulated Slow 4G

Performance Score: [___] / 100
✅ Target: >= 85
Status: [PASS / FAIL]

Largest Contentful Paint (LCP): [___] seconds
✅ Target: < 2.5s
Status: [PASS / FAIL]

Other Core Web Vitals:
- First Contentful Paint (FCP): [___] seconds
- Total Blocking Time (TBT): [___] ms
- Cumulative Layout Shift (CLS): [___]
- Speed Index: [___] seconds

─────────────────────────────────────────────────────────
WEBP VERIFICATION
─────────────────────────────────────────────────────────

✅ WebP files generated: [YES / NO]
   Location: wp-content/uploads/[year]/[month]/*.webp

✅ <picture> elements in HTML: [YES / NO]
   Verified via: DevTools Elements tab

✅ Content-Type headers correct: [YES / NO]
   Hero image Content-Type: [image/webp / image/jpeg / other]

✅ Hero image attributes:
   - loading: [eager / lazy]
   - fetchpriority: [high / auto / low]

✅ Below-fold images lazy loaded: [YES / NO]

─────────────────────────────────────────────────────────
ACCEPTANCE CRITERIA
─────────────────────────────────────────────────────────

[ ] Performance Score >= 85 on mobile
[ ] LCP < 2.5 seconds
[ ] WebP images auto-generated
[ ] <picture> elements with WebP sources
[ ] Hero images eager loaded
[ ] Below-fold images lazy loaded

Overall Status: [PASS / FAIL]

─────────────────────────────────────────────────────────
NOTES / ISSUES
─────────────────────────────────────────────────────────

[Add any observations, issues encountered, or recommendations]

─────────────────────────────────────────────────────────
SCREENSHOTS
─────────────────────────────────────────────────────────

1. Lighthouse report: [link or file path]
2. Network tab (WebP delivery): [link or file path]
3. HTML source (<picture> elements): [link or file path]

═══════════════════════════════════════════════════════════
```

---

## Next Steps After Verification

### If Tests PASS

1. Document results in build-progress.txt
2. Update implementation_plan.json subtask-5-2 status to "completed"
3. Commit changes with message: `auto-claude: subtask-5-2 - Performance verification complete`
4. Mark feature as ready for deployment

### If Tests FAIL

1. Document specific failures in build-progress.txt
2. Review "Troubleshooting Low Scores" section above
3. Implement fixes
4. Re-run verification
5. Update documentation with findings

---

## Additional Resources

- **Lighthouse Documentation:** https://developer.chrome.com/docs/lighthouse/
- **Core Web Vitals Guide:** https://web.dev/vitals/
- **LCP Optimization:** https://web.dev/lcp/
- **WebP Best Practices:** https://web.dev/serve-images-webp/

---

## Quick Reference Commands

```bash
# Run WP-CLI bulk conversion
wp arqamweb webp convert --allow-root

# Check for WebP files
find wp-content/uploads -name "*.webp" -type f | head -n 10

# Test helper function (add to template temporarily)
<?php
$test_id = 123; // Replace with real attachment ID
echo arqamweb_get_optimized_image($test_id, 'large', [
  'loading' => 'eager',
  'fetchpriority' => 'high'
]);
?>
```

---

**Last Updated:** 2026-09-27
**Version:** 1.0
**Maintainer:** Auto-Claude WebP Optimization Pipeline
