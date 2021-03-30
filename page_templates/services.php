<?php 

/*
Template Name: Услуги
*/

/**
 * ===
 * Services file 
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
wp_enqueue_style('nmc-services-css');
?>

<div class="container breadcrumbs-on-page">
    <!-- Breadcrumbs -->

        <?php echo do_shortcode('[flexy_breadcrumb]'); ?>

    <!-- End breadcrumbs -->
    <h1 class="section-title mt-3">Наши услуги</h1>
</div>

<!-- Services grid -->

<div class="container">
    <div class="container my-5"><?php echo do_shortcode('[wpdreams_ajaxsearchlite]') ?></div>
    <div class="services">

    <?php 
    
    // get children of current page
    global $post;
    $page_id = $post->ID;

    $services = get_children(array(
        'post_parent'       => $page_id,
        'post_type'         => 'service',
        'numberposts'       => -1,
        'post_status'       => 'publish'
    ));

    if($services) {
        foreach($services as $service) {
            // var_dump($service);
            $service_id = $service->ID;
            $service_name = $service->post_title;
            $service_link = $service->guid;
            ?>
            
            <a href="<?php echo $service_link; ?>">
                <div class="service">
                    <div class="service-bg-image block-background" style="background-image: url('<?php echo get_the_post_thumbnail_url($service_id) ?>')"></div>
                    <h2 class="service-name">
                        <?php echo $service_name; ?>
                    </h2>
                </div>
            </a>

            <?php 
        }
    }

    ?>

    </div> <!-- .services -->
</div>

<!-- End services grid -->

<?php 
/* Get footer */
get_footer();
?>