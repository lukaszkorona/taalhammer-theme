<?php
global $theme_path;
$theme_path= get_template_directory_uri();
function load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_media_files' );
add_action('widgets_init', 'unregister_basic_widgets' );
function unregister_basic_widgets() {
    unregister_widget('WP_Widget_Custom_HTML');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Media_Image');
    unregister_widget('WP_Widget_Media_Video');
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
}
add_filter( 'get_the_archive_title', function( $title ){
    return preg_replace('~^[^:]+: ~', '', $title );
});
function addamant_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style-editor.css' );
    add_theme_support( 'responsive-embeds' );
    register_nav_menus(
        array(
            'menu-1' => __( 'Primary', 'addamant' ),
            'footer' => __( 'Footer Menu', 'addamant' ),
        )
    );
}
add_action( 'after_setup_theme', 'addamant_setup' );
function my_dump($string){
    echo "<pre>";
    var_dump($string);
    echo "</pre>";
}
/***
 * front css
 ***/
add_action( 'wp_head', 'theme_name_styles', 0 );
function theme_name_styles() {

    wp_enqueue_style( 'common_CSS', get_template_directory_uri() . '/assets/css/common.css', [], time());
    wp_enqueue_style( 'media_CSS', get_template_directory_uri() . '/assets/css/media.css', [], time());

}
/***
 * front js
 ***/
add_action( 'wp_footer', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_script('common_JS', get_template_directory_uri() . '/assets/js/common.js', ['jquery'], time());
    wp_localize_script( 'common_JS', 'ajax_url',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}
/***
 * back css/js
 ***/
add_action( 'admin_enqueue_scripts', 'enq_admin_scripts' );
function enq_admin_scripts( $hook_suffix ){
    wp_enqueue_script('admin-back_JS', get_template_directory_uri() . '/assets/js/admin-back.js');
}

/***
 *	Menu display settings:
 ***/
add_filter( 'nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2 );
function add_my_class_to_nav_menu( $classes, $item ){
    $classes_update[0] = 'navbar__item';
    if( in_array('menu-item-has-children', $classes) ){
        $classes_update[1] = 'navbar__item_parent';
    }
    return $classes_update;
}

add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    $classes = $item->classes;
    if(!isset($atts['class'])){
        $atts['class'] = '';
    }
    if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $atts['class'] .=  'active ';
    }
    $atts['class'] .= 'navbar__link title';
    return $atts;
}

add_filter( 'nav_menu_submenu_css_class', 'filter_function_name_8769', 10, 3 );
function filter_function_name_8769( $classes, $args, $depth ){
    unset($classes);
    $classes[] = 'navbar';
    $classes[] = 'navbar-sub';
    return $classes;
}

add_filter( 'nav_menu_item_id', 'filter_function_name_471', 10, 4 );
function filter_function_name_471( $menu_id, $item, $args, $depth ){
    $menu_id = '';
    return $menu_id;
}

/***
 *
 ***/
function addamant_settings_theme( $wp_customize ) {

    // Add Settings
    $wp_customize->add_setting('main_logo', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));
    // Add Section
    $wp_customize->add_section('logo', array(
        'title'             => 'Logo',
        'priority'          => 70,
    ));
    // Add Controls
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_two_control', array(
        'label'             => 'Logo',
        'section'           => 'logo',
        'settings'          => 'main_logo',
    )));


    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'section' => 'logo',
        'label' => 'Footer logo'
    )));

    $wp_customize->selective_refresh->add_partial('footer_logo', array(
        'selector' => '.footer_logo',
        'render_callback' => function() {
            $logo = get_theme_mod('footer_logo');
            $img = wp_get_attachment_image_src($logo, 'full');
            if ($img) {
                return '<img src="' . $img[0] . '" alt="footer-logo">';
            } else {
                return '';
            }
        }
    ));
}
add_action('customize_register', 'addamant_settings_theme');

function getHeaderLogoSrc()
{
    $img = get_theme_mod('main_logo');
    return $img;
}
function getFooterLogoSrc()
{
    $footer_logo = get_theme_mod('footer_logo');
    $img = wp_get_attachment_image_src($footer_logo, 'full');
    return $img;
}

