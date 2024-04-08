<?php

global $categoria;
global $nombres;
global $category;
$nombres_ = "";

?>
<h3 class="widget-title">MÁS DE 
    <?php if ($categoria) {
        foreach ($categoria as $category) {
            $nombres_ .= $category->name . ', ';
        }

        $nombres_ = rtrim($nombres_, ', '); // Eliminar la última coma y espacio en blanco
    }

    echo $nombres_; ?>
</h3>

<?php
$misma_categoria_args = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category->slug,
        )
    ),
    'post_status' => 'publish',
    'posts_per_page' => 3,
);
$posts_categoria = new WP_Query($misma_categoria_args);

if ($posts_categoria->have_posts()) :
    while ($posts_categoria->have_posts()) : $posts_categoria->the_post();
        $titulo = get_the_title();
        $imagen = get_the_post_thumbnail_url();
        $fecha = get_the_date();
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'custom_post_views', true);
        $cantidad_comentarios = get_comments_number();
?>
        <div class="content">
            <div class="post-item ver2 overlay">
                <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen ?>" alt="images"></a>
                <div class="text">
                    <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo ?></a></h2>
                    <div class="tag">
                        <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                        <a class="comments" href="<?php the_permalink(); ?>" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;

    wp_reset_postdata();

else :
    echo "<p> No se encontraron posts recientes </p>";
endif;

?>