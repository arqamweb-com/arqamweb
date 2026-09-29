<?php
/**
 * Helpers for the single service page (Lovable service detail design).
 *
 * @package Arqam-Web
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Reads a textarea ACF field where each line is one item and columns are
 * separated by "|". Returns a list of rows, each padded to $columns strings.
 *
 * @return array<int, array<int, string>>
 */
function arqamweb_sp_lines(string $key, int $post_id, int $columns = 1): array
{
	$raw = function_exists('get_field') ? (string) get_field($key, $post_id) : '';
	$rows = [];
	foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
		$line = trim($line);
		if ($line === '') {
			continue;
		}
		// آخر عمود بياخد باقي السطر كله، عشان لو الوصف نفسه فيه "|" ميتقطعش.
		$parts = array_map('trim', explode('|', $line, $columns));
		$rows[] = array_pad($parts, $columns, '');
	}
	return $rows;
}

/** Full URLs pass through; anything else is treated as a path inside the theme. */
function arqamweb_sp_image_url(string $value): string
{
	if ($value === '' || preg_match('#^(https?:)?//#', $value)) {
		return $value;
	}
	return get_template_directory_uri() . '/' . ltrim($value, '/');
}

function arqamweb_sp_text(string $key, int $post_id): string
{
	return function_exists('get_field') ? trim((string) get_field($key, $post_id)) : '';
}

/**
 * Lucide icons used by the service page (same set as the Lovable design).
 */
function arqamweb_sp_icon(string $name, string $class = 'h-4 w-4'): string
{
	$paths = [
		'arrow-right' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
		'arrow-up-right' => '<path d="M7 7h10v10"/><path d="M7 17 17 7"/>',
		'chevron-right' => '<path d="m9 18 6-6-6-6"/>',
		'chevron-left' => '<path d="m15 18-6-6 6-6"/>',
		'check' => '<path d="M20 6 9 17l-5-5"/>',
		'x' => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
		'plus' => '<path d="M5 12h14"/><path d="M12 5v14"/>',
		'minus' => '<path d="M5 12h14"/>',
		'search' => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
		'sparkles' => '<path d="M9.94 15.5A2 2 0 0 0 8.5 14.06l-6.14-1.58a.5.5 0 0 1 0-.96L8.5 9.94A2 2 0 0 0 9.94 8.5l1.58-6.14a.5.5 0 0 1 .96 0L14.06 8.5A2 2 0 0 0 15.5 9.94l6.14 1.58a.5.5 0 0 1 0 .96L15.5 14.06a2 2 0 0 0-1.44 1.44l-1.58 6.14a.5.5 0 0 1-.96 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
		'zap' => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
		'dollar-sign' => '<line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>',
		'help-circle' => '<circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/>',
		'message-circle' => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
	];
	// الأسهم بتتقلب في العربي عن طريق الكلاس sp-dir-icon في الـ CSS.
	$directional = in_array($name, ['arrow-right', 'arrow-up-right', 'chevron-right', 'chevron-left'], true) ? ' sp-dir-icon' : '';

	return '<svg class="' . esc_attr($class . $directional) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($paths[$name] ?? '') . '</svg>';
}

/** "Everything a website needs to bring in business" → last N words in the gradient. */
function arqamweb_sp_gradient_last_words(string $text, int $count = 3): string
{
	$words = preg_split('/\s+/u', trim($text));
	$cut = max(0, count($words) - $count);
	$head = implode(' ', array_slice($words, 0, $cut));
	$tail = implode(' ', array_slice($words, $cut));

	return esc_html($head) . ($cut > 0 ? ' <br class="hidden sm:block">' : '') . '<span class="text-gradient">' . esc_html($tail) . '</span>';
}

/** "Clear prices. Honest quotes." → first sentence, then the rest in the gradient. */
function arqamweb_sp_split_at_period(string $text, bool $line_break = true): string
{
	$at = mb_strpos($text, '.');
	if ($at === false) {
		return '<span class="text-gradient">' . esc_html($text) . '</span>';
	}

	return esc_html(mb_substr($text, 0, $at + 1)) . ($line_break ? '<br>' : ' ') . '<span class="text-gradient">' . esc_html(trim(mb_substr($text, $at + 1))) . '</span>';
}

function arqamweb_sp_initials(string $name): string
{
	$initials = '';
	foreach (preg_split('/\s+/u', trim($name)) as $word) {
		$initials .= mb_substr($word, 0, 1);
	}
	return $initials;
}

