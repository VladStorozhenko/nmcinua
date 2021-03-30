<?php

/*
Template Name: Главная
*/

/**

 * ===
 * Index file
 * ===

/* Get header */
get_header();
/* Main css -- enqueue */
wp_enqueue_style('nmc-main-css');
?>

<!-- Index hero -->

<div class="container-fluid index-hero px-0">

    <div class="background-dark"></div>

    <div class="index-hero-background block-background" style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/photo-index.jpg' ?>")'></div>

    <div class="container text-center hero-content px-0">

        <h1 class='mx-auto'><?php _e('НАУЧНЫЙ МЕДИЦИНСКИЙ ЦЕНТР - "ВАШ ВРАЧ"', 'nmc-theme') ?></h1>

        <p class='mx-auto'>Современный консультативно-диагностический центр в городе Харькове</p>

        <button class="button button-white" data-toggle="modal" data-target="#modal">Записаться на приём</button>

    </div>

    <div class="hero-arrow-down-wrapper">

        <img src="<?php echo get_template_directory_uri() . '/inc/icons/hero-arrow-down.svg' ?>" alt="Вниз">

    </div>

</div>

<!-- End index hero -->





<!-- Index services -->



<h2 class='section-title'>Услуги</h2>

<div class="container">

    <div class='services index-services'>

    <?php 

    

    $services = get_children(

        array(

            'post_parent'       => 9,

            'post_type'         => 'service',

            'numberposts'       => -1,

            'post_status'       => 'publish'

        )

        );



    if ($services) {

        foreach($services as $service) {

            $value = get_field('featured', $service->ID);

            if($value[0] == 'checked') {

                ?>

                <a href="<?php echo $service->guid ?>">

                <div class="service">

                    <div class="service-bg-image block-background" style='background-image: url("<?php echo get_the_post_thumbnail_url($service->ID) ?>")'></div>

                    <h2 class='service-name'><?php echo $service->post_title ?></h2>

                </div></a>

                <?php

            }

        }

    }

    

    ?>

    </div>

</div>

<div class="text-center">

    <a href="<?php echo get_page_link(9) ?>"><button class="button button-blue index-services-show-all">Показать все</button></a>

</div>



<!-- End index services -->



<!-- Index about us  -->



<div class='container-fluid index-about-us' style='position: relative;'>

    <div class="block-background" style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/index-about-us.jpg' ?>")'></div>

        <div class="container">

            <h2 class='section-title mb-3'>О нас</h2>

            <h3 class='about-us-title'>"НМЦ - Ваш врач" предоставляет широкий спектр диагностических и лечебных услуг:</h3>

            <ul>

                <li>

                    для взрослых в области: кардиологии, неврологии, эндокринологии, пульмонологии, рефлексотерапии, ультразвуковой диагностики, функциональной диагностики

                </li>

                <li>

                    для детей в области: педиатрии, детской кардиоревматологии, детской неврологии, детской отоларингологии, детской гастроэнтерологии, детской аллергологии, детской психологии.

                </li>

            </ul>

            <div class="text-center">

                <a href="<?php echo get_page_link(7); ?>"><button class="button button-blue">Читать ещё</button></a>

            </div>



    </div>

</div>

<!-- End index about us  -->



<!-- Index reasons -->



<h2 class="section-title">5 причин выбрать нашу клинику</h2>

<!-- <div class="container index-reasons">

    <div class="reasons-grid">

        <div class='column-1 column column-bg'>

            <h2>100</h2>

            <p>пациентов в день</p>

        </div>

        <div class='column-3 column column-bg'>

            <h2>20</h2>

            <p>партнеров</p>

        </div>

        <div class='column-5 column column-bg'>

            <h2>50</h2>

            <p>КВАЛИФИЦИРОВАННЫХ СПЕЦИАЛИСТОВ</p>

        </div>

    </div>

    <div class="reasons-grid">

        <div class="column-2 column column-border">

            <h2>99%</h2>

            <p>ВЫЗДОРОВЕВШИХ КЛИЕНТОВ</p>

        </div>

        <div class="column-4 column column-border">

            <h2>10</h2>

            <p>Лет работы</p>

        </div>

    </div>

</div> -->



<!-- End index reasons -->



<!-- Index reasons version 2 -->





