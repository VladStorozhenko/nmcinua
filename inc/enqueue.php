<?php


/**
 * ===
 * Scripts and styles enqueue file
 * ===
 */

/* Font-family: Roboto */
function nmc_enqueue_fonts() {
	wp_enqueue_style( 'nmc-roboto-font', "https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap", array(), null, 'all' );
}

add_action( 'wp_enqueue_scripts', 'nmc_enqueue_fonts' );

/* Bootstrap version: 4.3.1 */
function nmc_enqueue_bootstrap() {
	// Bootstrap css
	wp_enqueue_style( 'nmc-bootstrap-css', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), '4.3.1', 'all' );
	// Bootstrap js
	wp_enqueue_script( 'nmc-bootstrap-js', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	// Boostrap bundle js
	wp_enqueue_script( 'nmc-bootstrap-bundle-js', get_template_directory_uri() . '/inc/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.3.1', true );
}

// add bootstrap
add_action( 'wp_enqueue_scripts', 'nmc_enqueue_bootstrap' );

// enqueue styles
function nmc_enqueue_styles() {
	wp_enqueue_style( 'datepicker', "https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css", array(), '1.0.0', 'all' );
	wp_enqueue_style( 'jquery-ui', "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css", array(), '1.0.0', 'all' );
	// Header and footer
	wp_enqueue_style( 'nmc-header-footer-css', get_template_directory_uri() . '/inc/css/header_footer.css', array(), '1.0.0', 'all' );
	// Main css -- enqueue in index.php
	wp_register_style( 'nmc-main-css', get_template_directory_uri() . '/inc/css/main.css', array(), '1.0.0', 'all' );
	// About us css -- enqueue in page_templates/about_us.php
	wp_register_style( 'nmc-about-us-css', get_template_directory_uri() . '/inc/css/about_us.css', array(), '1.0.0', 'all' );
	// Services css -- enqueue in page_templates/services.php
	wp_register_style( 'nmc-services-css', get_template_directory_uri() . '/inc/css/services.css', array(), '1.0.0', 'all' );
	// Specialists css -- enqueue in page_templates/services.php
	wp_register_style( 'nmc-specialists-css', get_template_directory_uri() . '/inc/css/specialists.css', array(), '1.0.0', 'all' );
	// Contacts css -- enqueue in page_templates/contacts.php
	wp_register_style( 'nmc-contacts-css', get_template_directory_uri() . '/inc/css/contacts.css', array(), '1.0.0', 'all' );
	// Schedule css -- enqueue in page_templates/schedule.php
	wp_register_style( 'nmc-schedule-css', get_template_directory_uri() . '/inc/css/schedule.css', array(), '1.0.0', 'all' );
	// Slim select css -- enqueue in page_templates/schedule.php
	wp_register_style( 'nmc-slim', 'https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css', array( 'jquery' ), null, 'all' );
}

// add styles
add_action( 'wp_enqueue_scripts', 'nmc_enqueue_styles' );

// enqueue scripts
function nmc_enqueue_scripts() {
	wp_enqueue_script( 'jquery-ui', "https://code.jquery.com/ui/1.12.1/jquery-ui.min.js", array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'datepicker', "https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js", array(
		'jquery',
		'jquery-ui'
	), '1.0.0', true );
	wp_enqueue_script( 'datepicker-ru', "https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/i18n/datepicker.ru-RU.min.js", array(
		'jquery',
		'jquery-ui',
		'datepicker'
	), '1.0.0', true );
	// forms js
	wp_enqueue_script( 'nmc-forms', get_template_directory_uri() . '/inc/js/forms.js', array( 'jquery' ), '1.0.0', true );
	// specialist js -- enqueue in single-specialist.php
	wp_register_script( 'nmc-specialist', get_template_directory_uri() . '/inc/js/specialist.js', array(
		'jquery',
		'jquery-ui-datepicker',
		'datepicker-ru'
	), '1.0.0', true );

	// schedule scripts -- enqueue in page_templates/schedule.js
	wp_register_script( 'nmc-schedule-js', get_template_directory_uri() . '/inc/js/schedule.js', array(
		'jquery',
		'jquery-ui-datepicker',
		'datepicker-ru'
	), '1.0.0', true );
	// slim select -- enqueue in page_templates/schedule.js
	wp_register_script( 'nmc-slim-js', 'https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.js', array(
		'jquery',
		'jquery-ui-datepicker'
	), null, true );
}

// add scripts
add_action( 'wp_enqueue_scripts', 'nmc_enqueue_scripts' );
