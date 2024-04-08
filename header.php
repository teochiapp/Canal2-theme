<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= wp_head(); ?>

</head>

<body>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Buscar Aquí</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input type="text" class="form-control control-search" placeholder="Type & hit enter...">
                        <span class="input-group-btn">
                            <button class="btn btn-default button_search" type="button"><i data-toggle="dropdown" class="icons icon-magnifier dropdown-toggle"></i></button>
                        </span>
                    </div><!-- /input-group -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- End pushmenu -->
    <div id="box-user" style="display:none;">
        <iframe width="980" src="#"></iframe>
    </div>
    <div class="wrappage">
        <header id="header" class="header-v3 header-v4">
            <div class="search" method="post" role="search">
                <?php get_search_form(); ?>
            </div>
            <div id="topbar">
                <div class="container">
                    <div class="row row-topbar">
                        <div class="col-md-8 col-sm-12">
                            <div class="content">
                                <?php
                                $args = array(
                                    'post_type'      => 'post',
                                    'posts_per_page' => 1,
                                    'orderby'        => 'date',         // Ordenar por fecha
                                    'order'          => 'DESC',         // Orden descendente
                                );

                                $custom_query = new WP_Query($args);

                                if ($custom_query->have_posts()) :
                                    while ($custom_query->have_posts()) : $custom_query->the_post();
                                        $titulo = get_the_title();
                                        $titulo_cortado = wp_trim_words($titulo, 10); // Limitar a 10 palabras
                                ?>
                                        <a href="<?php the_permalink(); ?>" style="">
                                            <h3 class="">Tendencia ahora:<span><?= $titulo_cortado; ?></span></h3>
                                        </a>
                                <?php
                                    endwhile;

                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="social">
                                <a href="https://www.instagram.com/canal2coviteve" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.facebook.com/coviteve.coovilros/?locale=es_LA" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                <a href="https://www.youtube.com/channel/UCkq4DJeGgeHIdYk4husxNtg" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                <a href="https://twitter.com/coviteve" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                <a href="https://www.twitch.tv/covitevecoovilros" target="_blank" target="_blank"><i class="fa-brands fa-twitch"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End container -->
            </div>
            <div class="header-top">
                <div class="container">
                    <div class="box float-left">
                        <p class="icon-menu-mobile"><i class="fa fa-bars"></i></p>
                        <div class="logo"><a href="<?php echo site_url('/') ?>">
                                <img class="logo" src="<?= wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] ?>" alt="logo">
                            </a></div>
                        <div class="logo-mobile"><a href="<?php echo site_url('/') ?>">
                                <img src="<?= wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] ?>" alt="logo">
                            </a>
                        </div>
                        <div class="banner">
                            <?php
                            $args = array(
                                'post_type'        => 'publicidad',
                                'post_status'      => 'publish',
                                'meta_key'         => 'ubicacion',
                                'meta_value'       => 'Encabezado Principal',
                                'posts_per_page'   => -1,
                                'orderby'          => 'rand',
                            );

                            $banner_header = new WP_Query($args);
                            if ($banner_header->have_posts()) {
                                $random_index = rand(0, $banner_header->post_count - 1);
                                $banner_id = $banner_header->posts[$random_index]->ID; // Obtener el ID de la publicidad aleatoria

                                $args_single = array(
                                    'post_type' => 'publicidad',
                                    'p' => $banner_id, // Usar el ID de la publicidad aleatoria
                                );

                                $single_banner = new WP_Query($args_single);

                                if ($single_banner->have_posts()) {
                                    $single_banner->the_post();

                                    $imagen_escritorio = get_field("imagen_escritorio");
                                    $enlace = get_field("enlace");
                                    $fecha_inicio = get_field("desde");
                                    $fecha_fin = get_field("hasta");
                                    date_default_timezone_set('America/Argentina/Cordoba');
                                    $fecha_actual = date('Y-m-d H:i:s');
                                    if ($fecha_actual >= $fecha_inicio && $fecha_actual <= $fecha_fin) {
                            ?>
                                        <a href="<?php echo $enlace; ?>" target="_blank">
                                            <img class="img-responsive" src="<?php echo $imagen_escritorio; ?>" style="max-width:720px; max-height:90px; object-fit:contain;" alt="banner">
                                        </a>
                            <?php
                                    }
                                }
                                wp_reset_postdata();
                            } ?>
                            <!-- breadcrumb-area-end -->
                        </div>
                        <div class="box-right social-mobile">
                            <div class="social">
                                <a href="https://www.instagram.com/canal2coviteve" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.facebook.com/coviteve.coovilros/?locale=es_LA" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                <a href="https://www.youtube.com/channel/UCkq4DJeGgeHIdYk4husxNtg" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                <a href="https://twitter.com/coviteve" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                <a href="https://www.twitch.tv/covitevecoovilros" target="_blank" target="_blank"><i class="fa-brands fa-twitch"></i></a>
                            </div>
                            <div class="search dropdown" data-toggle="modal" data-target=".bs-example-modal-lg" style="display:none;">
                                <i class="icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="box-mobile">
                        <div class="col-xs-2">
                            <p class="icon-menu-mobile"><i class="fa fa-bars"></i></p>
                        </div>
                        <div class="col-xs-6 col-logo">
                            <div class="logo-mobile"><a href="<?php echo site_url('/') ?>">
                                    <img src="<?= wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] ?>" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-4 social">
                            <a href="https://www.instagram.com/canal2coviteve" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.facebook.com/coviteve.coovilros/?locale=es_LA" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.youtube.com/channel/UCkq4DJeGgeHIdYk4husxNtg" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End container -->
            </div>
            <!-- End header-top -->
            <nav class="mega-menu">
                <div class="container">
                    <?php
                    $args = [
                        'theme_location'  => 'menu-principal',
                        'depth'           => 2,
                        'menu_class'      => 'nav navbar-nav',
                        'sub-menu'        => "mega-menu",
                        'container'       => '',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ];
                    wp_nav_menu($args);
                    ?>
                </div>
            </nav>
    </div>
    </div>
    <!-- End container -->
    </header>
    <!-- /header -->