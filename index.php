<?php

/*
Template Name: Главная
*/

/* Get header */
get_header();
/* Main css -- enqueue */
wp_enqueue_style( 'nmc-main-css' );
?>
    <!-- Index hero -->
    <div class="container-fluid index-hero px-0">
        <div class="background-dark"></div>
        <div class="index-hero-background block-background"
             style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/photo-index.jpg' ?>")'></div>
        <div class="container text-center hero-content px-0">
            <h1 class='mx-auto'><?php _e( 'НАУЧНЫЙ МЕДИЦИНСКИЙ ЦЕНТР - "ВАШ ВРАЧ"', 'nmc-theme' ) ?></h1>
            <p class='mx-auto'><?php _e('Современный консультативно-диагностический центр в городе Харькове', 'nmc-theme') ?></p>
            <button class="button button-white" data-toggle="modal" data-target="#modal"><?php _e('Записаться на приём', 'nmc-theme') ?></button>
        </div>
        <div class="hero-arrow-down-wrapper">
            <img src="<?php echo get_template_directory_uri() . '/inc/icons/hero-arrow-down.svg' ?>" alt="Вниз">
        </div>
    </div>
    <!-- Index services -->
    <h2 class='section-title'><?php _e('Услуги', 'nmc-theme') ?></h2>
    <div class="container">
        <div class='services index-services'>
			<?php
			$services = get_children(
				array(
					'post_parent' => 9,
					'post_type'   => 'service',
					'numberposts' => - 1,
					'post_status' => 'publish'
				)
			);
			if ( $services ) {
				foreach ( $services as $service ) {
					$value = get_field( 'featured', $service->ID );
					if ( $value[0] == 'checked' ) {
						?>
                        <a href="<?php echo $service->guid ?>">
                            <div class="service">
                                <div class="service-bg-image block-background"
                                     style='background-image: url("<?php echo get_the_post_thumbnail_url( $service->ID ) ?>")'></div>
                                <h2 class='service-name'><?php echo $service->post_title ?></h2>
                            </div>
                        </a>
						<?php
					}
				}
			}
			?>
        </div>
    </div>
    <div class="text-center">
        <a href="<?php echo get_page_link( 9 ) ?>">
            <button class="button button-blue index-services-show-all"><?php _e('Показать все', 'nmc-theme') ?></button>
        </a>
    </div>
    <!-- Index about us  -->
    <div class='container-fluid index-about-us' style='position: relative;'>
        <div class="block-background"
             style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/index-about-us.jpg' ?>")'></div>
        <div class="container">
            <h2 class='section-title mb-3'><?php _e('О нас', 'nmc-theme') ?></h2>
            <h3 class='about-us-title'><?php _e('"НМЦ - Ваш врач" предоставляет широкий спектр диагностических и лечебных
                услуг', 'nmc-theme') ?>:</h3>
            <ul>
                <li>
                    <?php _e('для взрослых в области: кардиологии, неврологии, эндокринологии, пульмонологии, рефлексотерапии,
                    ультразвуковой диагностики, функциональной диагностики', 'nmc-theme') ?>
                </li>
                <li>
                    <?php _e('для детей в области: педиатрии, детской кардиоревматологии, детской неврологии, детской
                    отоларингологии, детской гастроэнтерологии, детской аллергологии, детской психологии.', 'nmc-theme') ?>
                </li>
            </ul>
            <div class="text-center">
                <a href="<?php echo get_page_link( 7 ); ?>">
                    <button class="button button-blue"><?php _e('Читать ещё', 'nmc-theme') ?></button>
                </a>
            </div>
        </div>
    </div>
    <!-- Index reasons -->
    <h2 class="section-title"><?php _e('5 причин выбрать нашу клинику', 'nmc-theme') ?></h2>
    <!-- Index reasons version 2 -->
    <div class="container reasons-wrapper">
        <ul class="nav nav-tabs w-100 d-flex justify-content-between" id="myTab" role="tablist">
            <li class="nav-item reasons-nav-item reasons-nav-item-blue">
                <a class="nav-link active" id="consultants-tab" data-toggle="tab" href="#consultants" role="tab"
                   aria-controls="consultants"
                   aria-selected="true">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/consultants.svg' ?>"
                         alt="Научные консультанты">
                    <p><?php _e('Научные консультанты', 'nmc-theme') ?></p>
                </a>
            </li>
            <li class="nav-item reasons-nav-item reasons-nav-item-white">
                <a class="nav-link" id="laboratory-tab" data-toggle="tab" href="#laboratory" role="tab"
                   aria-controls="laboratory"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/laboratory.svg' ?>"
                         alt="Лабораторная диагностика">
                    <p><?php _e("Лабораторная диагностика", "nmc-theme") ?></p>
                </a>
            </li>
            <li class="nav-item reasons-nav-item reasons-nav-item-blue">
                <a class="nav-link" id="place-tab" data-toggle="tab" href="#place" role="tab" aria-controls="place"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/place.svg' ?>" alt="расположение">
                    <p><?php _e('Удобное рассположение', 'nmc-theme') ?></p>
                </a>
            </li>
            <li class="nav-item reasons-nav-item reasons-nav-item-white">
                <a class="nav-link" id="time-tab" data-toggle="tab" href="#time" role="tab" aria-controls="time"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/clock.svg' ?>" alt="стационар">
                    <p><?php _e("Дневной стационар", 'nmc-theme') ?></p>
                </a>
            </li>

            <li class="nav-item reasons-nav-item reasons-nav-item-blue">
                <a class="nav-link" id="individual-tab" data-toggle="tab" href="#individual" role="tab"
                   aria-controls="individual"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/individual.svg' ?>"
                         alt="идндивидуальный подход">
                    <p><?php _e('Индивидуальный подход', 'nmc-theme') ?></p>
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active reason-content reason-content-blue" id="consultants" role="tabpanel"
                 aria-labelledby="consultants-tab">
                <div class="specialists">
					<?php
					// get children of current page
					global $post;
					$page_id = $post->ID;

					$specialists = get_children( array(
						'post_parent' => 11,
						'post_type'   => 'specialist',
						'numberposts' => - 1,
						'post_status' => 'publish'

					) );

					if ( $specialists ) {
						foreach ( $specialists as $specialist ) {
							$specialist_id   = $specialist->ID;
							$specialist_name = $specialist->post_title;
							$specialist_link = $specialist->guid;
							$is_consultant   = get_field( 'is_consultant', $specialist_id );
							$is_boss         = get_field( 'is_boss', $specialist_id );
							if ( ! $is_boss ) {
								if ( $is_consultant ) {
									?>
                                    <div class="specialist">
                                        <a href="<?php echo $specialist_link ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url( $specialist_id ) ?>"
                                                 alt="<?php echo $specialist_name ?>">
                                            <h2 class="name"><?php echo $specialist_name ?></h2>
											<?php
											// get "text for specialists page" field
											$post = get_field( 'specialist_list_page_text', $specialist_id );
											?>
                                            <p class='post'><?php echo $post; ?></p>
                                        </a>
                                    </div>
									<?php
								}
							}
						}
					}
					?>
                </div>
            </div>
            <div class="tab-pane fade reason-content reason-content-white" id="laboratory" role="tabpanel"
                 aria-labelledby="laboratory-tab">Лаборатория
            </div>
            <div class="tab-pane fade reason-content reason-content-blue" id="place" role="tabpanel"
                 aria-labelledby="place-tab">Удобное расположение
            </div>
            <div class="tab-pane fade reason-content reason-content-white" id="time" role="tabpanel"
                 aria-labelledby="time-tab">Дневной стационар
            </div>
            <div class="tab-pane fade reason-content reason-content-blue" id="individual" role="tabpanel"
                 aria-labelledby="individual-tab">Индивидуальный подход
            </div>
        </div>
    </div>
    <!-- Index action block -->
    <div class="container-fluid index-action-block">
        <div class="index-action-block-background block-background"
             style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/photo3.jpg' ?>")'></div>
        <!-- Index contacts  -->
        <div class="container index-contacts mx-auto">
            <h2 class='text-center font-weight-bold mx-auto contacts-title'><?php _e('Мы всегда рады оказать своевременную и
                квалифицированную помощь!', 'nmc-theme') ?></h2>
            <div class="row mx-auto justify-content-center">
                <div class="col-1 col-xl-2"></div>
                <div class="col-6 col-md-5 col-xl-4 d-flex flex-column align-items-center justify-content-center address-block">
                    <div>
                        <h3><?php _e('Адрес', 'nmc-theme') ?>:</h3>
                        <p><?php _e('пр. Науки,77, г. Харьков 61103, Украина', 'nmc-theme') ?></p>
                    </div>
                </div>
                <div class="col-6 col-md-5 col-xl-4 d-flex flex-column align-items-center phones-block">
                    <div>
                        <h3><?php _e('Телефоны', 'nmc-theme') ?>:</h3>
                        <p class='py-0 mb-0'>(099) 730 33 03, <br>(097) 370 33 03</p>
                    </div>
                </div>
                <div class="col-1 col-xl-2"></div>
            </div>
            <div class="text-center">
                <button class="button button-white" data-toggle="modal" data-target="#modal"><?php _e('Записаться на приём', 'nmc-theme') ?>
                </button>
            </div>
        </div>
    </div>
<?php
/* Get footer */
get_footer();
?>