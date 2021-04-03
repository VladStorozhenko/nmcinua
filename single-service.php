<?php/*Template Name: Страница услугиTemplate Post Type: page, service*//* Get header */get_header();wp_enqueue_style( 'nmc-services-css' );?>    <!-- Hero -->    <div class="container-fluid single-service-hero">        <div class="block-background" style='background-image: url("<?php echo get_the_post_thumbnail_url() ?>")'></div>        <div class="container">            <div class="container px-0">				<?php				global $post;				$home_url     = get_home_url();				$services_url = get_page_link( 9 );				?>                <p class='breadcrumbs'><a href="<?php echo $home_url ?>"><?php _e('ГЛАВНАЯ', 'nmc-theme') ?>!!!</a>/<a                            href="<?php echo $services_url ?>"><?php _e('УСЛУГИ', 'nmc-theme') ?></a>/<a href="<?php echo $post->guid; ?>"                                                                             class='last'><?php echo $post->post_title; ?></a>                </p>            </div>            <h1 class="single-service-title"><?php the_title(); ?></h1>        </div>    </div>    <!-- the content -->    <div class="container single-service-content">        <div class="w-75">			<?php			if ( have_posts() ) :				while ( have_posts() ) : the_post();					the_content();				endwhile;			endif;			?>        </div>    </div>    <!-- Back to list  -->    <div class="container mb-5 mt-5">        <a href="<?php echo get_page_link( 9 ) ?>" class='back-to-list'><?php _e('назад к списку', 'nmc-theme') ?></a>    </div>    <!-- Contacts block -->    <div class="container-fluid single-service-contacts">        <h2 class='section-title mx-auto'><?php _e('Записаться на прием к врачу можно двумя способами', 'nmc-theme') ?></h2>            <div class="row-wrapper mx-auto">                <div class="row">                <div class="col-12 col-md-6 d-flex flex-column align-items-center border-right">                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/form.svg' ?>" alt="форма">                    <p><?php _e('Заполните форму и вам сразу перезвонит администратор (рабочее время с 9:00 до 19:00)', 'nmc-theme') ?></p>                    <p class="form-button" data-toggle="modal" data-target="#modal"><?php _e('Заполнить Форму', 'nmc-theme') ?></p>                </div>                <div class="col-12 col-md-6 d-flex flex-column align-items-center">                    <img src="<?php echo get_template_directory_uri() . '/inc/icons/phone-white.svg' ?>" alt="телефон">                    <p><?php _e('Позвоните администратору напрямую в сall-центр по указанным номерам телефона', 'nmc-theme') ?>:</p>                    <p class='phones'>+380 (057) 760-33-03,<br> 097-370-33-03,<br> 099-730-33-03</p>                </div>            </div>        </div>    </div><?php/* Get footer */get_footer();?>