/**
 * Small illustrations shown at the top of each "What's included" card.
 * Keys are the values editors type in the third column of the Included field.
 *
 * @return array<string, string>
 */
function arqamweb_service_illustrations(): array
{
	$line = function (string $w): string {
		return '<span class="block h-1.5 rounded-full bg-slate-300 ' . $w . '"></span>';
	};
	$check = arqamweb_sp_icon('check', 'h-3 w-3 text-green-500');

	$audit = '';
	foreach ([['Indexing', 'bg-green-500'], ['Redirects', 'bg-amber-400'], ['Page speed', 'bg-red-400']] as [$t, $c]) {
		$audit .= '<div class="flex items-center gap-2 text-[10px]"><i class="h-2 w-2 rounded-full ' . $c . '"></i><span class="flex-1">' . $t . '</span>' . $line('w-1/3') . '</div>';
	}
	$keywords = '';
	foreach ([65, 45, 78] as $i => $v) {
		$keywords .= '<div class="grid grid-cols-2 gap-3 py-1.5">' . $line($i % 2 ? 'w-2/4' : 'w-3/4') . '<span class="h-1.5 rounded-full bg-primary/30"><i class="block h-full rounded-full bg-primary" style="width:' . $v . '%"></i></span></div>';
	}
	$outline = '';
	foreach ([['H1', 'w-4/5'], ['H2', 'w-2/3'], ['H3', 'w-1/2']] as [$tag, $w]) {
		$outline .= '<div class="flex items-center gap-3"><span class="rounded bg-primary/10 px-2 py-1 text-[9px] text-primary">' . $tag . '</span>' . $line($w) . '</div>';
	}
	$links = '';
	foreach (['left-0 top-1', 'right-0 top-1', 'left-1/2 bottom-0 -translate-x-1/2'] as $c) {
		$links .= '<span class="absolute grid h-8 w-8 place-items-center rounded-full border bg-background text-[8px] ' . $c . '">Link</span>';
	}
	$chart = function (bool $down) {
		return '<div class="w-full"><div class="mb-2 text-[9px] font-semibold text-muted-foreground">' . ($down ? 'Cost per enquiry' : 'Impressions') . '</div><svg viewBox="0 0 220 65" class="w-full" fill="none"><path d="' . ($down ? 'M5 10 C45 18 65 12 95 35 S155 32 215 58' : 'M5 58 C45 48 60 55 95 32 S150 35 215 7') . '" stroke="' . ($down ? '#22c55e' : '#3198d4') . '" stroke-width="4" stroke-linecap="round"/><path d="M5 62H215" stroke="#dbe4ee"/></svg></div>';
	};
	$calendar = '';
	for ($i = 0; $i < 14; $i++) {
		$calendar .= '<span class="grid aspect-square place-items-center rounded bg-slate-100">' . (in_array($i, [1, 3, 6, 9, 12], true) ? '<i class="h-2 w-2 rounded-full bg-primary"></i>' : '') . '</span>';
	}
	$reels = str_repeat('<div class="grid h-20 w-11 place-items-center rounded-lg bg-gradient-to-b from-primary/30 to-[#0f172a]"><span class="text-xs text-primary-foreground">▶</span></div>', 3);
	$funnel = '';
	foreach ([['Reach', 'w-full'], ['Clicks', 'w-3/4'], ['Enquiries', 'w-1/2']] as [$t, $w]) {
		$funnel .= '<div class="mx-auto rounded-full bg-primary/20 px-3 py-1.5 text-center text-primary ' . $w . '">' . $t . '</div>';
	}
	$logos = '';
	foreach ([16, 28, 44] as $n) {
		$logos .= '<span class="grid place-items-center rounded-xl bg-[#0f172a] font-semibold text-primary" style="width:' . ($n + 24) . 'px;height:' . ($n + 24) . 'px;font-size:' . ($n / 2) . 'px">A</span>';
	}
	$swatches = '';
	foreach ([['#3198D4', 'bg-primary'], ['#0C1828', 'bg-[#0c1828]'], ['#E8F2FA', 'bg-[#e8f2fa]'], ['#FFFFFF', 'bg-background']] as [$h, $c]) {
		$swatches .= '<div class="text-center text-[7px]"><span class="mb-2 block h-11 w-11 rounded-xl border ' . $c . '"></span>' . $h . '</div>';
	}
	$pages = '';
	foreach (['left-0 rotate-[-8deg]', 'left-6', 'left-12 rotate-[8deg]'] as $c) {
		$pages .= '<span class="absolute top-1 h-16 w-12 rounded-md border bg-background p-2 shadow-sm ' . $c . '">' . $line('w-full') . '<i class="mt-2 block h-7 rounded bg-primary/15"></i></span>';
	}
	$servers = str_repeat('<div class="flex h-7 items-center gap-2 rounded-md bg-[#0f172a] px-3"><i class="h-2 w-2 rounded-full bg-green-400"></i><i class="h-1 flex-1 rounded bg-primary/60"></i></div>', 3);
	$backups = '';
	foreach (['Today', '7d', '30d'] as $x) {
		$backups .= '<span class="relative grid h-12 w-12 place-items-center rounded-full border bg-background text-[9px] font-semibold text-primary">' . $x . '</span>';
	}
	$uptime = '';
	foreach ([55, 72, 66, 92, 78, 100, 88] as $i => $h) {
		$uptime .= '<i class="w-3 rounded-t bg-primary" style="height:' . $h . '%;opacity:' . (0.4 + $i * 0.08) . '"></i>';
	}
	$updates = '';
	foreach (['Core', 'Theme', 'Plugins'] as $x) {
		$updates .= '<div class="flex items-center gap-2 border-b py-1.5 text-[9px] last:border-0">' . $check . '<span class="flex-1">' . $x . '</span><span class="text-muted-foreground">Updated</span></div>';
	}
	$phones = '';
	foreach ([64, 82, 70] as $h) {
		$phones .= '<div class="w-10 rounded-[10px] border-2 border-[#0f172a] bg-background p-1" style="height:' . $h . 'px"><i class="block h-2 rounded bg-primary/30"></i><i class="mt-1 block h-8 rounded bg-gradient-primary opacity-70"></i></div>';
	}
	$frames = '';
	foreach ([1, 2, 3] as $i) {
		$frames .= '<span class="grid aspect-video place-items-center rounded-md bg-gradient-to-br from-[#0f172a] to-primary/70 text-[9px] text-primary-foreground">0' . $i . '</span>';
	}
	$wave = '';
	foreach ([18, 35, 52, 28, 64, 42, 24, 56, 34, 18, 48, 26] as $h) {
		$wave .= '<i class="w-1.5 rounded-full bg-primary" style="height:' . $h . 'px"></i>';
	}
	$owners = '';
	foreach (['Domain', 'Hosting', 'Code', 'Analytics'] as $x) {
		$owners .= '<span class="rounded-full border border-slate-900/10 bg-background px-3 py-2 text-[10px] font-semibold">' . $x . '</span>';
	}

	return [
		'code' => '<div class="relative w-full rounded-xl bg-[#0f172a] p-3 font-mono text-[9px] leading-5 text-primary-foreground/70" dir="ltr"><div><b class="text-primary">&lt;section&gt;</b> business</div><div class="pl-3"><b class="text-primary">&lt;h1&gt;</b> grow online</div><div><b class="text-primary">&lt;/section&gt;</b></div><span class="absolute right-2 top-2 rounded-md bg-background px-2 py-1 text-foreground shadow-md">Live ✓</span></div>',
		'cms-form' => '<div class="w-full rounded-xl bg-background p-4 shadow-sm">' . $line('w-3/4') . '<div class="h-2"></div>' . $line('w-full') . '<div class="mt-4 h-7 w-2/5 rounded-full bg-primary"></div></div>',
		'lang-pills' => '<div class="flex flex-wrap justify-center gap-2"><span class="rounded-full bg-[#0f172a] px-5 py-2.5 text-sm text-primary-foreground">العربية</span><span class="rounded-full border border-slate-900/10 bg-background px-5 py-2.5 text-sm">English</span></div>',
		'search-field' => '<div class="flex w-full items-center gap-2 rounded-full border border-primary bg-background p-2 pl-4 shadow-[0_0_20px_rgba(49,152,212,0.2)]"><span class="min-w-0 flex-1 truncate text-[10px] text-muted-foreground">web design company riyadh</span><span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-primary text-primary-foreground">' . arqamweb_sp_icon('search', 'h-3.5 w-3.5') . '</span></div>',
		'score-ring' => '<div class="grid h-20 w-20 place-items-center rounded-full bg-[conic-gradient(#22c55e_97%,#dbe4ee_0)] p-2"><div class="grid h-full w-full place-items-center rounded-full bg-[#f5f8fc] text-xl font-semibold">97</div></div>',
		'owner-chips' => '<div class="flex flex-wrap justify-center gap-2">' . $owners . '</div>',
		'audit-list' => '<div class="w-full space-y-2 rounded-xl bg-background p-3 shadow-sm">' . $audit . '</div>',
		'keyword-table' => '<div class="w-full rounded-xl bg-background p-3 text-[9px] shadow-sm"><div class="grid grid-cols-2 border-b pb-2 font-semibold"><span>AR</span><span>EN</span></div>' . $keywords . '</div>',
		'serp-snippet' => '<div class="w-full rounded-xl bg-background p-3 shadow-sm"><div class="text-[9px] text-green-600">arqamweb.com › seo</div><div class="mt-1 text-xs font-medium text-blue-600">SEO agency for growing businesses</div><div class="mt-2 space-y-1">' . $line('w-full') . $line('w-4/5') . '</div><span class="mt-2 inline-block rounded-full bg-amber-50 px-2 py-1 text-[8px] text-amber-700">★★★★★ Rich result</span></div>',
		'doc-outline' => '<div class="w-full space-y-2 rounded-xl bg-background p-3 shadow-sm">' . $outline . '</div>',
		'link-graph' => '<div class="relative h-20 w-40"><span class="absolute left-1/2 top-1/2 grid h-11 w-11 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full bg-primary text-[9px] text-primary-foreground">SITE</span>' . $links . '<i class="absolute left-7 right-7 top-1/2 h-px bg-primary/40"></i></div>',
		'line-chart' => $chart(false),
		'line-chart-up' => $chart(false),
		'line-chart-down' => $chart(true),
		'calendar-grid' => '<div class="grid w-full grid-cols-7 gap-1.5 rounded-xl bg-background p-3 shadow-sm">' . $calendar . '</div>',
		'post-card' => '<div class="w-24 rounded-xl bg-background p-2 shadow-sm"><div class="aspect-square rounded-lg bg-gradient-primary opacity-70"></div><div class="mt-2 flex gap-2 text-xs"><span>♥</span><span>○</span></div></div>',
		'reel-strip' => '<div class="flex gap-2">' . $reels . '</div>',
		'ad-targeting' => '<div class="w-full space-y-2 text-[9px]">' . $funnel . '</div>',
		'chat-bubbles' => '<div class="w-full space-y-2"><div class="mr-8 rounded-2xl rounded-bl-sm bg-background p-3 text-[9px] shadow-sm">Can I book today?</div><div class="ml-8 rounded-2xl rounded-br-sm bg-primary p-3 text-[9px] text-primary-foreground">Yes — choose a time <span class="ml-1 rounded-full bg-primary-foreground/20 px-2 py-1">Book</span></div></div>',
		'logo-grid' => '<div class="flex items-end gap-4">' . $logos . '</div>',
		'bilingual-lockup' => '<div class="text-center"><div class="text-3xl font-semibold text-[#0f172a]">أرقام</div><div class="mt-1 text-xl tracking-[0.18em] text-primary">ARQAM</div></div>',
		'swatches' => '<div class="flex gap-2">' . $swatches . '</div>',
		'type-specimen' => '<div class="flex gap-8 text-center"><div><b class="block text-3xl">Aa</b><span class="text-[8px] text-muted-foreground">Space Grotesk</span></div><div><b class="block text-3xl">أب</b><span class="text-[8px] text-muted-foreground">Arabic Sans</span></div></div>',
		'guidelines-pages' => '<div class="relative h-20 w-28">' . $pages . '</div>',
		'template-set' => '<div class="relative h-20 w-36"><span class="absolute left-1 top-0 h-20 w-20 rounded-lg bg-gradient-primary p-3 text-[9px] text-primary-foreground">Social<br>template</span><span class="absolute bottom-1 right-0 h-10 w-20 rounded-md border bg-background p-2 text-[7px] shadow-md">ARQAM<br><i class="block h-px bg-primary"></i></span></div>',
		'server-rack' => '<div class="w-36 space-y-2">' . $servers . '</div>',
		'backup-timeline' => '<div class="relative flex w-full items-center justify-between"><i class="absolute left-4 right-4 top-1/2 h-px bg-primary/30"></i>' . $backups . '</div>',
		'uptime-bars' => '<div class="flex h-20 items-end gap-2">' . $uptime . '</div>',
		'update-list' => '<div class="w-full rounded-xl bg-background p-3 shadow-sm">' . $updates . '</div>',
		'shield-check' => '<div class="relative grid h-20 w-20 place-items-center rounded-[26px] bg-[#0f172a] text-primary"><span class="text-4xl">✓</span><i class="absolute -right-4 -top-2 rounded-full bg-background px-2 py-1 text-[8px] not-italic text-foreground shadow">Rollback</i></div>',
		'whatsapp-chat' => '<div class="w-full space-y-2"><div class="mr-10 rounded-2xl rounded-bl-sm bg-background p-3 text-[9px] shadow-sm">الموقع لا يعمل</div><div class="ml-10 rounded-2xl rounded-br-sm bg-green-500 p-3 text-[9px] text-primary-foreground">Fixed — your site is live ✓</div></div>',
		'spec-doc' => '<div class="w-28 rounded-lg bg-background p-3 shadow-sm"><b class="text-[10px]">App specification</b><div class="mt-3 space-y-2">' . $line('w-full') . $line('w-4/5') . $line('w-2/3') . '</div><span class="mt-3 block rounded bg-primary/10 p-1 text-center text-[8px] text-primary">Approved</span></div>',
		'phone-screens' => '<div class="flex items-end gap-2">' . $phones . '</div>',
		'dual-platform' => '<div class="flex gap-3"><span class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0f172a] text-xl text-primary-foreground">●</span><span class="grid h-14 w-14 place-items-center rounded-2xl bg-green-500 text-xl text-primary-foreground">▲</span></div>',
		'api-nodes' => '<div class="relative flex w-full items-center justify-between"><span class="rounded-xl bg-[#0f172a] p-3 text-[9px] text-primary-foreground">APP</span><i class="h-px flex-1 bg-primary/40"></i><span class="rounded-full bg-primary px-3 py-2 text-[9px] text-primary-foreground">API</span><i class="h-px flex-1 bg-primary/40"></i><span class="rounded-xl border bg-background p-3 text-[9px]">STORE</span></div>',
		'store-badge-check' => '<div class="flex gap-3"><span class="rounded-xl bg-[#0f172a] px-4 py-3 text-[9px] text-primary-foreground">App Store ✓</span><span class="rounded-xl bg-background px-4 py-3 text-[9px] shadow-sm">Play Store ✓</span></div>',
		'calendar-renew' => '<div class="relative grid h-20 w-24 place-items-center rounded-xl bg-background shadow-sm"><span class="absolute inset-x-0 top-0 h-4 rounded-t-xl bg-primary"></span><b class="pt-3 text-2xl">12</b><span class="absolute -right-4 -bottom-2 rounded-full bg-[#0f172a] px-2 py-1 text-[8px] text-primary-foreground">↻ Renew</span></div>',
		'script-card' => '<div class="w-full rounded-xl bg-background p-4 shadow-sm"><b class="text-[10px]">00:00 — Hook</b><div class="mt-3 space-y-2">' . $line('w-full') . $line('w-5/6') . $line('w-2/3') . '</div></div>',
		'storyboard-frames' => '<div class="grid w-full grid-cols-3 gap-2">' . $frames . '</div>',
		'video-timeline' => '<div class="w-full"><div class="mb-2 h-12 rounded-lg bg-[#0f172a] p-2"><span class="block h-full w-2/3 rounded bg-primary/60"></span></div><div class="relative h-5 overflow-hidden rounded bg-primary/15"><i class="absolute left-1/2 top-0 h-full w-px bg-red-500"></i><span class="block h-full w-4/5 bg-primary/40"></span></div></div>',
		'caption-chip' => '<div class="relative aspect-video w-36 rounded-xl bg-[#0f172a]"><span class="absolute inset-x-3 bottom-3 rounded bg-background/90 px-2 py-1 text-center text-[9px]">فيديو جديد كل أسبوع</span></div>',
		'audio-waveform' => '<div class="flex h-16 items-center gap-1">' . $wave . '</div>',
		'format-chips' => '<div class="flex items-end gap-3"><span class="grid h-20 w-11 place-items-center rounded-lg bg-[#0f172a] text-[8px] text-primary-foreground">9:16</span><span class="grid h-14 w-14 place-items-center rounded-lg bg-primary text-[8px] text-primary-foreground">1:1</span><span class="grid h-11 w-20 place-items-center rounded-lg bg-[#0f172a] text-[8px] text-primary-foreground">16:9</span></div>',
	];
}

/**
 * Returns the illustration markup for a key, wrapped in the card's shell.
 * Unknown or empty keys render nothing.
 */
function arqamweb_service_illustration(string $key): string
{
	static $illustrations = null;
	if ($illustrations === null) {
		$illustrations = arqamweb_service_illustrations();
	}
	if (! isset($illustrations[$key])) {
		return '';
	}

	return '<div aria-hidden="true" class="relative mb-8 flex min-h-[110px] items-center justify-center overflow-hidden rounded-[14px] border border-slate-900/[0.07] bg-[#f5f8fc] p-4">' . $illustrations[$key] . '</div>';
}
