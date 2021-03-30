<?php

/*
Template Name: Контакты
*/

/* Get header and enqueue scripts */
get_header();
wp_enqueue_style( 'nmc-contacts-css' );
?>
    <!-- Breadcrumbs -->
    <div class="container breadcrumbs-on-page">
		<?php echo do_shortcode( '[flexy_breadcrumb]' ); ?>
    </div>
    <div class="section-title mt-3">Контакты</div>
    <!-- Contacts grid -->
    <div class="container contacts-grid">
        <!-- phone -->
        <div class="d-flex align-items-center">
            <img src="<?php echo get_template_directory_uri() . '/inc/icons/contacts-phone.svg' ?>" alt="телефон">
            <h2 class="contacts-text"><p class='phone'>(097) 370-33-03,</p>
                <p class='phone'>(099) 730-33-03</p></h2>
        </div>
        <!-- time -->
        <div class="d-flex align-items-center time">
            <img src="<?php echo get_template_directory_uri() . '/inc/icons/contacts-clock.svg' ?>" alt="время работы">
            <h2 class="contacts-text">Ежедневно с 9:00 до 19:00<br>(Лаборатория с 08:00 до 12:00)</h2>
        </div>
        <!-- e-mail -->
        <div class="d-flex align-items-center email">
            <img src="<?php echo get_template_directory_uri() . '/inc/icons/contacts-mail.svg' ?>" alt="почта">
            <h2 class="contacts-text">info@nmc.in.ua</h2>
        </div>
        <!-- address -->
        <div class="d-flex align-items-center">
            <img src="<?php echo get_template_directory_uri() . '/inc/icons/contacts-address.svg' ?>" alt="адресс">
            <h2 class="contacts-text">пр. Науки, 77,<br>г. Харьков-61103, Украина</h2>
        </div>
    </div>

    <!-- Video -->
    <div class="container d-flex flex-column">
        <h2 class="section-title">Как к нам добраться?</h2>
        <video src="<?php echo get_template_directory_uri() . '/inc/video.mp4' ?>" controls
               class='mx-auto mw-100'></video>
    </div>

    <!-- Map -->
    <div class="container map-wrapper px-0 mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d640.6489183715112!2d36.21950314182876!3d50.03767169197285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a6b38eab2e79%3A0x2b6d2aaff8fe0301!2z0JzQtdC00LjRhtC40L3RgdC60LjQuSDQptC10L3RgtGAICLQktCw0Ygg0JLRgNCw0Yci!5e0!3m2!1sen!2sua!4v1599676080138!5m2!1sen!2sua"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Index action block -->
    <div class="container-fluid index-action-block">
        <div class="index-action-block-background block-background"
             style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/photo3.jpg' ?>")'></div>
        <!-- Index contacts  -->
        <div class="container index-contacts mx-auto">
            <h2 class='text-center font-weight-bold mx-auto contacts-title'>Мы всегда рады оказать своевременную и
                квалифицированную помощь!</h2>
            <div class="text-center">
                <button class="button button-white" data-toggle="modal" data-target="#modal">Записаться на приём
                </button>
            </div>
        </div>
    </div>
<?php
/* Get footer */
get_footer();
?>