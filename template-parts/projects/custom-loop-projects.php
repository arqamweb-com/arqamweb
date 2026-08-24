<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Projects -->
<style>
    /* fix layout shifts */

    .blaze-slider.my-slider {
        --slides-to-show: 3;
        --slide-gap: 20px;
    }

    @media (max-width: 900px) {
        .blaze-slider.my-slider {
            --slides-to-show: 2;
        }
    }

    @media (max-width: 500px) {
        .blaze-slider.my-slider {
            --slides-to-show: 1;
        }
    }

    /* other styles */

    .blaze-slider.dragging .blaze-track {
        cursor: grabbing;
    }



    /* pagination buttons */

    .blaze-pagination {
        display: flex;
        gap: 15px;
        justify-content: center;
    }

    .blaze-pagination button {
        font-size: 0;
        border-radius: 50%;
        background: hsl(0deg, 0%, 15%);
        cursor: pointer;
        transition: transform 200ms ease, background-color 300ms ease;
        padding: 3px;
    }

    .blaze-pagination button.active {
        background-color: #1e9ae0;
        transform: scale(1.3);
        outline: 1px solid #1e9ae0;
        outline-offset: 5px;
    }

    .blaze-next,
    .blaze-prev {
        border: none;
        font-size: 0;
        width: 20px;
        height: 20px;
        background: none;
        cursor: pointer;
        background-position: center;
        background-size: 100%;
    }

    .blaze-next {
        transform: rotate(180deg);
    }

    /* for loop: false */
    .blaze-slider.start .blaze-prev,
    .blaze-slider.end .blaze-next {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* other styles */
</style>
<div class="blaze-slider my-slider">
    <div class="blaze-container">
        <div class="blaze-track-container">
            <div class="blaze-track mb-8">
                <?php
                $args = array(
                    'post_type' => 'project',
                    'posts_per_page' => $args['postCount'],
                    'order' => 'ASC',
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    $count = 0;
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        // Make Service Counter 
                        $count++;

                        get_template_part('template-parts/content/content', get_post_type());

                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="controls">
        <div class="blaze-pagination"></div>
    </div>
</div>



<script>
    window.addEventListener('load', function() {

        // slider 1
        const sliderEl = document.querySelector(".blaze-slider");

        const blazeSlider = new BlazeSlider(sliderEl, {
            all: {
                rtl: true,
                enableAutoplay: true,
                slidesToScroll: 1,
                slidesToShow: 3,
                transitionDuration: 700,
                loop: true,
            },
            "(max-width: 900px)": {
                slidesToScroll: 1,
                slidesToShow: 2,
                slidesGap: "40px",
            },
            "(max-width: 500px)": {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        });

    });
</script>
<!-- Projects -->