<?php

/*
Template Name: Специалисты
*/

/* Get header */
get_header();
wp_enqueue_style( 'nmc-specialists-css' );
?>
    <div class="container breadcrumbs-on-page">
		<?php echo do_shortcode( '[flexy_breadcrumb]' ); ?>
    </div>
    <!-- Specialists grid-->
    <div class="container">
        <div class="specialists consultants principal">
			<?php
			$specialists = get_posts( array(
				'post_type'        => 'specialist',
				'numberposts'      => - 1,
				'post_status'      => 'publish',
				'suppress_filters' => '0'
			) );

			if ( $specialists ) {
				foreach ( $specialists as $specialist ) {
					$specialist_id   = $specialist->ID;
					$specialist_name = $specialist->post_title;
					$specialist_link = get_permalink( $specialist_id );
					$is_principal    = get_field( 'is_principal', $specialist_id );
					if ( $is_principal ) {
						?>
                        <div class="specialist">
                            <a href="<?php echo $specialist_link ?>">
                                <img src="<?php echo get_the_post_thumbnail_url( $specialist_id ) ?>"
                                     alt="<?php echo $specialist_name ?>">
                                <h2 class="name"><?php echo $specialist_name ?></h2>
                            </a>
							<?php
							// get "text for specialists page" field
							$post = get_field( 'specialist_list_page_text', $specialist_id );
							?>
                            <p class='post'><?php echo $post; ?></p>
                        </div>
						<?php
					}
				}
			}
			?>
        </div>
    </div>
    <!-- End specialists grid-->
    <h1 class="section-title mt-3"><?php _e( 'Научные консультанты', 'nmc-theme' ) ?></h1>
    <!-- Specialists grid-->
    <div class="container">
        <div class="specialists consultants">
			<?php
			$specialists = get_posts( array(
				'post_type'        => 'specialist',
				'numberposts'      => - 1,
				'post_status'      => 'publish',
				'suppress_filters' => '0'
			) );

			if ( $specialists ) {
				foreach ( $specialists as $specialist ) {
					$specialist_id   = $specialist->ID;
					$specialist_name = $specialist->post_title;
					$specialist_link = get_permalink( $specialist_id );
					$is_consultant   = get_field( 'is_consultant', $specialist_id );
					if ( $is_consultant ) {
						?>
                        <div class="specialist">
                            <a href="<?php echo $specialist_link ?>">
                                <img src="<?php echo get_the_post_thumbnail_url( $specialist_id ) ?>"
                                     alt="<?php echo $specialist_name ?>">
                                <h2 class="name"><?php echo $specialist_name ?></h2>
                            </a>
							<?php
							// get "text for specialists page" field
							$post = get_field( 'specialist_list_page_text', $specialist_id );
							?>
                            <p class='post'><?php echo $post; ?></p>
                        </div>
						<?php
					}
				}
			}
			?>
        </div>
    </div>
    <h1 class="section-title mt-3"><?php _e( 'Специалисты', 'nmc-theme' ) ?></h1>
    <!-- Specialists grid-->
    <div class="container">
        <div class="specialists">
			<?php
			$specialists = get_posts( array(
				'post_type'        => 'specialist',
				'numberposts'      => - 1,
				'post_status'      => 'publish',
				'suppress_filters' => '0'
			) );
			if ( $specialists ) {
				foreach ( $specialists as $specialist ) {
					$specialist_id   = $specialist->ID;
					$specialist_name = $specialist->post_title;
					$specialist_link = get_permalink( $specialist_id );
					$is_consultant   = get_field( 'is_consultant', $specialist_id );
					$is_boss         = get_field( 'is_boss', $specialist_id );
					$is_principal    = get_field( 'is_principal', $specialist_id );
					if ( ! $is_principal ) {
						if ( ! $is_boss ) {
							if ( ! $is_consultant ) {
								?>
                                <div class="specialist">
                                    <a href="<?php echo $specialist_link ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url( $specialist_id ) ?>"
                                             alt="<?php echo $specialist_name ?>">
                                        <h2 class="name"><?php echo $specialist_name ?></h2>
                                    </a>
									<?php
									// get "text for specialists page" field
									$post = get_field( 'specialist_list_page_text', $specialist_id );
									?>
                                    <p class='post'><?php echo $post; ?></p>
                                </div>
								<?php
							}
						}
					}
				}
			}
			?>
        </div>
    </div>
<?php
/* Get footer */
get_footer();
?>