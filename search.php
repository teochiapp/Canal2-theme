<?php get_header(); ?>

<div class="container">
    <ul class="breadcrumb-single" style="margin-top: 20px;">
        <li><a href="<?php echo site_url(); ?>">Inicio</a></li>
        <li>Búsqueda: <?php printf(esc_html("%s"), get_search_query()); ?></li>
    </ul>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="single-post">
                <div class="blog-post-item cat-1 box">
                    <div class="title-v1 box">
                        <h3>Resultados de búsqueda para : <?php printf(esc_html("%s"), get_search_query()); ?></h3>
                    </div>
                    <div class="technnology box space-30">
                        <?php if (have_posts()) : ?>
                            <ul>
                                <?php while (have_posts()) : the_post();
                                    $titulo = get_the_title();
                                    $imagen = get_the_post_thumbnail_url();
                                    $fecha = get_the_date();
                                    $extracto = get_the_excerpt();
                                    $categoria = get_the_category();
                                    $nombres_ = '';
                                    $category = $categoria[0];
                                    $category_link = get_category_link($category->cat_ID);
                                    $cantidad_comentarios = get_comments_number();
                                ?>

                                    <div class="post-item cat-1 ver2">
                                        <a class="images" href="<?php the_permalink(); ?>" title="images"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                                        <div class="text">
                                            <h2><a href="<?php the_permalink(); ?>" title="title"><?php echo $titulo; ?></a></h2>
                                            <div class="tag">
                                                <a class="lable" href="<?php echo esc_url($category_link) ?>">
                                                    <?php if ($categoria) {
                                                        foreach ($categoria as $category) {
                                                            $nombres_ .= $category->name . ', ';
                                                        }
                                                        $nombres_ = rtrim($nombres_, ', '); // Eliminar la última coma y espacio en blanco
                                                    }
                                                    echo $nombres_;
                                                    ?>
                                                </a>
                                                <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha ?></p>
                                                <a class="comments" href="" title="comments"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                                            </div>
                                            <p><?php echo $extracto; ?></p>
                                            <a class="read-more" href="<?php the_permalink(); ?>" title="readMore">Leer más</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </ul>
                        <?php else : ?>
                            <p>No se encontraron resultados de búsqueda de: <?php printf(esc_html("%s"), get_search_query()); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="banner box float-left space-padding-tb-30 space-30">
                        <?php
                        $args = array(
                            'post_type' => 'banners',
                            'post_status' => 'publish',
                            'meta_key' => 'ubicacion',
                            'meta_value' => 'Archivo de Categorias',
                            'posts_per_page' => 2,
                        );
                        $banner_header = new WP_Query($args);
                        while ($banner_header->have_posts()) {
                            $banner_header->the_post();
                            $imagen_escritorio = get_field("imagen_escritorio");
                            $enlace = get_field("enlace");
                        ?>
                            <div class="col-md-6 col-sm-6 align-left">
                                <img class="banner-archive" src="<?php echo $imagen_escritorio ?>" alt="images">
                            </div>
                        <?php }
                        wp_reset_postdata() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php get_sidebar("single"); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
