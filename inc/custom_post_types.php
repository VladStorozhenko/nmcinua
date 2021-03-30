<?php 

/**
 * ===
 * Custom post types file 
 * ===
 * 
 * @package nmc
 * 
 * @author Vladislav Storozhenko
 */

?>


<?php 


// ! Service post type

function add_service_post_type() {
    register_post_type( 'service', [
		'label'  => 'Услуги',
		'labels' => [
			'name'               => 'Услуги', // основное название для типа записи
			'singular_name'      => 'Услуги', // название для одной записи этого типа
			'add_new'            => 'Добавить услугу', // для добавления новой записи
			'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
			'new_item'           => 'Новая услуга', // текст новой записи
			'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
			'search_items'       => 'Искать услугу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Услуги', // название меню
		],
		'description'         => 'Услуги',
		'public'              => true,
        'menu_icon'           => 'dashicons-email-alt',
        'show_in_rest' => true,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks',
        'has_archive'         => false,
        'rewrite' => array('slug' => 'услуги','with_front' => false),
	] );
}   

add_action('init', 'add_service_post_type');

// ! ADD SPECIALIST POST Type

function add_specialist_post_type() {
    register_post_type( 'specialist', [
		'label'  => 'Специалисты',
		'labels' => [
			'name'               => 'Специалисты', // основное название для типа записи
			'singular_name'      => 'Специалист', // название для одной записи этого типа
			'add_new'            => 'Добавить специалиста', // для добавления новой записи
			'add_new_item'       => 'Добавление специалиста', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование специалиста', // для редактирования типа записи
			'new_item'           => 'Новый специалист', // текст новой записи
			'view_item'          => 'Смотреть специалиста', // для просмотра записи этого типа.
			'search_items'       => 'Искать специалиста', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Специалисты', // название меню
		],
		'description'         => 'Специалисты',
		'public'              => true,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_rest' => true,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks',
        'has_archive'         => false,
        'rewrite' => array('slug' => 'специалисты','with_front' => false),
	] );
}   

add_action('init', 'add_specialist_post_type');

