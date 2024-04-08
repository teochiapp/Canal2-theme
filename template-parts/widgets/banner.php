    <?php
    $args = array(
        'post_type'        => 'publicidad',
        'post_status' => 'publish',
        'meta_key'         => 'ubicacion',
        'meta_value'       => 'Noticia',
        'posts_per_page'   => -1,
    );
    $banner_header = new WP_Query($args);
    $random_index = rand(0, $banner_header->post_count - 1);
    $banner_id = $banner_header->posts[$random_index]->ID; // Obtener el ID de la publicidad aleatoria

    $args_single = array(
        'post_type' => 'publicidad',
        'p' => $banner_id, // Usar el ID de la publicidad aleatoria
    );

    $single_banner = new WP_Query($args_single);
    while ($single_banner->have_posts()) {
        $single_banner->the_post();
        $imagen_escritorio = get_field("imagen_escritorio");
        $imagen_mobile = get_field("imagen_mobile");
        $enlace = get_field("enlace");
        $fecha_inicio = get_field("desde");
        $fecha_fin = get_field("hasta");
        date_default_timezone_set('America/Argentina/Cordoba');
        $fecha_actual = date('Y-m-d H:i:s');
        if ($fecha_actual >= $fecha_inicio && $fecha_actual <= $fecha_fin) {
        ?>
            <a href="<?php echo $enlace; ?>" target="_blank">
                <img class="img-responsive publicidad-escritorio" src="<?php echo $imagen_escritorio; ?>" style="object-fit:contain; width:100%;" alt="banner">
                <img class="img-responsive publicidad-mobile" src="<?php echo $imagen_mobile; ?>" style="object-fit:contain; width:100%;" alt="banner">
            </a>
        <?php
        }
    }
    wp_reset_postdata() ?>
    <!-- breadcrumb-area-end -->