<div class="title-v1 space-30">
    <h3>Últimos anuncios</h3>
</div>
<?php
$args = array(
    'post_type'        => 'anuncio_trabajo',
    'post_status' => 'publish',
    'posts_per_page'   => 6,
);

$custom_query = new WP_Query($args);
$today = new DateTime('now', new DateTimeZone('America/Argentina/Cordoba')); 

$anuncios_trabajo = new WP_Query($args);
if ($anuncios_trabajo->have_posts()) {
    while ($anuncios_trabajo->have_posts()) {
        $anuncios_trabajo->the_post();
        $titulo = get_the_title();
        $descripcion = get_field("descripcion");
        $imagen = get_field("imagen");
        $fecha_inicio = DateTime::createFromFormat('d/m/Y', get_field("desde"));
        $fecha_fin = DateTime::createFromFormat('d/m/Y', get_field("hasta"));


        if ($today >= $fecha_inicio && $today <= $fecha_fin) {
?>
            <div class="content" style="border:unset; padding: 15px 0px;">
                <div class="post-item ver6">
                    <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                    <div class="text">
                        <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo; ?></a></h2>
                        <p class="description" style="color: #fff;"><?php if ($descripcion) {
                                                    $extractoCortado = wp_trim_words($descripcion, 10); //  Número de palabras que deseas mostrar en el extracto
                                                    echo $extractoCortado;
                                                } ?></p>
                        <a class="read-more" href="<?php the_permalink(); ?>">Leer más</a>
                    </div>
                </div>
            </div>
<?php
        }

        wp_reset_postdata();
    }
} else {
    echo "No se encontraron anuncios de trabajo recientes";
}


?>