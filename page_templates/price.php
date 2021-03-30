<?php 

/*
Template Name: Цены
*/

/**
 * ===
 * Price file
 * ===
 * 
 * @package nmc
 * 
 * @author Vladislav Storozhenko
 */

?>

<?php 

get_header();

?>

<style>

    .content p, .content a {
        font-size: 18px;
        color: #073E66;
    }

    .footer-wrapper {
        margin-top: 50px;
        margin-bottom: 50px !important;
    }

</style>

<div class="container breadcrumbs-on-page">
    <?php echo do_shortcode('[flexy_breadcrumb]'); ?>
    <h2 class="section-title mt-3">Стоимость услуг</h2>
</div>

<div class="container content">

    <?php 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
            the_content();
        endwhile; 
    endif; 

    ?>

</div>

<div class='price-footer'>
<?php

get_footer();

?>
</div>