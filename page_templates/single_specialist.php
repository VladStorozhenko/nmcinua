<?php 

/*
Template Name: Специалист
*/

/**
 * ===
 * Single specialist file 
 * ===
 * 
 * @package nmc
 * 
 * @author Vladislav Storozhenko
 */


?>

<?php 

/* Get header and enqueue scripts */
get_header();
wp_enqueue_style('nmc-specialists-css');

// get id of current page
global $post;
$page_id = $post->ID;

// get ACF fields 
// text under name 
$text_under_name = get_field('specialist_text_under_name', $page_id);
// specialty
$specialty = get_field('specialist_specialty', $page_id);

?>

<div class="container breadcrumbs-on-page">
    <!-- Breadcrumbs -->

        <?php echo do_shortcode('[flexy_breadcrumb]'); ?>

    <!-- End breadcrumbs -->
</div>


<!-- Top info -->

<div class="container">

    <div class="row top-info">
        <div class="col-12 col-lg-5 photo-block">
            <img src="<?php echo get_the_post_thumbnail_url($page_id); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="col-12 col-lg-7 d-flex flex-column justify-content-center info-block">
            <div class='info'>

            <h1><?php the_title(); ?></h1>
            <p class='post'><?php echo $text_under_name; ?></p>
            <p class='specialty'><span class="text-medium">Специальность:</span> <?php echo $specialty; ?></p>

            </div>
            <div class='top-info-action-wrapper'>
                <button class="button button-blue" data-toggle="modal" data-target="#modal">Записаться на приём</button>
                <a href="<?php echo get_page_link(15) ?>">Стоимость услуг</a>
            </div>
        </div>
    </div>

</div>

<!-- End top info -->

<!-- the content -->

<div class="container specialist-content">
    <div class="w-75">
    <?php 

        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                the_content();
            endwhile; 
        endif; 

    ?>
    </div>
</div>

<!-- Back to list  -->

<div class="container back-to-list-wrapper mt-5">    
    <a href="<?php echo get_page_link(11) ?>" class='back-to-list'>назад к списку</a>
</div>

<!-- End back to list -->

<!-- end the content -->


<?php 

/* Get footer */
get_footer();

?>