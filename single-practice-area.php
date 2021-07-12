<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<section class="single-practice-area--section elementor-section elementor-top-section elementor-element elementor-section-boxed" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-70 elementor-top-column elementor-element" data-element_type="column">
            <div class="single-practice-area--content elementor-widget-wrap">
                <h1><?php echo get_the_title(); ?></h1>
                <?php echo get_the_content(); ?>
                <h3>Request A Consultation</h3>
                <p>Fill the following form and we will get back to you in 15 minutes.</p>
                <?php echo do_shortcode('[fluentform id="3"]') ?>
            </div>
        </div>
        <div class="elementor-column elementor-col-30 elementor-top-column elementor-element" data-element_type="column">
            <div class="single-practice-area--links elementor-widget-wrap">
                <h2>All practice areas</h2>
                <?php echo do_shortcode('[practice_area_link]'); ?>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>