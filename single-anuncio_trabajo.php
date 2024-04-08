<?php get_header(); ?>
<?php
$post_id = get_the_ID(); // Obtén el ID del post actual
$post = get_post($post_id); // Obtén los datos del post

// Ahora puedes acceder a los datos del post y mostrarlos
$titulo = $post->post_title;
$imagen = get_field("imagen");
$descripcion = get_field("descripcion");
$nombre = get_field('nombre_empresa');
$logo = get_field("logo");
$email = get_field("email");
$telefono = get_field("telefono");
$sitio_web = get_field("sitio_web");
$visibilidad = get_field('visibilidad');


?>
<!-- End container -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="single-post space-30" style="margin-top: 20px;">
                <div class="blog-post-item cat-1 box">
                    <div class="content">
                        <div class="blog-post-images">
                            <a class="hover-images" href="#" title="Post"><img class="img-responsive" src="<?php echo $imagen ?>" alt=""></a>
                        </div>
                        <h3><?php echo $titulo; ?></h3>
                        <p><?php echo $descripcion; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php
            $args = array(
                'post_type' => 'anuncio_trabajo',
                'meta_query' => array(
                    array(
                        'key' => 'visibilidad',
                        'value' => '1', // Valor de verificación para un campo de tipo checkbox en ACF
                        'compare' => '=' // Utilizamos '=' para comparar con el valor '1'        
                    )
                )
            );
            $informacion_empresa = new WP_Query($args);

            if ($visibilidad) {
            ?>
                <div class="title-v1">
                    <h3>Datos de la empresa</h3>
                </div>
                <div class="post-item space-30 cat-3 ver6 overlay">
                    <a class="images" title="images"><img class='img-responsive' src="<?php echo $logo; ?>" alt="images"></a>
                    <div class="text info-empresa">
                        <h2><a title="title"><?php echo $nombre; ?></a></h2>
                        <p class="description"><?php echo $email; ?></p>
                        <a href="<?php echo $sitio_web; ?>" target="_blank"><?php echo $sitio_web; ?></a>
                        <p class="description"><?php echo $telefono; ?></p>
                    </div>
                </div>

                <aside class="widget popular" style="margin-top: 36px;">
                    <?php get_template_part('template-parts/widgets/ultimos-anuncios', null, array()) ?>
                </aside>

            <?php } else {
            ?>
                <aside class="widget popular" style="margin-top: 36px;">
                    <?php get_template_part('template-parts/widgets/ultimos-anuncios', null, array()) ?>
                </aside>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<?php get_footer() ?>