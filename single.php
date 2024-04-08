<?php get_header(); ?>
<?php
$post_id = get_the_ID(); // Obtén el ID del post actual
$post = get_post($post_id); // Obtén los datos del post

// Ahora puedes acceder a los datos del post y mostrarlos
$titulo = $post->post_title;
$contenido = $post->post_content;
$fecha = get_the_date();
$post_tags = get_the_tags();
$imagen_id = get_post_thumbnail_id();
$imagen_url = wp_get_attachment_image_src($imagen_id, 'large')[0]; // Cambia 'large' por el tamaño que necesites
$categoria = get_the_category();
$nombres_ = '';
$category = $categoria[0];
$cantidad_comentarios = get_comments_number();
$video_url = get_field("enlace-video");
$video_id = get_youtube_video_id($video_url);
$formulario_id = get_field("formulario_id");
$galeria_imagenes = get_field("galeria_de_imagenes");

?>
<!-- End container -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="single-post" style="margin-top: 20px;">
                <div class="blog-post-item cat-1 box">


                    <div class="content">
                        <?php
                        if ($video_id) {
                        ?>
                            <div class="blog-post-images">
                                <iframe width="100%" height="410em" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="blog-post-images">
                                <a class="hover-images" href="#"><img class="img-responsive" src="<?php echo esc_url($imagen_url) ?>" alt=""></a>
                            </div>
                        <?php
                        }
                        ?>
                        <h3><?php echo $titulo; ?></h3>
                        <div class="tag">
                            <p class="lable"><?php echo $categoria[0]->name; ?>
                            </p>
                            <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                            <a class="comments" href="#"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                        </div>
                        <p> <?php echo apply_filters('the_content', $contenido); ?></p>
                        <?php
                        if ($galeria_imagenes) : 
                            get_template_part('template-parts/widgets/carrusel-personalizado', null, array());
                        endif;
                        ?>
                            <div class="col-md-12 space-30">
                                <?php
                                if ($formulario_id) {
                                    echo do_shortcode('[wpforms id="' . esc_attr($formulario_id) . '"]');
                                }
                                ?>
                            </div>
                    </div>
                    <?php if ($post_tags) { ?>
                        <p class="tag-cat"><span>tags:</span>
                            <?php

                            foreach ($post_tags as $tag) {
                                echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
                            }

                            ?>
                        </p>
                    <?php } ?>
                    <div class="title-v1 box" style="margin-top: 20px; margin-bottom: 0px;">
                        <h3>MÁS RECIENTES</h3>
                    </div>
                    <div class="slider-two-item box float-left nav-ver2 nav-white">
                        <?php
                        $args = array(
                            'post_type'      => 'post',         // Tipo de contenido (entradas)
                            'posts_per_page' => 10,             // Número de posts por página
                            'orderby'        => 'date',         // Ordenar por fecha
                            'order'          => 'DESC',         // Orden descendente
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
                                <div class="post-item ver1 overlay">
                                    <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen ?>" alt="images"></a>
                                    <div class="text">
                                        <h2><a href="<?php the_permalink(); ?>"><?php echo $titulo ?></a></h2>
                                        <div class="tag">
                                            <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                            <a class="comments" href="#"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
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
                    </div>
                </div>

                <?php comments_template(); ?>
            </div>
            <!-- End single-post -->
        </div>
        <div class="col-md-4">
            <?php get_sidebar("single"); ?>
        </div>
    </div>
</div>




<?php get_footer() ?>