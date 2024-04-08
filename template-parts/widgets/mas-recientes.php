<h3 class="widget-title">MÁS RECIENTES</h3>
<?php
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        $anuncios_trabajo->the_post();
        $titulo = get_the_title();
        $descripcion = get_field("descripcion");
        $imagen = get_field("imagen");
        $fecha_inicio = get_field("desde");
        $fecha_fin = get_field("hasta");
        date_default_timezone_set('America/Argentina/Cordoba');
        $fecha_actual = date('d/m/Y');
?>
        <div class="content">
            <div class="post-item ver2 overlay">
                <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen ?>" alt="images"></a>
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
    echo "<p> No se encontraron posts recientes </p>";
endif;

?>