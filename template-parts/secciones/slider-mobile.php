<div class="slide-owl-mobile home3-slide-owl nav-ver5">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'meta_query' => array(
            array(
                'key' => 'destacar',
                'value' => ' Página principal - Galería Principial',
                'compare' => 'LIKE'
            )
        )
    );

    $slider_portada_mobile = new WP_Query($args);
    while ($slider_portada_mobile->have_posts()) {
        $slider_portada_mobile->the_post();
        $titulo = get_the_title();
        $imagen = get_the_post_thumbnail_url();
        $fecha = get_the_date();
        $categoria = get_the_category();
        $nombres_ = '';
        $category = $categoria[0];
        $category_link = get_category_link($category->cat_ID);
        $cantidad_comentarios = get_comments_number();
    ?>
        <div class="item">
            <div class="post-item cat-1 ver1 overlay">
                <a class="lable" href="<?php echo esc_url($category_link) ?>"><?php if ($categoria) {
                                                                                    foreach ($categoria as $category) {
                                                                                        $nombres_ .= $category->name . ', ';
                                                                                    }

                                                                                    $nombres_ = rtrim($nombres_, ', '); // Eliminar la última coma y espacio en blanco
                                                                                }

                                                                                echo $nombres_; ?>
                </a>
                <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                <div class="text">
                    <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo; ?></a></h2>
                    <div class="tag">
                        <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                        <a class="comments" href="#"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End item -->
    <?php
    }
    wp_reset_postdata();
    ?>
    <!-- End item -->
</div>
<!-- End Slide home3 -->