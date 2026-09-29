<?php
/**
 * Service page: small uppercase label with a line before it.
 *
 * @package Arqam-Web
 */

$dark = ! empty($args['dark']);
$centered = ! empty($args['centered']);
?>
<div class="flex items-center gap-2.5 text-[11px] font-semibold uppercase tracking-[0.22em] <?php echo $centered ? 'justify-center' : ''; ?> <?php echo $dark ? 'text-primary-foreground/70' : 'text-primary'; ?>"><span class="h-px w-[34px] shrink-0 bg-primary/60"></span><?php echo esc_html($args['text']); ?></div>
