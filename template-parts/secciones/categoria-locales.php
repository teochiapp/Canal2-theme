
    <div class="col-md-8 col-locales">
        <div class="gaming box">
            <div class="row">
                <div class="title-v1 margin-30" id="gaming-title">
                    <h3>LOCALES</h3>
                </div>
                <?php
                $ultimo_post = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'category_name'  => 'locales',     // Nombre de la categoría
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                $sticky_post = new WP_Query([
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name'  => 'locales',     // Nombre de la categoría
                    'posts_per_page' => 1,
                    'post__in' => array($ultimo_post[0]->ID),
                ]);
                while ($sticky_post->have_posts()) {
                    $sticky_post->the_post();
                    $titulo = get_the_title();
                    $extracto = get_the_excerpt();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                ?>
                    <div class="col-md-6 sticky-locales">
                        <div class="post-item ver3 overlay max-width-700">
                            <div class="wrap-images">
                                <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php the_post_thumbnail_url() ?>" alt="images"></a>
                                <div class="tag">
                                    <p class="date"><i class="fa fa-clock-o"></i><?php the_date(); ?></p>
                                    <a class="comments" href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i>10</a>
                                </div>
                            </div>
                            <div class="text">
                                <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo; ?></a></h2>
                                <p><?php echo $extracto; ?></p>
                                <a class="read-more" href="<?php the_permalink(); ?>">Leer más</a>
                            </div>
                        </div>
                        <!-- End item -->
                    </div>

                    <?php
                }
                wp_reset_postdata();

                $ultimo_post = get_posts(array(
                    'post_type' => 'post',
                    'category_name'  => 'locales',
                    'posts_per_page' => 1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                $args = array(
                    'post_type'      => 'post',         // Tipo de contenido (entradas)
                    'posts_per_page' =>  4,             // Número de posts por página
                    'category_name'  => 'locales',     // Nombre de la categoría
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
                        <div class="col-md-6" >
                            <div class="post-item ver2">
                                <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                                <div class="text">
                                    <h2><a href="<?php the_permalink(); ?>" style="line-height: 14px; font-size: 12px;"><?php echo $titulo; ?></a></h2>
                                    <div class="tag">
                                        <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                        <a class="comments" href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios;  ?></a>
                                    </div>
                                </div>
                            </div>
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
    </div>
    <!-- End col-md-8 -->
    <div class="col-md-4">
        <?php get_sidebar(); ?>
    </div>
    <!-- End col-md-4 -->
