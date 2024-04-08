<?php
function register_navwalker()
{
    require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute($atts, $item, $args)
{
    if (is_a($args->walker, 'WP_Bootstrap_Navwalker')) {
        if (array_key_exists('data-toggle', $atts)) {
            unset($atts['data-toggle']);
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function canal_dos_coolviros_setup()
{
    add_theme_support('post-thumbnails');

    // Logotipo personalizado
    $logo_defaults = [
        'header-text' => ['site-title', 'site-description'],
    ];
    add_theme_support('custom-logo', $logo_defaults);

    //TITULOS
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'canal_dos_coolviros_setup');

function canal_dos_coolviros_menus()
{
    register_nav_menus([
        'menu-principal' => __('Menu Principal', 'canal_dos_coolviros_menus'),
    ]);
}

add_action('init', 'canal_dos_coolviros_menus');



function mostrar_barra_admin_en_frontend()
{
    if (current_user_can('administrator')) {
        add_filter('show_admin_bar', '__return_true', 999);
    }
}
add_action('init', 'mostrar_barra_admin_en_frontend');

function custom_track_post_views()
{
    if (is_single()) {
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'custom_post_views', true);
        $views = ($views) ? $views + 1 : 1;
        update_post_meta($post_id, 'custom_post_views', $views);
    }
}
add_action('wp', 'custom_track_post_views');

add_filter('wp_title', 'search_form_title');

function search_form_title($title)
{
    global $searchandfilter;

    if ($searchandfilter->active_sfid() == 354) {
        return 'Search Results';
    } else {
        return $title;
    }
}

function get_youtube_video_id($url)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    return isset($params['v']) ? $params['v'] : false;
}

// Añade columnas personalizadas al Listado de tu post type Publicidad
add_filter('manage_publicidad_posts_columns', 'personalizar_columnas_publicidad');
function personalizar_columnas_publicidad($columns)
{
    $columns = array(
        'cb' => $columns['cb'],
        'title' => __('Title'),
        'ubicacion' => __('Ubicacion'),
        'desde' => __('Desde', 'smashing'),
        'hasta' => __('Hasta', 'smashing'),
    );
    return $columns;
}

add_action('manage_publicidad_posts_custom_column', 'personalizar_contenidos_publicidad', 10, 2);
function personalizar_contenidos_publicidad($column, $post_id)
{
    switch ($column) {
        case 'ubicacion':
            $ubicacion = get_field('ubicacion', $post_id);
            echo esc_html($ubicacion);
            break;
        case 'desde':
            $desde = get_field('desde', $post_id);
            echo esc_html($desde);
            break;
        case 'hasta':
            $hasta = get_field('hasta', $post_id);
            echo esc_html($hasta);
            break;
    }
}


// Añade columnas personalizadas al Listado de tu post type de Post
add_filter('manage_post_posts_columns', 'personalizar_columnas_post');
function personalizar_columnas_post($columns)
{
    unset($columns['author']);  // Elimina la columna de autor
    unset($columns['tags']); 
    // Añadir tus columnas personalizadas
    $new_columns = array(
        'destacar' => __('Galería Principal'),
        'notas_destacadas' => __('Destacada'),
    ); 
    

    // Mantener las columnas predeterminadas y agregar las personalizadas al final
    $columns = array_slice($columns, 0, 6) + $new_columns + array_slice($columns, 2);

    return $columns;
}
add_action('manage_post_posts_custom_column', 'personalizar_contenidos_post', 10, 2);
function personalizar_contenidos_post($column, $post_id)
{
    switch ($column) {
        case 'destacar':
            $destacar = get_field('destacar', $post_id);
            if(isset($destacar)) {echo esc_html("Está en Galería");}
            else {echo esc_html("—");}
            break;
        case 'notas_destacadas':
            $notas_destacadas = get_field('notas_destacadas', $post_id);
            if($notas_destacadas) {echo esc_html("Está destacada");}
            else {echo esc_html("—");}
            break;
    }
}

// Cambiar la zona horaria a UTC-3 antes de la importación
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Realizar la importación de Feedzy
// ... Tu código de importación Feedzy aquí ...

// Restaurar la zona horaria predeterminada después de la importación
date_default_timezone_set(get_option('timezone_string')); // Restaurar a la configuración de WordPress

//Agregar metadatos de Open Graph para Facebook y Twitter
add_action('wp_head', 'opengraph_fb_tw', 5);
function opengraph_fb_tw() {
global $post;
  if( is_single() || is_page() ) {
    $post_id = get_queried_object_id();
    $url = get_permalink($post_id);
    $title = get_the_title($post_id);
    $site_name = get_bloginfo('name');	
    $description = wp_trim_words( get_post_field('post_content', $post_id), 25, '...' );
    echo '<meta property="og:type" content="article" />';
    echo '<meta property="og:title" content="' . esc_attr($title) . '" />';
    echo '<meta property="og:description" content="' . esc_attr($description) . '" />';
    echo '<meta property="og:url" content="' . esc_url($url) . '" />';
    echo '<meta property="og:site_name" content="NorfiPC" />';
	    if(!has_post_thumbnail( $post->ID )) { 
        $default_image="https://norfipc.com/blog/wp-content/uploads/2018/09/cropped-notas.jpg";
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
	echo '<meta property="fb:app_id" content="XXXXXXX" />';
	echo '<meta property="article:author" content="XXXXXXXXX" />';
    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image" />';
    echo '<meta name="twitter:site" content="@NorfiPC" />';
    echo '<meta name="twitter:creator" content="@NorfiPC" />';
  }
}

function canal_dos_coolviros_scripts_styles()
{
    // ARCHIVOS CSS
    wp_enqueue_style('style', get_stylesheet_directory_uri() . "/theme/assets/css/style.css");
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . "/theme/assets/css/bootstrap.min.css");
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . "/theme/assets/vendor/animate.min.css");
    wp_enqueue_style('owl-slider', get_stylesheet_directory_uri() . "/theme/assets/vendor/owl-slider.min.css");
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . "/theme/assets/css/slick.min.css");
    wp_enqueue_style('settings', get_stylesheet_directory_uri() . "/theme/assets/vendor/settings.min.css");
    wp_enqueue_style('custombox', get_stylesheet_directory_uri() . "/theme/assets/vendor/custombox.min.css");
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v6.1.1/css/all.css' );
    wp_enqueue_style('lightbox-css', '//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css');


    //ARCHIVOS JS
    wp_enqueue_script('main', get_template_directory_uri() . "/theme/assets/js/main.js", [], "", true);
    wp_enqueue_script('jquery', get_template_directory_uri() . "/theme/assets/js/jquery-3.1.1.min.js", [], "", true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . "/theme/assets/js/bootstrap.min.js", [], "", true);
    wp_enqueue_script('store', get_template_directory_uri() . "/theme/assets/js/store.js", [], "", true);
    wp_enqueue_script('jquery-plugins', get_template_directory_uri() . "/theme/assets/js/jquery.themepunch.plugins.min.js", [], "", true);
    wp_enqueue_script('jquery-revolution', get_template_directory_uri() . "/theme/assets/js/jquery.themepunch.revolution.min.js", [], "", true);
    wp_enqueue_script('engo-plugins', get_template_directory_uri() . "/theme/assets/js/engo-plugins.min.js", [], "", true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . "/theme/assets/js/owl.carousel.min.js", array('jquery'), '', true);
    wp_enqueue_script('slick', get_template_directory_uri() . "/theme/assets/js/slick.min.js", [], "", true);
    wp_enqueue_script('wow', get_template_directory_uri() . "/theme/assets/js/wow.min.js", [], "", true);
    wp_enqueue_script('custombox', get_template_directory_uri() . "/theme/assets/js/custombox.min.js", [], "", true);
    wp_enqueue_script('legacy', get_template_directory_uri() . "/theme/assets/js/legacy.min.js", [], "", true);
    wp_enqueue_script('instafeed', get_template_directory_uri() . "/theme/assets/js/instafeed.min.js", [], "", true);
    wp_enqueue_script('bxslider', get_template_directory_uri() . "/theme/assets/js/jquery.bxslider.min.js", [], "", true);
    wp_enqueue_script('mousewheel', get_template_directory_uri() . "/theme/assets/js/jquery.mousewheel.min.js", [], "", true);
    wp_enqueue_script('legacy', get_template_directory_uri() . "/theme/assets/js/legacy.min.js", [], "", true);
    wp_enqueue_script('lightbox-js', '//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js', array('jquery'));
    wp_enqueue_script('lightbox-init', get_stylesheet_directory_uri() . '/theme/assets/js/lightbox-init.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'canal_dos_coolviros_scripts_styles');
