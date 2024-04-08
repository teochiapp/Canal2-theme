<h3 class="widget-title">MÁS LEÍDAS</h3>
    <?php 
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'meta_key'       => 'custom_post_views', // La clave personalizada
        'orderby'        => 'meta_value_num',    // Ordenar por valor numérico
        'order'          => 'DESC',
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();
        $titulo = get_the_title();
        $imagen = get_the_post_thumbnail_url();
        $fecha = get_the_date();
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'custom_post_views', true);
        $cantidad_comentarios = get_comments_number();
    ?>
    <div class="content">
        <div class="post-item ver2 overlay">
            <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen?>" alt="images"></a>
            <div class="text">
                <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo ?></a></h2>
                <div class="tag">
                    <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                    <a class="comments" href="#"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php
        endwhile;

    wp_reset_postdata();

    else :
        echo "<p> No se encontraron posts populares </p>";
    endif;

?>