<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<header class="bg-primary text-center py-8">
    <?php wp_title('<h1 class="entry-title font-bold text-white text-2xl sm:text-4xl">', '</h1>'); ?>


    <div class="arqamweb-breadcrumbs mt-4 text-white">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</header>