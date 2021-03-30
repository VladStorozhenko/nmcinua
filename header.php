<?php 

/**
 * ===
 * Header file 
 * ===
 * 
 * @package nmc
 * 
 * @author Vladislav Storozhenko
 */

?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset='<?php bloginfo('charset') ?>'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <meta name='description' content='<?php bloginfo('description') ?>'>
    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi">
    <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container-fluid px-0 min-vh-100">

<!-- Menu -->

<div class="container-fluid header-wrapper bottom">
  <div class="container container-sm">
      <nav class="navbar navbar-light navbar-expand-lg px-0">
          <a class="navbar-brand" href='<?php echo home_url(); ?>'>
              <img src="<?php echo get_template_directory_uri() . '/inc/images/logo.png' ?>" alt="logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
              </span>
          </button>
          <div class="collapse navbar-collapse justify-content-center navbarNav" id="navbarNav">
          <?php 
              wp_nav_menu(array(
                  'theme_location' => 'Основное меню',
                  'container'		 => false,
                  'menu_class'     => 'navbar-nav justify-content-between',
                  'add_li_class'  => 'nav-item nav-link'
              ));
        ?>
          </div>
      </nav>
  </div>
</div>

<!-- End Menu -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content mx-auto">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?php echo get_template_directory_uri() . '/inc/icons/modal-close.svg' ?>" alt="закрыть">
        </button>
      </div>
      <div class="modal-body">
        <h2>Записаться на консультацию</h2>
        <form method='post' class='w-75 mx-auto' data-url='<?php echo admin_url('admin-ajax.php') ?>' id='standart-form' autocomplete="off">
            <input type="text" name="name" id="name" placeholder='Ваше имя' required />
            <input type="tel" name="tel" id="tel" placeholder='Ваш Телефон' required />
            <button type="submit" class='button button-white'>Отправить</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Specialist Modal -->
<div class="modal fade bd-example-modal-lg" id="speciliastModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content mx-auto">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?php echo get_template_directory_uri() . '/inc/icons/modal-close.svg' ?>" alt="закрыть">
        </button>
      </div>
      <div class="modal-body">
        <h2>Записаться к специалисту</h2>
        <form method='post' class='w-75 mx-auto' data-url='<?php echo admin_url('admin-ajax.php') ?>' id='specialist-form' autocomplete="off">
            <input type="text" name="for-specialist-name" id="for-specialist-name" placeholder='Ваше имя' required />
            <input type="tel" name="for-specialist-tel" id="for-specialist-tel" placeholder='Ваш Телефон' required />
            <input type="hidden" id='specialist-name' name="specialist-name">
            <input type="hidden" name="selected-date" id='selected-date'>
            <input type="text" id="specialist-day" placeholder='Выберите день' required readonly="readonly" />
            <button type="submit" class='button button-white'>Отправить</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Thanks modal -->
<div class="modal fade bd-example-modal-lg" id="thanksModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content mx-auto">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="<?php echo get_template_directory_uri() . '/inc/icons/modal-close.svg' ?>" alt="закрыть">
        </button>
      </div>
      <div class="modal-body">
        <h3>Спасибо за запись!</h3>
        <p>Мы свяжемся с вами в течении дня!</p>
      </div>
    </div>
  </div>
</div>