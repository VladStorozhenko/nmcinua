<?php 



/*

Template Name: О нас

*/



/**

 * ===

 * About us file 

 * ===

 * 

 * @package nmc

 * 

 * @author Vladislav Storozhenko

 */



?>



<?php 

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

        <h2>"Научный медицинский центр - Ваш врач» - современный консультативно-диагностический центр в городе Харькове. Мы предоставляем широкий спектр диагностических и лечебных услуг:</h2>

        <div class="row">

            <div class="col-12 col-md-5">

                <h3>для взрослых</h3>

                <p class='for-adults'>в области: кардиологии, неврологии, эндокринологии, пульмонологии, иммунологии, аллергологии.</p>

            </div>

            <div class="col-2"></div>

            <div class="col-12 col-md-5">

                <h3>для детей</h3>

                <p>в области: педиатрии, детской кардиоревматологии, детской неврологии, детской гастроэнтерологии, детской аллергологии.</p>

            </div>

        </div>

        <div class="text-center"><button class="button button-white" data-toggle="modal" data-target="#modal">Записаться на приём</button></div>

    </div>

</div>



<!-- End about us hero -->



<!-- Paragraph 1 block -->



<div class="container-fluid about-us-paragraph about-us-paragraph-1 px-0">

    <div class="img-wrapper">

        <img src="<?php echo get_template_directory_uri() . '/inc/images/photo-index.jpg' ?>" style='max-width: 1000px; max-height: 600px; object-fit: cover;' alt="О нас">

    </div>

    <p>Оснащение современным оборудованием, высокая квалификация и профессионализм специалистов "НМЦ - Ваш врач", а также индивидуальный подход к каждому пациенту, позволяют проводить диагностику, консервативное лечение и реабилитацию различных заболеваний в соответствии с международными стандартами медицинской практики.

    <br>

    <br>

    В "НМЦ - Ваш врач" применяют методы функциональной диагностики, такие как электрокардиография (ЭКГ) на высокоточном многоканальном аппарате и суточный мониторинг ЭКГ по методу Холтера для углубленной оценки состояния сердечной мышцы в режиме повседневных нагрузок и исключения синдрома «белого халата» у пациентов. Доступен также полный комплекс ультразвуковой диагностики (УЗД), в т.ч. методом цветного картирования [color doppler], на современном цифровом кардиосканере, что расширяет диагностические возможности при сердечно-сосудистых заболеваниях и является компетентным методом визуализации. На базе медицинского центра у каждого пациента есть возможность получения услуг современной диагностической лаборатории с интерпретацией результатов лечащим врачом.</p>

</div>



<!-- End paragraph 1 block -->



<!-- Paragraph 2 block -->



<div class="container about-us-paragraph-2">

    <p>Лечение пациентов осуществляется на основании самых современных международных стандартов и рекомендаций. Наши консультанты - доктора и кандидаты медицинских наук, признанные международные и украинские эксперты, сотрудники ведущих кафедр и НИИ Харькова, Москвы, специалисты из Италии, Швейцарии, Великобритании, Германии, Литвы.</p>

    <h2>Мы всегда рады оказать своевременную и квалифицированную помощь!</h2>

</div>



<!-- End paragraph 2 block -->


<!-- Partners -->



<h2 class="section-title px-0">Наши партнёры</h2>

    <div class="container">

        <div class="partners mx-auto">

        <a href="#">

            <div class="partner center-partner">

                <img src="<?php echo get_template_directory_uri() . '/inc/images/dila.jpg' ?>" alt="наш партнёр">

            </div>

        </a>

        </div>

    </div>



<!-- End Partners -->



<?php 

/* Get footer */

get_footer();

?>