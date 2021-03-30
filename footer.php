<?php 

/**
 * ===
 * Footer file 
 * ===
 * 
 * @package nmc
 * 
 * @author Vladislav Storozhenko
 */

?>

<?php wp_footer(); ?>

<!-- Menu -->
<div class="container-fluid footer-wrapper">
    <div class="container footer">
        <a class="navbar-brand" href='<?php echo home_url(); ?>'>
                    <img src="<?php echo get_template_directory_uri() . '/inc/images/logo.png' ?>" alt="logo">
        </a>
        <div class="container container-sm footer-menu">
            <p>Меню</p>
            <nav class="navbar navbar-light px-0">
                <div class="navbar-collapse justify-content-center navbarNav">
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
        <div class="container container-sm footer-documentation">
            <p>Информация</p>
            <nav class='navbar navbar-light px-0 navbarNav'>
                <ul class="navbar-nav justify-content-between">
                    <li class="menu-item menu-item-type-post_type nav-item nav-link"><a href="#">Лицензия АГ № 598550 </a></li>
                    <li class="menu-item menu-item-type-post_type nav-item nav-link"><a href="#">Правила поведения в клинике</a></li>
                    <li class="menu-item menu-item-type-post_type nav-item nav-link"><a href="#">Документы</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- End Menu -->

</div> <!-- .container-fluid -->
</body>
</html>