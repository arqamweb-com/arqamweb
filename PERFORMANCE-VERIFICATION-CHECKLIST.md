# Performance Verification Checklist

Quick checklist for verifying Lighthouse Performance >= 85 and LCP < 2.5s

## Pre-Verification Setup

- [ ] MAMP server running
- [ ] WordPress accessible at http://localhost:8888/
- [ ] Test images uploaded and WebP versions generated
- [ ] Template updated to use `arqamweb_get_optimized_image()`
- [ ] Browser cache cleared
- [ ] Using Incognito/Private browsing mode

## Hero/LCP Image Optimization

- [ ] Hero image uses `arqamweb_get_optimized_image()`
- [ ] Hero image has `'loading' => 'eager'`
- [ ] Hero image has `'fetchpriority' => 'high'`
- [ ] Hero image serves WebP (check DevTools Network tab)

## Below-Fold Images

- [ ] Below-fold images use `arqamweb_get_optimized_image()`
- [ ] Default lazy loading applied (no explicit 'loading' arg)
- [ ] WebP versions served (check DevTools Network tab)

## Run Lighthouse Audit

1. Open Chrome DevTools (Cmd+Option+I / Ctrl+Shift+I)
2. Navigate to **Lighthouse** tab
3. Select **Mobile** device
4. Check **Performance** category
5. Click **Analyze page load**
6. Wait for results (30-60 seconds)

## Verify Results

- [ ] **Performance Score:** ______ / 100 (Target: >= 85)
- [ ] **LCP:** ______ seconds (Target: < 2.5s)

## Pass/Fail

- [ ] ✅ PASS - Both criteria met
- [ ] ❌ FAIL - Review PERFORMANCE-VERIFICATION-GUIDE.md troubleshooting section

## Document Results

After verification, update:

1. `build-progress.txt` - Add verification results
2. `implementation_plan.json` - Set subtask-5-2 status to "completed"
3. Git commit: `auto-claude: subtask-5-2 - Performance verification complete`

---

**Quick Test Command:**

```bash
# Verify WebP files exist
find ./wp-content/uploads -name "*.webp" -type f | head -n 5
```

**Lighthouse Mobile Settings:**
- Mode: Navigation
- Device: **Mobile** (CRITICAL)
- Categories: Performance
- Throttling: Simulated (default)
