<?php /* Template Name: Clients */ ?>
<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();

get_template_part('template-parts/headers/header', 'page');

?>

<main class="my-8">
    <div class="container">

        <section class="text-2xl">
            <?php the_content(); ?>
        </section>
        <?php get_template_part('template-parts/clients/custom-loop', 'clients'); ?>
    </div>
    <section class="main-padding">
        <?php get_template_part('template-parts/frontpage/frontpage', 'contact'); ?>
    </section>



</main>



<?php get_footer(); ?>