<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="travel cat-deportes" style="margin-bottom: 10px;">
                <div class="title-v1">
                    <h3>DEPORTES</h3>
                </div>
                <?php
                $ultimo_post = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'category_name'  => 'deportes',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                $sticky_post = new WP_Query([
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name'  => 'deportes',
                    'posts_per_page' => 1,
                    'post__in' => array($ultimo_post[0]->ID),
                ]);
                while ($sticky_post->have_posts()) {
                    $sticky_post->the_post();
                    $titulo = get_the_title();
                    $extracto = get_the_excerpt();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                    $cantidad_comentarios = get_comments_number();
                ?>
                    <div class="col-md-12 space-20">
                        <div class="post-item ver1 overlay">
                            <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                            <div class="text">
                                <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo; ?></a></h2>
                                <p class="description"><?php if ($extracto) {
                                                            $extractoCortado = wp_trim_words($extracto, 12); //  Número de palabras que deseas mostrar en el extracto
                                                            echo $extractoCortado;
                                                        } ?></p>
                                <div class="tag">
                                    <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                    <a class="comments" href="#"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios;  ?></a>
                                </div>
                            </div>
                        </div>
                        <!-- End item -->
                    </div>
                    <?php
                }
                wp_reset_postdata();

                $ultimo_post = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'category_name'  => 'deportes',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                $args = array(
                    'post_type'      => 'post',         // Tipo de contenido (entradas)
                    'posts_per_page' =>  2,             // Número de posts por página
                    'category_name'  => 'deportes',     // Nombre de la categoría
                    'orderby'        => 'date',         // Ordenar por fecha
                    'order'          => 'DESC',         // Orden descendente
                    'post__not_in' => array($ultimo_post[0]->ID),
                );

                $locales = new WP_Query($args);

                if ($locales->have_posts()) :
                    while ($locales->have_posts()) : $locales->the_post();
                        $titulo = get_the_title();
                        $imagen = get_the_post_thumbnail_url();
                        $fecha = get_the_date();
                        $cantidad_comentarios = get_comments_number();

                    ?>
                        <div class="col-md-6">
                            <div class="post-item ver1 overlay">
                                <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                                <div class="text">
                                    <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo; ?></a></h2>
                                    <div class="tag">
                                        <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                        <a class="comments" href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End item -->
                        </div>
                <?php

                    endwhile;

                    wp_reset_postdata();
                else :
                    echo 'No se encontraron posts.';
                endif;
                ?>
            </div>
        </div>
        <!-- End col-md-8 -->
        <div class="col-md-4">
            <?php get_sidebar('secundaria'); ?>
        </div>
        <!-- End col-md-4 -->
    </div>
    <!-- End row -->
</div>