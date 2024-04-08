    <ul class="tabs">
        <li class="item text-center" rel="tab_widget_1">
            <h3>DESTACADAS</h3>
        </li>
    </ul>
    <div class="tab-container">
        <div id="tab_widget_1" class="tab-content">
        <?php

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'meta_query' => array(
                array(
                    'key' => 'notas_destacadas',
                    'value' => '1', // Valor de verificación para un campo de tipo checkbox en ACF
                    'compare' => '=' // Utilizamos '=' para comparar con el valor '1'        
                )
            )
        );

        $destacadas = new WP_Query($args);

        if ($destacadas->have_posts()) :
            while ($destacadas->have_posts()) : $destacadas->the_post();
            $titulo = get_the_title();
            $imagen = get_the_post_thumbnail_url();
            $fecha = get_the_date();
            $categoria = get_the_category();
            $nombres_ = '';
            $category = $categoria[0];
            $category_link = get_category_link($category->cat_ID);
            $cantidad_comentarios = get_comments_number();
            
        ?>           
            <div class="post-item cat-3 ver2 overlay">
                        <a class="lable" style="height: fit-content;
  max-width: 100px;" href="<?php echo esc_url($category_link)?>"><?php if ($categoria) {
                            foreach ($categoria as $category) {
                                $nombres_ .= $category->name . ', ';
                            }

                            $nombres_ = rtrim($nombres_, ', '); // Eliminar la última coma y espacio en blanco
                        }
                        echo $nombres_; ?>
                        </a>
                <a class="images" href="<?php the_permalink(); ?>"><img class='img-responsive' src="<?php echo $imagen; ?>" alt="images"></a>
                <div class="text">
                    <h2><a href="<?php the_permalink(); ?>" title="title"><?php echo $titulo; ?></a></h2>
                    <div class="tag">
                        <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                        <a class="comments" href="<?php the_permalink(); ?>" title="comments"><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
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