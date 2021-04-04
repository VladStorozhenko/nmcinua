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
            <p class='mx-auto'><?php _e( 'Современный консультативно-диагностический центр в городе Харькове', 'nmc-theme' ) ?></p>
            <button class="button button-white" data-toggle="modal"
                    data-target="#modal"><?php _e( 'Записаться на приём', 'nmc-theme' ) ?></button>
        </div>
        <div class="hero-arrow-down-wrapper">
            <img src="<?php echo get_template_directory_uri() . '/inc/icons/hero-arrow-down.svg' ?>" alt="Вниз">
        </div>
    </div>
    <!-- Index services -->
    <h2 class='section-title'><?php _e( 'Услуги', 'nmc-theme' ) ?></h2>
    <div class="container">
		<?php
		$services = get_posts( array(
			'post_type'        => 'service',
			'numberposts'      => - 1,
			'post_status'      => 'publish',
			'suppress_filters' => '0'
		) );

		$services_1 = array();
		$services_2 = array();
		$services_3 = array();

		foreach ( $services as $service ) {
			$id       = $service->ID;
			$category = get_field( 'featured_category', $id );

			switch ( $category ) {
				case 1:
					array_push( $services_1, $service );
					break;
				case 2:
					array_push( $services_2, $service );
					break;
				case 3:
					array_push( $services_3, $service );
					break;
			}
		}

		?>
        <div class="index-services-new">
            <div class="services-column">
                <h2 class="title"><?php _e( 'Для взрослых', 'nmc-theme' ) ?></h2>
                <div class="list">
					<?php
					foreach ( $services_1 as $service ) {
						$id    = $service->ID;
						$link  = get_permalink( $id );
						$title = get_field( 'featured_name', $id ) ? get_field( 'featured_name', $id ) : get_the_title( $id );
						?>
                        <a href="<?php echo $link ?>">
                            <div class="service">
                                <h4 class="service-title"><?php echo $title; ?></h4>
                            </div>
                        </a>
						<?php
					}
					?>
                </div>
            </div>
            <div class="services-column">
                <h2 class="title"><?php _e( 'Для детей', 'nmc-theme' ) ?></h2>
                <div class="list">
					<?php
					foreach ( $services_2 as $service ) {
						$id    = $service->ID;
						$link  = get_permalink( $id );
						$title = get_field( 'featured_name', $id ) ? get_field( 'featured_name', $id ) : get_the_title( $id );
						?>
                        <a href="<?php echo $link ?>">
                            <div class="service">
                                <h4 class="service-title"><?php echo $title; ?></h4>
                            </div>
                        </a>
						<?php
					}
					?>
                </div>
            </div>
            <div class="services-column">
                <h2 class="title"><?php _e( 'Диагностика', 'nmc-theme' ) ?></h2>
                <div class="list">
					<?php
					foreach ( $services_3 as $service ) {
						$id    = $service->ID;
						$link  = get_permalink( $id );
						$title = get_field( 'featured_name', $id ) ? get_field( 'featured_name', $id ) : get_the_title( $id );
						?>
                        <a href="<?php echo $link ?>">
                            <div class="service">
                                <h4 class="service-title"><?php echo $title; ?></h4>
                            </div>
                        </a>
						<?php
					}
					?>
                </div>
            </div>
        </div>
        <!--        <div class='services index-services'>-->
		<?php
		//			$services = get_posts(
		//				array(
		//					'post_type'        => 'service',
		//					'numberposts'      => - 1,
		//					'post_status'      => 'publish',
		//					'suppress_filters' => '0'
		//				)
		//			);
		//			if ( $services ) {
		//				foreach ( $services as $service ) {
		//					$value = get_field( 'featured', $service->ID );
		//					if ( $value[0] == 'checked' ) {
		?>
        <!--                        <a href="--><?php //echo get_permalink( $service->ID ) ?><!--">-->
        <!--                            <div class="service">-->
        <!--                                <div class="service-bg-image block-background"-->
        <!--                                     style='background-image: url("-->
		<?php //echo get_the_post_thumbnail_url( $service->ID ) ?><!--")'></div>-->
        <!--                                <h2 class='service-name'>--><?php //echo $service->post_title ?><!--</h2>-->
        <!--                            </div>-->
        <!--                        </a>-->
		<?php
		//					}
		//				}
		//			}
		?>
        <!--        </div>-->
    </div>
    <div class="text-center">
        <a href="<?php echo get_page_link( 9 ) ?>">
            <button class="button button-blue index-services-show-all"><?php _e( 'Показать все', 'nmc-theme' ) ?></button>
        </a>
    </div>
    <!-- Index about us  -->
    <div class='container-fluid index-about-us' style='position: relative;'>
        <div class="block-background"
             style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/index-about-us.jpg' ?>")'></div>
        <div class="container">
            <h2 class='section-title mb-3'><?php _e( 'О нас', 'nmc-theme' ) ?></h2>
            <h3 class='about-us-title'><?php _e( '"НМЦ - Ваш врач" предоставляет широкий спектр диагностических и лечебных
                услуг', 'nmc-theme' ) ?>:</h3>
            <ul>
                <li>
					<?php _e( 'для взрослых в области: кардиологии, неврологии, эндокринологии, пульмонологии, рефлексотерапии,
                    ультразвуковой диагностики, функциональной диагностики', 'nmc-theme' ) ?>
                </li>
                <li>
					<?php _e( 'для детей в области: педиатрии, детской кардиоревматологии, детской неврологии, детской
                    отоларингологии, детской гастроэнтерологии, детской аллергологии, детской психологии.', 'nmc-theme' ) ?>
                </li>
            </ul>
            <div class="text-center">
                <a href="<?php echo get_page_link( 7 ); ?>">
                    <button class="button button-blue"><?php _e( 'Читать ещё', 'nmc-theme' ) ?></button>
                </a>
            </div>
        </div>
    </div>
    <!-- Index reasons -->
    <h2 class="section-title"><?php _e( '5 причин выбрать нашу клинику', 'nmc-theme' ) ?></h2>
    <!-- Index reasons version 2 -->
    <div class="container reasons-wrapper">
        <ul class="nav nav-tabs w-100 d-flex justify-content-between" id="myTab" role="tablist">
            <li class="nav-item reasons-nav-item reasons-nav-item-blue">
                <a class="nav-link active" id="consultants-tab" data-toggle="tab" href="#consultants" role="tab"
                   aria-controls="consultants"
                   aria-selected="true">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/consultants.svg' ?>"
                         alt="Научные консультанты">
                    <p><?php _e( 'Научные консультанты', 'nmc-theme' ) ?></p>
                </a>
            </li>
            <li class="nav-item reasons-nav-item reasons-nav-item-white">
                <a class="nav-link" id="laboratory-tab" data-toggle="tab" href="#laboratory" role="tab"
                   aria-controls="laboratory"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/laboratory.svg' ?>"
                         alt="Лабораторная диагностика">
                    <p><?php _e( "Лабораторная диагностика", "nmc-theme" ) ?></p>
                </a>
            </li>
            <li class="nav-item reasons-nav-item reasons-nav-item-blue">
                <a class="nav-link" id="place-tab" data-toggle="tab" href="#place" role="tab" aria-controls="place"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/place.svg' ?>" alt="расположение">
                    <p><?php _e( 'Удобное рассположение', 'nmc-theme' ) ?></p>
                </a>
            </li>
            <li class="nav-item reasons-nav-item reasons-nav-item-white">
                <a class="nav-link" id="time-tab" data-toggle="tab" href="#time" role="tab" aria-controls="time"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/clock.svg' ?>" alt="стационар">
                    <p><?php _e( "Дневной стационар", 'nmc-theme' ) ?></p>
                </a>
            </li>

            <li class="nav-item reasons-nav-item reasons-nav-item-blue">
                <a class="nav-link" id="individual-tab" data-toggle="tab" href="#individual" role="tab"
                   aria-controls="individual"
                   aria-selected="false">
                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/individual.svg' ?>"
                         alt="идндивидуальный подход">
                    <p><?php _e( 'Индивидуальный подход', 'nmc-theme' ) ?></p>
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active reason-content reason-content-blue" id="consultants" role="tabpanel"
                 aria-labelledby="consultants-tab">
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
            <h2 class='text-center font-weight-bold mx-auto contacts-title'><?php _e( 'Мы всегда рады оказать своевременную и
                квалифицированную помощь!', 'nmc-theme' ) ?></h2>
            <div class="row mx-auto justify-content-center">
                <!--                <div class="col-1 col-xl-2"></div>-->
                <div class="col-4 col-md-4 col-12 d-flex flex-column align-items-center justify-content-center address-block">
                    <div>
                        <h3><?php _e( 'Адрес', 'nmc-theme' ) ?>:</h3>
                        <p><?php _e( 'пр. Науки,77, г. Харьков 61103, Украина', 'nmc-theme' ) ?></p>
                    </div>
                </div>
                <div class="col-4 col-md-4 col-12 d-flex flex-column align-items-center justify-content-center phones-block">
                    <div>
                        <h3><?php _e( 'Телефоны', 'nmc-theme' ) ?>:</h3>
                        <p class='py-0 mb-0'>(099) 730 33 03, <br>(097) 370 33 03</p>
                    </div>
                </div>
                <div class="col-4 col-md-4 col-12 d-flex flex-column align-items-center justify-content-center phones-block">
                    <div>
                        <h3><?php _e( 'Время работы', 'nmc-theme' ) ?>:</h3>
                        <p class='py-0 mb-0'><?php _e( 'Ежедневно', 'nmc-theme' ) ?>
                            <br> <?php _e( 'с 9:00 до 19:00', 'nmc-theme' ) ?></p>
                    </div>
                </div>
                <!--                <div class="col-1 col-xl-2"></div>-->
            </div>
            <div class="text-center">
                <button class="button button-white" data-toggle="modal"
                        data-target="#modal"><?php _e( 'Записаться на приём', 'nmc-theme' ) ?>
                </button>
            </div>
        </div>
    </div>
    <!-- Partners -->
    <h2 class="section-title px-0"><?php _e( 'Наши партнёры', 'nmc-theme' ) ?></h2>
    <div class="container">
        <div class="partners mx-auto">
            <a href="https://www.synevo.ua/ua">
                <div class="partner center-partner">
                    <svg style="width: 200px !important;" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 644.986 230.23"
                         fill="#0053a0" data-darkreader-inline-fill="">
                        <path d="M0 64.8c.321-1.716.543-3.458.98-5.144a29.797 29.797 0 0 1 54.565-7.823q12.55 21.744 24.99 43.551c.157.273.286.562.55 1.087H79.59l-50.508-.04A29.457 29.457 0 0 1 .508 71.925C.348 70.91.17 69.895 0 68.88V64.8zM264.24 0c2.286.335 4.591.569 6.853 1.023a32.655 32.655 0 0 1 16.944 9.308l-9.327 10.645c-.894-.716-1.722-1.388-2.56-2.048-4.332-3.417-9.205-5.577-14.766-5.448-8.175.191-14.147 4.113-17.591 11.548-4.139 8.934-1.87 20.001 5.16 26.027a20.392 20.392 0 0 0 22.89 2.052c2.564-1.426 4.881-3.298 7.203-4.892l9.23 9.23a38.518 38.518 0 0 1-7.523 6.363 33.92 33.92 0 0 1-16.137 5.12 36.019 36.019 0 0 1-19.333-3.385c-10.446-5.244-16.648-13.73-18.444-25.262-1.618-10.39.726-19.867 7.484-28.034A33.19 33.19 0 0 1 255.533.522c1.22-.19 2.445-.349 3.667-.522h5.04zM225.902 106.975v-9.23h1.317q208.182 0 416.363-.026c1.14 0 1.433.348 1.401 1.417q-.098 3.297 0 6.598c.03 1.019-.332 1.39-1.311 1.247a5.007 5.007 0 0 0-.72-.006h-417.05zM92.42 89.867c-1.712-2.942-3.319-5.693-4.916-8.448-7.01-12.092-14.27-24.049-20.965-36.313-10.046-18.399.57-39.556 19.758-43.566a29.694 29.694 0 0 1 35.19 22.097 28.068 28.068 0 0 1-2.933 21.408c-8.395 14.567-16.916 29.06-25.386 43.583-.2.343-.41.68-.748 1.239zM103.55 96.485c.313-.574.527-.989.76-1.392 8.247-14.247 16.443-28.523 24.76-42.728 6.065-10.359 15.2-15.44 27.215-15.136 12.987.329 24.572 10.049 27.49 22.94a29.762 29.762 0 0 1-24.565 36.187 28.462 28.462 0 0 1-4.42.304q-16.2.028-32.399-.008c-5.838-.01-11.677-.056-17.516-.09-.38-.003-.762-.043-1.325-.077zM103.871 109.116h1.67c5.44 0 10.88.01 16.319-.002 11.078-.024 22.156-.147 33.233-.06a28.518 28.518 0 0 1 20.847 8.543c8.046 8.194 10.757 18.076 7.675 29.11-3.098 11.091-10.606 18.144-21.78 20.952a29.23 29.23 0 0 1-31.457-12.222c-2.817-4.303-5.185-8.902-7.745-13.373q-9.052-15.81-18.091-31.63c-.193-.338-.355-.694-.671-1.318zM92.35 115.716c1.994 3.463 3.884 6.742 5.77 10.022q9.794 17.036 19.59 34.07a30.772 30.772 0 0 1 4.145 17.567c-.741 12.584-10.548 23.926-22.986 26.57a29.709 29.709 0 0 1-35.821-23.457 28.095 28.095 0 0 1 3.36-20.106q12.473-21.577 25.029-43.107c.26-.446.522-.891.913-1.559zM81.313 109.116c-.31.59-.494.973-.706 1.34-8.395 14.478-16.683 29.02-25.23 43.41-5.045 8.492-12.683 13.31-22.576 14.357a29.665 29.665 0 0 1-7.312-58.855c4.399-.618 8.934-.264 13.407-.353.36-.007.72.009 1.08.01l39.826.091h1.511zM504.846 67.842V1.246h1.343c10.435 0 20.87-.072 31.304.03 5.663.054 11.025 1.331 15.469 5.145 4.024 3.453 5.578 7.933 5.336 13.147-.264 5.707-2.993 9.889-7.796 12.822a8.98 8.98 0 0 0-.596.401 1.887 1.887 0 0 0-.229.29c.879.402 1.734.782 2.578 1.183 4.487 2.13 8.079 5.183 9.214 10.216 2.112 9.366-.971 17.806-11.481 21.48a39.21 39.21 0 0 1-13.08 1.95l-30.824-.002c-.39 0-.78-.04-1.238-.066zm24.152-27.338v-.193c-2.838 0-5.676.037-8.513-.02-1.013-.02-1.412.236-1.396 1.331q.086 6.114.002 12.23c-.013 1.034.275 1.388 1.348 1.378 5.435-.048 10.871.02 16.306-.04a15.85 15.85 0 0 0 7-1.33 6.333 6.333 0 0 0 3.725-6.07 6.057 6.057 0 0 0-3.715-6.04 12.826 12.826 0 0 0-4.341-1.19c-3.465-.172-6.943-.056-10.416-.056zm-.777-26.776l-.012.183c-2.556 0-5.114.042-7.67-.02-1.062-.026-1.474.248-1.454 1.396q.1 5.81.001 11.624c-.017 1.084.353 1.354 1.373 1.343 4.194-.046 8.394.101 12.581-.069a23.449 23.449 0 0 0 6.548-1.118c3.326-1.135 4.79-4.453 3.875-7.877-.799-2.991-3.05-4.393-5.827-4.788-3.107-.442-6.274-.467-9.415-.674zM499.352 193.33a29.407 29.407 0 0 1-11.236 8.073 42.036 42.036 0 0 1-27.9 2.19c-12.418-3.36-19.994-11.714-22.828-24.194-1.86-8.196-1.63-16.38 1.856-24.184 4.862-10.886 13.215-17.365 25.097-18.853 8.235-1.031 16.104.115 22.991 5.273 6.118 4.581 9.48 10.881 11.318 18.124a61.567 61.567 0 0 1 1.619 14.007c.025 1.245-.41 1.542-1.588 1.54q-22.133-.05-44.267-.022h-1.874a11.461 11.461 0 0 0 1.278 6.108 17.183 17.183 0 0 0 13.27 9.391 28.924 28.924 0 0 0 19.149-3.705 47.351 47.351 0 0 0 4.596-3.4zm-46.965-29.604h29.403c.4 0 .8-.023 1.198.002.718.046.905-.326.835-.962a14.059 14.059 0 0 0-5.116-9.82 15.692 15.692 0 0 0-12.842-3.208c-5.3.83-9.511 3.385-12.09 8.235a10.522 10.522 0 0 0-1.388 5.753zM481.3 47.606l8.618 9.775a28.305 28.305 0 0 1-8.813 6.94 42.616 42.616 0 0 1-23.102 4.484c-11.186-.777-20.129-5.57-26.04-15.331a35.694 35.694 0 0 1-4.882-17.942c-.306-12.567 3.93-23.033 14.652-30.26 5.989-4.035 12.723-5.311 19.858-5 7.904.345 14.721 3.097 20.13 8.949a33.163 33.163 0 0 1 7.809 15.943 54.198 54.198 0 0 1 1.222 13.207c-.008.272-.038.543-.07.98H444.73c-1.589 0-1.648.008-1.5 1.539.477 4.955 3.2 8.527 7.217 11.164a18.488 18.488 0 0 0 12.321 3.032 56.028 56.028 0 0 0 8.227-1.406 21.238 21.238 0 0 0 10.304-6.074zm-22.65-19.758q7.317 0 14.634-.004c.576-.001 1.24.153 1.141-.874a13.878 13.878 0 0 0-4.966-9.77c-3.735-3.097-8.09-3.958-12.82-3.333-6.05.8-12.444 5.108-13.558 12.466-.21 1.386-.126 1.513 1.294 1.514q7.138.007 14.275.002zM610.555 136.09c18.974-.375 34.315 14.555 34.33 34.353.015 18.178-13.818 34.895-35.173 34.468-20.176-.402-33.542-16.591-33.485-34.588.061-19.5 15.154-34.596 34.328-34.234zm.036 54.873c5.963-.012 10.89-2.422 14.13-7.409 5.307-8.173 5.564-16.716.73-25.135-6.593-11.487-23.348-11.394-29.913.162a22.81 22.81 0 0 0-.539 22.696c3.19 6.285 8.402 9.669 15.592 9.686zM288.346 225.422l7.215-11.388c.832.58 1.57 1.112 2.328 1.617 3.924 2.613 8.083 1.995 10.624-1.975 1.638-2.561 2.61-5.54 4.031-8.252 1.154-2.204.915-4.1-.116-6.362-9.015-19.796-17.893-39.654-26.81-59.494-.16-.356-.302-.719-.513-1.222.497-.039.872-.093 1.248-.093 5.318-.005 10.637.022 15.955-.028a1.505 1.505 0 0 1 1.637 1.148q8.524 20.701 17.106 41.379c.182.438.374.873.673 1.57.28-.638.497-1.063.66-1.508q7.548-20.684 15.066-41.379a1.513 1.513 0 0 1 1.704-1.209c4.958.05 9.918.022 14.876.026.385 0 .77.032 1.321.056-1.1 2.67-2.144 5.207-3.193 7.743q-11.74 28.373-23.469 56.751c-1.73 4.202-3.16 8.532-4.988 12.69a28.968 28.968 0 0 1-7.67 10.593 18.075 18.075 0 0 1-12.318 4.145c-4.106-.017-8.14-.483-11.805-2.55-1.174-.663-2.283-1.442-3.562-2.258zM575.916 34.559c0-19.619 14.654-34.31 34.225-34.31s34.248 14.753 34.265 34.295c.015 18.547-14.278 34.75-34.968 34.392-18.816-.325-33.521-15.128-33.522-34.377zm16.087-1.29a24.93 24.93 0 0 0 2.97 12.797c6.394 11.652 22.375 11.78 29.12 1.86 5.342-7.86 5.742-16.233 1.372-24.6-5.755-11.019-19.054-11.387-26.048-5.58a20.753 20.753 0 0 0-7.414 15.524zM393.996 27.646v-1.861c0-7.68.024-15.358-.025-23.037-.008-1.203.315-1.555 1.545-1.533 4.555.079 9.113.031 13.764.031V67.83c-.366.026-.75.077-1.133.078-4.28.006-8.56-.033-12.838.028-1.103.016-1.333-.392-1.33-1.39.03-8.16.017-16.319.016-24.478v-1.809c-.554-.035-1.015-.09-1.477-.09q-12.838-.007-25.676-.002c-1.567 0-1.57.008-1.57 1.582q-.003 12.239-.002 24.477v1.604h-15.202V1.338h15.203v1.54c0 7.758.029 15.518-.03 23.276-.009 1.25.377 1.525 1.565 1.519 8.559-.05 17.118-.027 25.677-.027h1.513zM380.114 202.671h-15.886v-64.338h15.169l.472 6.858.403.322a10.01 10.01 0 0 1 .94-1.318c5.798-5.89 12.916-7.929 20.997-7.205a23.555 23.555 0 0 1 10.663 3.245c5.552 3.484 8.563 8.72 9.903 14.967a35.163 35.163 0 0 1 .78 7.123c.074 12.959.036 25.919.036 38.878v1.532h-4.44c-3.32 0-6.64-.063-9.958.032-1.236.036-1.545-.328-1.541-1.528.04-12.36.024-24.719.023-37.078a16.36 16.36 0 0 0-1.207-6.908 11.871 11.871 0 0 0-12.833-6.513c-8.258 1.244-12.382 7.951-13.27 14.004a28.41 28.41 0 0 0-.241 4.06q-.028 16.2-.01 32.4v1.467zM225.902 194.89l9.606-10.503a23.564 23.564 0 0 0 8.637 5.398 26.398 26.398 0 0 0 17.163.417 4.79 4.79 0 0 0 3.691-4.12 5.223 5.223 0 0 0-2.695-5.453c-3.116-1.88-6.59-2.803-10.042-3.796-3.523-1.013-7.088-1.927-10.524-3.183a21.583 21.583 0 0 1-10.732-8.304 16.922 16.922 0 0 1 2.193-21.052 26.09 26.09 0 0 1 14.92-7.581c8.993-1.455 17.848-.808 26.213 3.21 1.82.874 3.52 2 5.418 3.093l-8.079 11.099c-3.19-1.315-6.123-2.802-9.223-3.733a26.074 26.074 0 0 0-13.15-.402 7.333 7.333 0 0 0-2.88 1.366c-3.017 2.377-2.84 6.284.516 8.129a37.986 37.986 0 0 0 7.104 2.79c4.226 1.305 8.549 2.302 12.761 3.646a22.541 22.541 0 0 1 9.858 6.16c6.083 6.57 6.854 20.246-3.682 27.321a32.392 32.392 0 0 1-16.059 5.335 46.91 46.91 0 0 1-21.6-3.204 24.906 24.906 0 0 1-9.414-6.633zM502.888 138.253c6.045 0 11.882-.018 17.717.046a1.68 1.68 0 0 1 1.034 1.02q4.512 11.986 8.946 24l7.25 19.525c.164.444.362.875.646 1.553.254-.58.44-.953.585-1.342q8.067-21.71 16.102-43.433a1.805 1.805 0 0 1 2.047-1.4c4.798.065 9.598.028 14.397.028h1.528c-.184.496-.301.849-.444 1.19q-13.022 31.15-26.028 62.308a1.432 1.432 0 0 1-1.605 1.004c-4.559-.034-9.118-.05-13.677.009a1.79 1.79 0 0 1-2.012-1.302q-10.82-25.909-21.74-51.775-2.112-5.021-4.23-10.04c-.166-.399-.302-.81-.516-1.39zM326.052 1.308v66.507c-.4.035-.747.091-1.094.091-4.399.006-8.798-.022-13.197.024a1.06 1.06 0 0 1-1.301-1.293q.034-32.092.003-64.184a1.002 1.002 0 0 1 1.228-1.228c4.439.049 8.878.02 13.317.024.313 0 .626.034 1.044.06z"></path>
                    </svg>
                </div>
            </a>
        </div>
    </div>
<?php
/* Get footer */
get_footer();
?>