function cw_post_type() {
    register_post_type( 'first_block',
        array(
            'labels' => array(
                'name' => 'First Block',
                'singular_name' => 'First Block',
                'add_new' => 'Add First Block',
                'add_new_item' => 'Add First Block',
                'edit_item' => 'Edit First Block',
                'new_item' => 'New First Block',
                'view_item' => 'View First Block',
                'search_items' => 'Search First Block',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'Not found in thrash',
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'first_block'),
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'thumbnail',
            ),
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="black" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>'),
        )
    );
    register_post_type( 'second_block',
        array(
            'labels' => array(
                'name' => 'Second Block',
                'singular_name' => 'Second Block',
                'add_new' => 'Add Second Block',
                'add_new_item' => 'Add Second Block',
                'edit_item' => 'Edit Second Block',
                'new_item' => 'New Second Block',
                'view_item' => 'View Second Block',
                'search_items' => 'Search Second Block',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'Not found in thrash',
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'second_block'),
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'thumbnail',
            ),
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="black" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>'),
        )
    );
    register_post_type( 'third_block',
        array(
            'labels' => array(
                'name' => 'Third Block',
                'singular_name' => 'Third Block',
                'add_new' => 'Add Third Block',
                'add_new_item' => 'Add Third Block',
                'edit_item' => 'Edit Third Block',
                'new_item' => 'New Third Block',
                'view_item' => 'View Third Block',
                'search_items' => 'Search Third Block',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'Not found in thrash',
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'third_block'),
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="black" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>'),
        )
    );
    register_post_type( 'fourth_block',
        array(
            'labels' => array(
                'name' => 'Fourth Block',
                'singular_name' => 'Fourth Block',
                'add_new' => 'Add Fourth Block',
                'add_new_item' => 'Add Fourth Block',
                'edit_item' => 'Edit Fourth Block',
                'new_item' => 'New Fourth Block',
                'view_item' => 'View Fourth Block',
                'search_items' => 'Search Fourth Block',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'Not found in thrash',
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'fourth_block'),
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="black" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>'),
        )
    );
    register_post_type( 'fifth_block',
        array(
            'labels' => array(
                'name' => 'Fifth Block',
                'singular_name' => 'Fifth Block',
                'add_new' => 'Add Fifth Block',
                'add_new_item' => 'Add Fifth Block',
                'edit_item' => 'Edit Fifth Block',
                'new_item' => 'New Fifth Block',
                'view_item' => 'View Fifth Block',
                'search_items' => 'Search Fifth Block',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'Not found in thrash',
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'fifth_block'),
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="black" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>'),
        )
    );
    register_post_type( 'sixth_block',
        array(
            'labels' => array(
                'name' => 'Sixth Block',
                'singular_name' => 'Sixth Block',
                'add_new' => 'Add Sixth Block',
                'add_new_item' => 'Add Sixth Block',
                'edit_item' => 'Edit Sixth Block',
                'new_item' => 'New Sixth Block',
                'view_item' => 'View Sixth Block',
                'search_items' => 'Search Sixth Block',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'Not found in thrash',
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'sixth_block'),
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="black" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>'),
        )
    );
    register_post_type( 'seventh_block',
        array(
            'labels' => array(
                'name' => 'Seventh Block',
                'singular_name' => 'Seventh Block',
                'add_new' => 'Add Seventh Block',
                'add_new_item' => 'Add Seventh Block',
                'edit_item' => 'Edit Seventh Block',
                'new_item' => 'New Seventh Block',
                'view_item' => 'View Seventh Block',
                'search_items' => 'Search Seventh Block',
                'not_found' => 'Not found',
                'not_found_in_trash' => 'Not found in thrash',
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'seventh_block'),
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            ),
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode(' <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="black" d="M96 288H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zM96 96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32zm160 0h-64c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>'),
        )
    );
}
add_action( 'init', 'cw_post_type' );



