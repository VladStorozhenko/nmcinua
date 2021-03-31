<?php 

/*
Template Name: О нас
*/

/* Get header */
get_header();
/* About_us css -- enqueue */
wp_enqueue_style('nmc-about-us-css');
?>

<!-- About us hero -->
<div class="about-us-hero container-fluid">
    <div class="block-background" style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/about-us.jpg' ?>")'></div>
    <div class="container">
        <?php echo do_shortcode('[flexy_breadcrumb]') ?>
        <h2><?php _e('Научный медицинский центр - "Ваш врач" - современный консультативно-диагностический центр в городе Харькове. Мы предоставляем широкий спектр диагностических и лечебных услуг', 'nmc-theme') ?>:</h2>
        <div class="row">
            <div class="col-12 col-md-5">

                <h3><?php _e('для взрослых', 'nmc-theme') ?></h3>
                <p class='for-adults'><?php _e('в области: кардиологии, неврологии, эндокринологии, пульмонологии, иммунологии, аллергологии.', 'nmc-theme') ?></p>
            </div>
            <div class="col-2"></div>
            <div class="col-12 col-md-5">
                <h3><?php _e('для детей', 'nmc-theme') ?></h3>
                <p><?php _e('в области: педиатрии, детской кардиоревматологии, детской неврологии, детской гастроэнтерологии, детской аллергологии.', 'nmc-theme') ?></p>
            </div>
        </div>
        <div class="text-center"><button class="button button-white" data-toggle="modal" data-target="#modal"><?php _e('Записаться на приём', 'nmc-theme') ?></button></div>
    </div>
</div>

<!-- Paragraph 1 block -->
<div class="container-fluid about-us-paragraph about-us-paragraph-1 px-0">
    <div class="img-wrapper">
        <img src="<?php echo get_template_directory_uri() . '/inc/images/photo-index.jpg' ?>" style='max-width: 1000px; max-height: 600px; object-fit: cover;' alt="О нас">
    </div>
    <p><?php _e('Оснащение современным оборудованием, высокая квалификация и профессионализм специалистов "НМЦ - Ваш врач", а также индивидуальный подход к каждому пациенту, позволяют проводить диагностику, консервативное лечение и реабилитацию различных заболеваний в соответствии с международными стандартами медицинской практики.', 'nmc-theme') ?>
    <br>
    <br>
    <?php _e('В "НМЦ - Ваш врач" применяют методы функциональной диагностики, такие как электрокардиография (ЭКГ) на высокоточном многоканальном аппарате и суточный мониторинг ЭКГ по методу Холтера для углубленной оценки состояния сердечной мышцы в режиме повседневных нагрузок и исключения синдрома «белого халата» у пациентов. Доступен также полный комплекс ультразвуковой диагностики (УЗД), в т.ч. методом цветного картирования [color doppler], на современном цифровом кардиосканере, что расширяет диагностические возможности при сердечно-сосудистых заболеваниях и является компетентным методом визуализации. На базе медицинского центра у каждого пациента есть возможность получения услуг современной диагностической лаборатории с интерпретацией результатов лечащим врачом.', 'nmc-theme') ?></p>
</div>

<!-- Paragraph 2 block -->
<div class="container about-us-paragraph-2">
    <p><?php ?></p>
    <h2><?php _e('Мы всегда рады оказать своевременную и квалифицированную помощь!', 'nmc-theme') ?></h2>
</div>

<!-- Partners -->
<!--<h2 class="section-title px-0">Наши партнёры</h2>-->
<!--    <div class="container">-->
<!--        <div class="partners mx-auto">-->
<!--        <a href="#">-->
<!--            <div class="partner center-partner">-->
<!--                <img src="--><?php //echo get_template_directory_uri() . '/inc/images/dila.jpg' ?><!--" alt="наш партнёр">-->
<!--            </div>-->
<!--        </a>-->
<!--        </div>-->
<!--    </div>-->
<?php
/* Get footer */
get_footer();
?>