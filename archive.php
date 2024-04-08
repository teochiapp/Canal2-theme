<?php

use ElementorPro\Modules\DynamicTags\Tags\Site_URL;

get_header(); ?>

<?php

$categoria = get_the_category();
$titulo = '';

if ($categoria && !empty($categoria[0])) {
    $category = $categoria[0];
    $titulo = $category->name;
}

?>
<!-- End container -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="single-post">
                <div class="blog-post-item cat-1 box">
                    <div class="title-v1 box titulo-categoria">
                        <h3 style="font-size: 27px;"><?php echo $titulo; ?></h3>
                    </div>
                    <!-- End title -->
                    <div class="technnology box space-30">
                        <?php
                        $category = get_queried_object();
                        $category_base_url = get_category_link($category);

                        if ($category) {
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $current_page = get_query_var('paged');
                            $args_posts_categoria = array(
                                'post_type' => 'post',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => $category->slug,
                                    )
                                ),
                                'post_status'    => 'publish',
                                'posts_per_page' => 6,
                                'paged'    => get_query_var('paged') ? get_query_var('paged') : 1,
                                'page'     => $paged
                            );
                            $posts_categoria = new WP_Query($args_posts_categoria);

                            while ($posts_categoria->have_posts()) {
                                $posts_categoria->the_post();
                                $titulo = get_the_title();
                                $extracto = get_the_excerpt();
                                $imagen = get_the_post_thumbnail_url();
                                $fecha = get_the_date();
                                $cantidad_comentarios = get_comments_number();
                        ?>

                                <div class="post-item ver2">
                                    <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                                    <div class="text">
                                        <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo; ?></a></h2>
                                        <div class="tag">
                                            <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                            <a class="comments" href="#"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                                        </div>
                                        <p class="description"><?php if ($extracto) {
                                                                    $extractoCortado = wp_trim_words($extracto, 20); //  Número de palabras que deseas mostrar en el extracto
                                                                    echo $extractoCortado;
                                                                } ?></p>
                                        <a class="read-more" href="<?php the_permalink(); ?>">Leer más</a>
                                    </div>
                                </div>


                        <?php
                            }
                            wp_reset_postdata();
                        }

                        ?>
                    </div>

                    <div class="banner box float-left space-padding-tb-30">
                        <?php
                        $args = array(
                            'post_type'        => 'publicidad',
                            'post_status' => 'publish',
                            'meta_key'         => 'ubicacion',
                            'meta_value'       => 'Listado de Noticias',
                            'posts_per_page'   => 2,
                            'orderby'          => 'rand',
                        );
                        $banner_header = new WP_Query($args);
                        while ($banner_header->have_posts()) {
                            $banner_header->the_post();
                            $imagen_escritorio = get_field("imagen_escritorio");
                            $imagen_mobile = get_field("imagen_mobile");
                            $enlace = get_field("enlace");
                            $fecha_inicio = get_field("desde");
                            $fecha_fin = get_field("hasta");
                            date_default_timezone_set('America/Argentina/Cordoba');
                            $fecha_actual = date('Y-m-d H:i:s');
                            if ($fecha_actual >= $fecha_inicio && $fecha_actual <= $fecha_fin) {
                            ?>
                                <div class="col-md-6 col-sm-6 align-left">
                                    <a href="<?php echo $enlace; ?>" target="_blank">
                                        <img class="banner-archive publicidad-escritorio" src="<?php echo $imagen_escritorio; ?>" alt="images">
                                        <img class="banner-archive publicidad-mobile" src="<?php echo $imagen_mobile; ?>" alt="images">
                                    </a>
                                </div>
                            <?php
                            }
                        }
                        wp_reset_postdata() ?>
                        <div class="box center float-left">
                            <nav class="pagination">
                                <?php
                                // Obtener la cantidad total de páginas
                                $total_pages = $posts_categoria->max_num_pages;

                                // Verificar si hay más de una página
                                if (empty($current_page)) {
                                    $current_page = 1;
                                }
                                echo paginate_links(array(
                                    'current' => $current_page,
                                    'total' => $total_pages,
                                    'prev_next' => false,
                                    'prev_text' => '<i class="fa fa-long-arrow-left"></i>Anterior',
                                    'next_text' => 'Siguiente<i class="fa fa-long-arrow-right"></i>',
                                ));

                                ?>
                            </nav>
                            <!-- End pagination -->
                        </div>

                        <!-- breadcrumb-area-end -->
                    </div>
                    <!-- End banner -->
                </div>
                <!-- End bogpost -->
            </div>

        </div>
        <div class="col-md-4">
            <aside class="widget social">
                <?php get_template_part('template-parts/widgets/redes-sociales', null, array()) ?>
            </aside>

            <aside class="widget tab-widget">
                <?php get_template_part('template-parts/widgets/destacadas', null, array()) ?>
            </aside>

            <aside class="widget tab-widget">
                <?php get_template_part('template-parts/widgets/mas-populares', null, array()) ?>
            </aside>
        </div>
    </div>
</div>
<!-- End container -->
<div id="back-to-top">
    <i class="fa fa-long-arrow-up"></i>
</div>
<div class="container center">
    <div class="banner space-padding-tb-60">
    <?php
    $args = array(
        'post_type'        => 'publicidad',
        'post_status' => 'publish',
        'meta_key'         => 'ubicacion',
        'meta_value'       => 'Pie de página',
        'posts_per_page'   => -1,
    );
    $banner_header = new WP_Query($args);
    $random_index = rand(0, $banner_header->post_count - 1);
    $banner_id = $banner_header->posts[$random_index]->ID; // Obtener el ID de la publicidad aleatoria

    $args_single = array(
        'post_type' => 'publicidad',
        'p' => $banner_id, // Usar el ID de la publicidad aleatoria
                'meta_key'         => 'ubicacion',
        'meta_value'       => 'Pie de página',
    );

    $footer_banner = new WP_Query($args_single);
    while ($footer_banner->have_posts()) {
        $footer_banner->the_post();
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
                    <img class="img-responsive publicidad-escritorio" src="<?php echo $imagen_escritorio; ?>" alt="banner" style="object-fit: contain; width: 100%;">
                    <img class="img-responsive publicidad-mobile" src="<?php echo $imagen_mobile; ?>" alt="banner" style="object-fit: contain; width: 100%;">
                </a>
        <?php
            }
        }
        wp_reset_postdata() ?>
    </div>
</div>

<?php get_footer(); ?>