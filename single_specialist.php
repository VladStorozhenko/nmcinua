<?php

/*
Template Name: Специалист
Template Post Type: specialist
*/

/* Get header and enqueue scripts */
get_header();
wp_enqueue_style( 'nmc-specialists-css' );

// get id of current page
global $post;
$page_id = $post->ID;

// get ACF fields
// text under name
$text_under_name = get_field( 'specialist_text_under_name', $page_id );
// specialty
$specialty = get_field( 'specialist_specialty', $page_id );
// first consultation
$first_consultation = get_field( 'first_consultation_price', $page_id );
// second consultation
$second_consultation  = get_field( 'second_consultation_price', $page_id );
$disable_appointments = get_field( 'disable_appointments', $page_id );
?>
    <div class="container breadcrumbs-on-page">
        <!-- Breadcrumbs -->
		<?php
		global $post;
		$home_url     = get_home_url();
		$services_url = get_page_link( 11 );
		?>
        <p class='breadcrumbs'><a href="<?php echo $home_url ?>">ГЛАВНАЯ</a>/<a href="<?php echo $services_url ?>">СПЕЦИАЛИСТЫ</a>/<a
                    href="<?php echo $post->guid; ?>" class='last'><?php echo $post->post_title; ?></a></p>
    </div>
    <!-- Top info -->
    <div class="container">
        <div class="row top-info">
            <div class="col-12 col-lg-5 photo-block">
                <img src="<?php echo get_the_post_thumbnail_url( $page_id ); ?>" alt="<?php the_title(); ?>">
            </div>
            <div class="col-12 col-lg-7 d-flex flex-column justify-content-center info-block">
                <div class='info'>
                    <h1><?php the_title(); ?></h1>
                    <p class='post'><?php echo $text_under_name; ?></p>
					<?php
					if ( $specialty ) {
						?>
                        <p class='specialty'><span class="text-medium">Специальность:</span> <?php echo $specialty; ?>
                        </p>
						<?php
					}
					?>
                </div>
                <div class='top-info-action-wrapper'>
					<?php
					$work_days = get_field( 'work_days', get_the_ID() );
					if ( $work_days ) {
						$no_days = [];
						foreach ( $work_days as $day ) {
							$eng_day = '';
							switch ( $day ) {
								case 'понедельник':
									$eng_day = 'monday';
									array_push( $no_days, 1 );
									break;
								case 'вторник':
									$eng_day = 'tuesday';
									array_push( $no_days, 2 );
									break;
								case 'среда':
									$eng_day = 'wednesday';
									array_push( $no_days, 3 );
									break;
								case 'четверг':
									$eng_day = 'thursday';
									array_push( $no_days, 4 );
									break;
								case 'пятница':
									$eng_day = 'friday';
									array_push( $no_days, 5 );
									break;
								case 'суббота':
									$eng_day = 'saturday';
									array_push( $no_days, 6 );
									break;
								case 'воскресенье':
									$eng_day = 'sunday';
									array_push( $no_days, 0 );
									break;
							}
						}

						$json = json_encode( $no_days );
					} else {
						$json = '';
					}
					if ( ! $disable_appointments ) {
						?>
                        <button class="button button-blue" data-toggle="modal" data-target="#speciliastModal"
                                id='specialist-button' data-daystoenable="<?php echo $json; ?>"
                                data-specialist='<?php the_title(); ?>'>Записаться на приём
                        </button>
						<?php
					}
					?>
                    <div class='consultations-wrapper'>
						<?php
						if ( $first_consultation ) {
							?>
                            <p>Стоимость первичной консультации: <?php echo $first_consultation; ?></p>
							<?php
						}
						if ( $second_consultation ) {
							?>
                            <p>Стоимость повторной консультации: <?php echo $second_consultation; ?></p>
							<?php
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <a href="<?php echo get_page_link( 11 ) ?>" class='back-to-list'>назад к списку</a>
    </div>
<?php
/* Get footer */
wp_enqueue_script( 'nmc-specialist' );
get_footer();
?>