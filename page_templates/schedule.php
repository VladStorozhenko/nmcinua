<?php 

/*
Template Name: Расписание
*/

/**
 * ===
 * Schedule file
 * ===
 * 
 * @package nmc
 * 
 * @author Vladislav Storozhenko
 */

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css">

<?php 

/* Get header */
get_header();
wp_enqueue_style('nmc-schedule-css');
wp_enqueue_style('nmc-slim');

wp_enqueue_script('nmc-slim-js');

wp_enqueue_script('nmc-schedule-js');

?>

<!-- Breadcrumbs -->
<div class="container breadcrumbs-on-page">
    <?php echo do_shortcode('[flexy_breadcrumb]'); ?>
    <div class="section-title mt-3">Расписание приёма специалистов</div>
</div>
<!-- End breadscrumbs -->

<!-- Content -->
<div class="container">
	    <?php 

        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                the_content();
            endwhile; 
        endif; 

        ?>

        <?php 
        
        // ACF experiment 

        $options = get_field_object('field_5f60d87f172e1');

        $choices = $options['choices'];
        if($choices) {
            ?>
            
            <select id='type-select' data-url = '<?php echo admin_url('admin-ajax.php'); ?>'>
            <option data-placeholder="true"></option>
                <?php 
                
                    foreach($choices as $value => $label) {
                        ?>
                        <option value='<?php echo $label; ?>'><?php echo $label ?></option>
                        <?php
                    }

                ?>
            </select>

            <?php
        }

        ?>


        <div class="content" id="content">
            
        </div>
</div>

<?php 
/* Get footer and enqueue scripts */
get_footer();
?>