<div class="container reasons-wrapper">

    <ul class="nav nav-tabs w-100 d-flex justify-content-between" id="myTab" role="tablist">

    <li class="nav-item reasons-nav-item reasons-nav-item-blue">

        <a class="nav-link active" id="consultants-tab" data-toggle="tab" href="#consultants" role="tab" aria-controls="consultants"

        aria-selected="true">

            <img src="<?php echo get_template_directory_uri() . '/inc/icons/consultants.svg' ?>" alt="Научные консультанты">

            <p>3 научных консультанта</p>

        </a>

    </li>

    <li class="nav-item reasons-nav-item reasons-nav-item-white">

        <a class="nav-link" id="laboratory-tab" data-toggle="tab" href="#laboratory" role="tab" aria-controls="laboratory"

        aria-selected="false">

            <img src="<?php echo get_template_directory_uri() . '/inc/icons/laboratory.svg' ?>" alt="Лабораторная диагностика">

            <p>ЛАБОРАТОРНАЯ ДИАГНОСТИКА</p>

        </a>

    </li>   

    <li class="nav-item reasons-nav-item reasons-nav-item-blue">

        <a class="nav-link" id="place-tab" data-toggle="tab" href="#place" role="tab" aria-controls="place"

        aria-selected="false">

            <img src="<?php echo get_template_directory_uri() . '/inc/icons/place.svg' ?>" alt="расположение">

            <p>УДОБНОЕ РАСПОЛОЖЕНИЕ</p>

        </a>

    </li>

    <li class="nav-item reasons-nav-item reasons-nav-item-white">

        <a class="nav-link" id="time-tab" data-toggle="tab" href="#time" role="tab" aria-controls="time"

        aria-selected="false">

            <img src="<?php echo get_template_directory_uri() . '/inc/icons/clock.svg' ?>" alt="стационар">

            <p>ДНЕВНОЙ СТАЦИОНАР</p>

        </a>

    </li>

    <li class="nav-item reasons-nav-item reasons-nav-item-blue">

        <a class="nav-link" id="individual-tab" data-toggle="tab" href="#individual" role="tab" aria-controls="individual"

        aria-selected="false">

            <img src="<?php echo get_template_directory_uri() . '/inc/icons/individual.svg' ?>" alt="идндивидуальный подход">

            <p>ИНДИВИДУАЛЬНЫЙ ПОДХОД</p>

        </a>

    </li>

    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active reason-content reason-content-blue" id="consultants" role="tabpanel" aria-labelledby="consultants-tab">

            <div class="specialists">

            <?php 



            // get children of current page

            global $post;

            $page_id = $post->ID;



            $specialists = get_children(array(

                'post_parent'       => 11,

                'post_type'         => 'specialist',

                'numberposts'       => -1,

                'post_status'       => 'publish'

            ));



                if($specialists) {

                    foreach($specialists as $specialist) {

                        // var_dump($specialist);

                        $specialist_id = $specialist->ID;

                        $specialist_name = $specialist->post_title;

                        $specialist_link = $specialist->guid;



                        $is_consultant = get_field('is_consultant', $specialist_id);



                        $is_boss = get_field('is_boss', $specialist_id);



                        if(!$is_boss) {

                            if($is_consultant) {

                                ?>

                                

                                <div class="specialist">

                                    <a href="<?php echo $specialist_link ?>">

                                        <img src="<?php echo get_the_post_thumbnail_url($specialist_id) ?>" alt="<?php echo $specialist_name ?>">

                                        <h2 class="name"><?php echo $specialist_name ?></h2>

                                        <?php 

                                        // get "text for specialists page" field

                                        $post = get_field('specialist_list_page_text', $specialist_id);

                                        ?>

                                        <p class='post'><?php echo $post;?></p>

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

        <div class="tab-pane fade reason-content reason-content-white" id="laboratory" role="tabpanel" aria-labelledby="laboratory-tab">Лаборатория</div>

        <div class="tab-pane fade reason-content reason-content-blue" id="place" role="tabpanel" aria-labelledby="place-tab">Удобное расположение</div>

        <div class="tab-pane fade reason-content reason-content-white" id="time" role="tabpanel" aria-labelledby="time-tab">Дневной стационар</div>

        <div class="tab-pane fade reason-content reason-content-blue" id="individual" role="tabpanel" aria-labelledby="individual-tab">Индивидуальный подход</div>

        </div>

    </div>



<!-- End index reasons version 2 -->



<!-- Index action block -->



<div class="container-fluid index-action-block">

<div class="index-action-block-background block-background" style='background-image: url("<?php echo get_template_directory_uri() . '/inc/images/photo3.jpg' ?>")'></div>



<!-- Index contacts  -->



<div class="container index-contacts mx-auto">

    <h2 class='text-center font-weight-bold mx-auto contacts-title'>Мы всегда рады оказать своевременную и квалифицированную помощь!</h2>

    <div class="row mx-auto justify-content-center">

        <div class="col-1 col-xl-2"></div>

        <div class="col-6 col-md-5 col-xl-4 d-flex flex-column align-items-center justify-content-center address-block">

            <div>

                <h3>Адрес:</h3>

                <p>пр. Науки,77, г. Харьков 61103, Украина</p>

            </div>

        </div>

        <div class="col-6 col-md-5 col-xl-4 d-flex flex-column align-items-center phones-block">

            <div>

                <h3>Телефоны:</h3>

                <p class='py-0 mb-0'>(099) 730 33 03, <br>(097) 370 33 03</p>

                <!-- <p class='py-0 mb-0'></p> -->

            </div>

        </div>

        <div class="col-1 col-xl-2"></div>

    </div>

    <div class="text-center">

        <button class="button button-white" data-toggle="modal" data-target="#modal">Записаться на приём</button>

    </div>

</div>



<!-- End index contacts  -->




</div>



<!-- End index action block -->



<!-- Partners -->



<!-- <h2 class="section-title px-0">Наши партнёры</h2>

    <div class="container">

        <div class="partners mx-auto">

        <a href="#">

            <div class="partner center-partner">

                <img src="<?php echo get_template_directory_uri() . '/inc/images/dila.jpg' ?>" alt="наш партнёр">

            </div>

        </a>

        </div>

    </div> -->



<!-- End Partners -->



<?php 

/* Get footer */

get_footer();

?>