//Add the meta box callback function
function admin_init(){
    add_meta_box("services_meta", "ID родительской страницы (по умолчанию 9)", "set_services_meta", "service", "normal", "low");
    add_meta_box("specialist_meta", "ID родительской страницы (по умолчанию 11)", "set_specialist_meta", "specialist", "normal", "low");
    }
    add_action("admin_init", "admin_init");
    
    //Meta box for setting the parent ID
    function set_services_meta() {
    global $post;
    $custom = get_post_custom($post->ID);
    $parent_id = $custom['parent_id'][0];
    ?>
    <p>ID родительской страницы, если не хотите менять, оставьте 9</p>
    <input type="text" id="parent_id" name="parent_id" value="9" />
    <?php
    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="parent_id_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
    }
    
    // Save the meta data
    function update_service_meta($post_id) {
    global $post;
    
    // make sure data came from our meta box
    if (!wp_verify_nonce($_POST['parent_id_noncename'],__FILE__)) return $post_id;
    if(isset($_POST['parent_id']) && ($_POST['post_type'] == "service")) {
    $data = $_POST['parent_id'];
    update_post_meta($post_id, 'parent_id', $data);
    update_post_meta($post_id, '_wp_page_template', 'single-service.php');
    }
    }
    add_action("save_post", "update_service_meta");
    add_action('draft_to_publish', 'update_service_meta');

    function set_specialist_meta() {
        global $post;
        $custom = get_post_custom($post->ID);
        $parent_id = $custom['parent_id'][0];
        ?>
        <p>ID родительской страницы, если не хотите менять, оставьте 11</p>
        <input type="text" id="parent_id" name="parent_id" value="11" />
        <?php
        // create a custom nonce for submit verification later
        echo '<input type="hidden" name="specialist_id_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
        }
        
        // Save the meta data
        function update_specialist_meta($post_id) {
        global $post;
        
        // make sure data came from our meta box
        if (!wp_verify_nonce($_POST['specialist_id_noncename'],__FILE__)) return $post_id;
        if(isset($_POST['parent_id']) && ($_POST['post_type'] == "specialist")) {
        $data = $_POST['parent_id'];
        update_post_meta($post_id, 'parent_id', $data);
        update_post_meta($post_id, '_wp_page_template', 'single_specialist.php');
        }
        }
        add_action("save_post", "update_specialist_meta");
        add_action('draft_to_publish', 'update_specialist_meta');



    // standart form post type
    function add_standart_form_post_type() {
        register_post_type( 'standart-form', [
            'label'  => 'Специалисты',
            'labels' => [
                'name'               => 'Записи на консультацию', // основное название для типа записи
                'singular_name'      => 'Запись на консультацию', // название для одной записи этого типа
                'add_new'            => 'Добавить запись на консультацию', // для добавления новой записи
                'add_new_item'       => 'Добавление записи на консультацию', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редактирование записи на консультацию', // для редактирования типа записи
                'new_item'           => 'Новая запись на консультацию', // текст новой записи
                'view_item'          => 'Смотреть запись на консультацию', // для просмотра записи этого типа.
                'search_items'       => 'Искать запись на консультацию', // для поиска по этим типам записи
                'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Записи на консультацию', // название меню
            ],
            'description'         => 'Записи на консультацию',
            'public'              => true,
            'menu_icon'           => 'dashicons-email-alt2',
            'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks',
        ] );
    }
    
    add_action('init', 'add_standart_form_post_type');

    // change standart form columns

    function nmc_set_standartform_columns($columns) {
        $newColumns = array();
        $newColumns['title'] = 'Имя';
        $newColumns['message']  = 'Номер телефона';
        $newColumns['date'] = 'Дата';
        return $newColumns;
    }

    add_filter('manage_standart-form_posts_columns', 'nmc_set_standartform_columns');

    function nmc_standartform_custom_column($column, $post_id) {
        switch ($column) {
            case 'title':
                echo get_the_title();
            break;
            case 'message': 
                echo get_the_content();
            break;
        }
    }

    add_action('manage_standart-form_posts_custom_column', 'nmc_standartform_custom_column', 10, 2);

    // specialist form post type
    function add_specialist_form_post_type() {
        register_post_type( 'specialist-form', [
            'label'  => 'Специалисты',
            'labels' => [
                'name'               => 'Записи к специалистам', // основное название для типа записи
                'singular_name'      => 'Запись к специалисту', // название для одной записи этого типа
                'add_new'            => 'Добавить запись к специалисту', // для добавления новой записи
                'add_new_item'       => 'Добавление записи к специалисту', // заголовка у вновь создаваемой записи в админ-панели.
                'edit_item'          => 'Редактирование записи к специалисту', // для редактирования типа записи
                'new_item'           => 'Новая запись к специалисту', // текст новой записи
                'view_item'          => 'Смотреть запись к специалисту', // для просмотра записи этого типа.
                'search_items'       => 'Искать запись к специалисту', // для поиска по этим типам записи
                'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
                'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
                'parent_item_colon'  => '', // для родителей (у древовидных типов)
                'menu_name'          => 'Записи к специалистам', // название меню
            ],
            'description'         => 'Записи к специалистам',
            'public'              => true,
            'menu_icon'           => 'dashicons-email-alt2',
            'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks',
        ] );
    }

    add_action("init", 'add_specialist_form_post_type');
    // add date metabox 
    function nmc_specialist_form_add_date_metabox() {
        add_meta_box('specialist-form-date', 'На когда запись', 'nmc_specialist_form_date_callback', 'specialist-form', 'side', 'high');
    }
    add_action("add_meta_boxes", 'nmc_specialist_form_add_date_metabox');

    function nmc_specialist_form_date_callback($post) {
        wp_nonce_field("ncm_save_specialist_form_date_data", 'nmc_specialist_form_date_meta_box_nonce');

        $value = get_post_meta($post->ID, '_specialist_form_date_value_key', true);

        echo '<input type="text" name="nmc_specialist_form_date_field" id="nmc_specialist_form_date_field" value="'. $value .'"  />';
    }

    function ncm_save_specialist_form_date_data($post_id) {
        if(!isset($_POST['nmc_specialist_form_date_meta_box_nonce'])) {
            return;
        }
        if(!wp_verify_nonce($_POST['nmc_specialist_form_date_meta_box_nonce'], 'ncm_save_specialist_form_date_data')) {
            return;
        }
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if(!current_user_can('edit_post', $post_id)) {
            return;
        }
        if(!isset ($_POST['nmc_specialist_form_date_field'])) {
            return;
        }

        $my_data = $_POST['nmc_specialist_form_date_field'];

        update_post_meta($post_id, '_specialist_form_date_value_key', $my_data);
    }
    // add specialist metabox
    function nmc_specialist_form_add_specialist_metabox() {
        add_meta_box('specialist-form-specialist', 'К кому запись', 'nmc_specialist_form_specialist_callback', 'specialist-form', 'side', 'high');
    }
    add_action("add_meta_boxes", 'nmc_specialist_form_add_specialist_metabox');

    function nmc_specialist_form_specialist_callback($post) {
        wp_nonce_field("ncm_save_specialist_form_specialist_data", 'nmc_specialist_form_specialist_meta_box_nonce');

        $value = get_post_meta($post->ID, '_specialist_form_specialist_value_key', true);

        echo '<input type="text" name="nmc_specialist_form_specialist_field" id="nmc_specialist_form_specialist_field" value="'. $value .'"  />';
    }

    function ncm_save_specialist_form_specialist_data($post_id) {
        if(!isset($_POST['nmc_specialist_form_specialist_meta_box_nonce'])) {
            return;
        }
        if(!wp_verify_nonce($_POST['nmc_specialist_form_specialist_meta_box_nonce'], 'ncm_save_specialist_form_specialist_data')) {
            return;
        }
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if(!current_user_can('edit_post', $post_id)) {
            return;
        }
        if(!isset ($_POST['nmc_specialist_form_specialist_field'])) {
            return;
        }

        $my_data = $_POST['nmc_specialist_form_specialist_field'];

        update_post_meta($post_id, '_specialist_form_specialist_value_key', $my_data);
    }

    // specialist post type columns 
    function nmc_set_specialistform_columns($columns) {
        $newColumns = array();
        $newColumns['title'] = 'Имя';
        $newColumns['message']  = 'Номер телефона';
        $newColumns['to']   = 'К кому запись';
        $newColumns['appointment_date'] = 'На когда запись';
        $newColumns['date'] = 'Запись сделана в';
        return $newColumns;
    }

    add_filter('manage_specialist-form_posts_columns', 'nmc_set_specialistform_columns');

    function nmc_specialistform_custom_column($column, $post_id) {
        switch ($column) {
            case 'title':
                echo get_the_title();
            break;
            case 'message': 
                echo get_the_content();
            break;
            case 'to': 
                $meta = get_post_meta( $post_id, '_specialist_form_specialist_value_key', TRUE );
                echo $meta;
            break;
            case 'appointment_date': 
                $meta = get_post_meta( $post_id, '_specialist_form_date_value_key', TRUE );
                echo $meta;
            break;
        }
    }

    add_action('manage_specialist-form_posts_custom_column', 'nmc_specialistform_custom_column', 10, 2);
?>