add_action('add_meta_boxes', 'blocks_metas');
function blocks_metas(){
    /*
     first_block
    second_block
    third_block
    fourth_block
    fifth_block
    sixth_block
    seventh_block
     * */
    $screens = array( 'first_block' );
    add_meta_box( 'first_block', 'Information', 'first_block_callback', $screens );

    $screens = array( 'second_block' );
    add_meta_box( 'second_block', 'Information', 'second_block_callback', $screens );

    $screens = array( 'third_block' );
    add_meta_box( 'third_block', 'Information', 'third_block_callback', $screens );

    $screens = array( 'fourth_block' );
    add_meta_box( 'fourth_block', 'Information', 'fourth_block_callback', $screens );

    $screens = array( 'fifth_block' );
    //add_meta_box( 'fifth_block', 'Information', 'fifth_block_callback', $screens );

    $screens = array( 'sixth_block' );
    add_meta_box( 'sixth_block', 'Information', 'sixth_block_callback', $screens );

    $screens = array( 'seventh_block' );
    add_meta_box( 'seventh_block', 'Information', 'seventh_block_callback', $screens );

}
function first_block_callback(){
    global $post;
    $first_row = get_post_meta($post->ID, 'first_row', true);
    $second_row = get_post_meta($post->ID, 'second_row', true);
    $sub_text = get_post_meta($post->ID, 'sub_text', true);
    $back_color = get_post_meta($post->ID, 'back_color', true);
    ?>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="first_row">First row text:<textarea id="first_row" name="first_row" cols="70" rows="4"><?=$first_row?></textarea></label>
    </div>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="second_row">Second row text:<textarea id="second_row" name="second_row" cols="70" rows="4"><?=$second_row?></textarea></label>
    </div>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="sub_text">Sub text:<textarea id="sub_text" name="sub_text" cols="70" rows="4"><?=$sub_text?></textarea></label>
    </div>
    <div style="margin-bottom: 10px; width: 200px; display: flex; justify-content: space-between;">
        <label for="back_color">Background color:<input id="back_color" name="back_color" type="color" value="<?=$back_color?>"></label>
    </div>
<?php }
function second_block_callback(){
    global $post;
    $editor_id = 'sectionTitle';
    $sectionTitle = get_post_meta( $post->ID, 'sectionTitle', true);
    echo "<h3>Section title</h3>";
    wp_editor( $sectionTitle, $editor_id );
    $editor_id = 'sectionHead';
    $sectionHead = get_post_meta( $post->ID, 'sectionHead', true);
    echo "<h3>Main text</h3>";
    wp_editor( $sectionHead, $editor_id );
    $editor_id = 'sectionText';
    $sectionText = get_post_meta( $post->ID, 'sectionText', true);
    echo "<h3>Sub text</h3>";
    wp_editor( $sectionText, $editor_id );
    ?>
<?php }
function third_block_callback(){
}
function fourth_block_callback(){
    global $post;
    $editor_id = 'sectionText1';
    $sectionText1 = get_post_meta( $post->ID, 'sectionText1', true);
    $sectionText2 = get_post_meta( $post->ID, 'sectionText2', true);
    $sectionTextTitle1 = get_post_meta($post->ID, 'sectionTextTitle1', true);
    $sectionTextTitle2 = get_post_meta($post->ID, 'sectionTextTitle2', true);

    echo "<h3>First Text Title</h3>"; ?>
    <div style="margin-bottom: 10px; width: 200px; display: flex; justify-content: space-between;">
        <input name="sectionTextTitle1" type="text" value="<?=$sectionTextTitle1?>">
    </div>
    <?php
    echo "<h3>First Text Paragraph</h3>";
    wp_editor( $sectionText1, $editor_id );
    $editor_id = 'sectionText2';
    $sectionText = get_post_meta( $post->ID, 'sectionText', true);
    echo "<h3>Second Text Title</h3>"; ?>
    <div style="margin-bottom: 10px; width: 200px; display: flex; justify-content: space-between;">
        <input name="sectionTextTitle2" type="text" value="<?=$sectionTextTitle2?>">
    </div>
    <?php
    echo "<h3>Second Text Paragraph</h3>";
    wp_editor( $sectionText2, $editor_id );
}
function sixth_block_callback(){
    global $post;
    $stat = get_post_meta($post->ID, 'stat', true);
    $stat = json_decode($stat);
    $sub_text = get_post_meta($post->ID, 'sub_text', true);
    ?>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="sub_text">SubText:<textarea id="sub_text" name="sub_text" type="text" cols="50"><?=$sub_text ? $sub_text : ''?></textarea></label>
    </div>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="stat_1">Stat 1:<input id="stat_1" name="stat[stat_1]" type="text" value="<?=isset($stat->stat_1) ? $stat->stat_1 : ''?>"></label>
        <label for="text_1">Text 1:<input id="text_1" name="stat[text_1]" type="text" value="<?=isset($stat->text_1) ? $stat->text_1 : ''?>"></label>
    </div>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="stat_1">Stat 2:<input id="stat_2" name="stat[stat_2]" type="text" value="<?=isset($stat->stat_2) ? $stat->stat_2 : ''?>"></label>
        <label for="text_1">Text 2:<input id="text_2" name="stat[text_2]" type="text" value="<?=isset($stat->text_2) ? $stat->text_2 : ''?>"></label>
    </div>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="stat_1">Stat 3:<input id="stat_3" name="stat[stat_3]" type="text" value="<?=isset($stat->stat_3) ? $stat->stat_3 : ''?>"></label>
        <label for="text_1">Text 3:<input id="text_3" name="stat[text_3]" type="text" value="<?=isset($stat->text_3) ? $stat->text_3 : ''?>"></label>
    </div>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="stat_4">Stat 4:<input id="stat_4" name="stat[stat_4]" type="text" value="<?=isset($stat->stat_4) ? $stat->stat_4 : ''?>"></label>
        <label for="text_4">Text 4:<input id="text_4" name="stat[text_4]" type="text" value="<?=isset($stat->text_4) ? $stat->text_4 : ''?>"></label>
    </div>
<?php }
function seventh_block_callback(){
    $main_text = get_post_meta($post->ID, 'main_text', true);
    ?>
    <div style="margin-bottom: 10px; width: 100px; display: flex; justify-content: space-between;">
        <label for="main_text">Text:<textarea id="adress" name="main_text" type="text" value="<?=$main_text?>" cols="50"></textarea></label>
    </div>
<?php }


