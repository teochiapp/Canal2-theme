<div class="title-v1">
    <h3>ÚLTIMAS NOTICIAS</h3>
</div>
<!-- End title --> 
<div class="slide-four-item size-18 nav-ver2 nav-white box">
        <?php
        $args = array(
            'post_type'      => 'post',         
            'posts_per_page' => 10,             
            'orderby'        => 'date',         
            'order'          => 'DESC',
            'category__not_in' => array(35)

        );

        $custom_query = new WP_Query($args);

        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) : $custom_query->the_post();
            $titulo = get_the_title();
            $categoria = get_the_category();
            $imagen = get_the_post_thumbnail_url();
            $fecha = get_the_date();
            $extracto = get_the_excerpt();
            $nombres_ = '';
            $category = $categoria[0];
            $category_link = get_category_link($category->cat_ID);
            $post_id = get_the_ID();
            $cantidad_comentarios = get_comments_number();

        ?>
                <div class="post-item ver3 cat-1 overlay">
                    <a class="lable" href="<?php echo esc_url($category_link)?>"><?php if ($categoria) {
                        foreach ($categoria as $category) {
                            $nombres_ .= $category->name . ', ';
                        }

                        $nombres_ = rtrim($nombres_, ', '); // Eliminar la última coma y espacio en blanco
                    }

                    echo $nombres_; ?>
                    </a>
                    <div class="wrap-images">
                        <a class="images" href="<?php the_permalink(); ?>" ><img class='img-responsive' src="<?php echo $imagen ?>" alt="images"></a>
                        <div class="tag">
                            <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                            <a class="comments" href="#" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                        </div>
                    </div>
                    <div class="text">
                        <h2><a href="<?php the_permalink(); ?>" ><?php echo $titulo; ?></a></h2>
                        <p><?php if ($extracto) {
                                    $extractoCortado = wp_trim_words($extracto, 20); //  Número de palabras que deseas mostrar en el extracto
                                    echo $extractoCortado;
                        } ?></p>
                        <a class="read-more" href="<?php the_permalink(); ?>" title="read more">Leer más</a>
                    </div>
                </div>
        <?php
                // Restaurar datos originales del loop principal
                wp_reset_postdata();
            endwhile;
        else :
            echo 'No se encontraron posts recientes';
        endif;
        ?>
        <!-- End item -->