add_action( 'save_post', 'update_slider_subtext' );
function update_slider_subtext( $post_id ) {
    $post = get_post($post_id);
    if($post->post_type =='first_block'){
        $_POST['first_row'] = $_POST['first_row'] ? $_POST['first_row'] : '';
        $_POST['second_row'] = $_POST['second_row'] ? $_POST['second_row'] : '';
        $_POST['sub_text'] = $_POST['sub_text'] ? $_POST['sub_text'] : '';
        $_POST['back_color'] = $_POST['back_color'] ? $_POST['back_color'] : '#000';
        update_post_meta( $post_id, 'first_row', $_POST['first_row'] );
        update_post_meta( $post_id, 'second_row', $_POST['second_row'] );
        update_post_meta( $post_id, 'sub_text', $_POST['sub_text'] );
        update_post_meta( $post_id, 'back_color', $_POST['back_color'] );
    }
    if($post->post_type =='second_block'){
        $_POST['main_text'] = $_POST['sectionTitle'] ? $_POST['sectionTitle'] : '';
        update_post_meta( $post_id, 'sectionTitle', $_POST['sectionTitle'] );
        $_POST['main_text'] = $_POST['sectionHead'] ? $_POST['sectionHead'] : '';
        update_post_meta( $post_id, 'sectionHead', $_POST['sectionHead'] );
        $_POST['main_text'] = $_POST['sectionText'] ? $_POST['sectionText'] : '';
        update_post_meta( $post_id, 'sectionText', $_POST['sectionText'] );
    }
    if($post->post_type =='fourth_block'){
        $_POST['sectionTextTitle1'] = $_POST['sectionTextTitle1'] ? $_POST['sectionTextTitle1'] : '';
        update_post_meta( $post_id, 'sectionTextTitle1', $_POST['sectionTextTitle1'] );
        $_POST['sectionTextTitle2'] = $_POST['sectionTextTitle2'] ? $_POST['sectionTextTitle2'] : '';
        update_post_meta( $post_id, 'sectionTextTitle2', $_POST['sectionTextTitle2'] );
        $_POST['sectionText1'] = $_POST['sectionText1'] ? $_POST['sectionText1'] : '';
        update_post_meta( $post_id, 'sectionText1', $_POST['sectionText1'] );
        $_POST['sectionText2'] = $_POST['sectionText2'] ? $_POST['sectionText2'] : '';
        update_post_meta( $post_id, 'sectionText2', $_POST['sectionText2'] );
    }
    if($post->post_type =='sixth_block'){
        $_POST['sub_text'] = $_POST['sub_text'] ? $_POST['sub_text'] : '';
        $_POST['stat'] = $_POST['stat'] ? $_POST['stat'] : '';
        $_POST['stat'] = json_encode($_POST['stat']);
        update_post_meta( $post_id, 'stat', $_POST['stat'] );
        update_post_meta( $post_id, 'sub_text', $_POST['sub_text'] );
    }
    if($post->post_type =='seventh_block'){
        $_POST['main_text'] = $_POST['main_text'] ? $_POST['main_text'] : '';
        update_post_meta( $post_id, 'main_text', $_POST['main_text'] );
    }
}

function get_block($block){
    $args = array(
        'post_type'      => $block,
        'posts_per_page' => 1,
        'cache_results'  => true,
    );
    $query = new WP_Query( $args );
    if(isset($query->posts[0])){
        return $query->posts[0];
    } else {
        return false;
    }
}
?>