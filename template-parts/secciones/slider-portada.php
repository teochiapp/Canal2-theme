<?php

$latest_post_args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key' => 'destacar',
            'value' => 'Página principal - Galería Principial',
            'compare' => 'LIKE'
        )
    )
);

$latest_post_query = new WP_Query($latest_post_args);

$latest_post_id = 0;

if ($latest_post_query->have_posts()) {
    while ($latest_post_query->have_posts()) {
        $latest_post_query->the_post();
        $latest_post_id = get_the_ID();
    }
}

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'post__not_in' => array($latest_post_id),
    'meta_query' => array(
        array(
            'key' => 'destacar',
            'value' => 'Página principal - Galería Principial',
            'compare' => 'LIKE'
        )
    )
);

$slider_portada = new WP_Query($args);

if ($slider_portada->have_posts()) :

    $contador = 0;
    
    ?> 
    <div class="slider-one-item nav-ver3 hidden-desktop">
        <div class="items">
            <div class="col-md-3"> 
    <?php

    while ($contador < 2) : $slider_portada->the_post();
        ?>

                <div class="col-md-12">
                    <?php
     
                    $titulo = get_the_title();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                    $categoria = get_the_category();
                    $nombres_ = '';
                    $category = $categoria[0];
                    $category_link = get_category_link($category->cat_ID);
                    $cantidad_comentarios = get_comments_number();
                    ?>

                    <div class="post-item cat-1 ver1 overlay">
                        <a class="lable" href="<?php echo esc_url($category_link)?>"><?php if ($categoria) {
                            foreach ($categoria as $category) {
                                $nombres_ .= $category->name . ', ';
                            }

                            $nombres_ = rtrim($nombres_, ', '); 
                        }

                        echo $nombres_; ?>
                        </a>
                        <a class="images" href="<?php the_permalink(); ?>">
                            <img src="<?php echo $imagen ?>" alt="images">
                        </a>
                        <div class="text">
                            <h2><a href="<?php the_permalink(); ?>" ><?php echo $titulo; ?></a></h2>
                            <div class="tag">
                                <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                <a class="comments" href="<?php the_permalink(); ?>" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $contador++;
            endwhile;

            ?>
            </div> 
            <div class="col-md-6 item-center"> <?php

            while ($contador === 2) : $latest_post_query->the_post();
                ?>
                    <?php
     
                    $titulo = get_the_title();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                    $categoria = get_the_category();
                    $contenido = get_the_content();
                    $nombres_ = '';
                    $category = $categoria[0];
                    $category_link = get_category_link($category->cat_ID);
                    $cantidad_comentarios = get_comments_number();
                    ?>
                    
                    <div class="post-item cat-3 ver1 overlay">
                        <a class="lable" href="<?php echo esc_url($category_link)?>"><?php if ($categoria) {
                            foreach ($categoria as $category) {
                                $nombres_ .= $category->name . ', ';
                            }

                            $nombres_ = rtrim($nombres_, ', '); 
                        }

                        echo $nombres_; ?>
                        </a>
                        <a class="images" href="<?php the_permalink(); ?>" >
                            <img src="<?php echo $imagen ?>" alt="images">
                        </a>
                        <div class="text">
                            <h2><a href="<?php the_permalink(); ?>" ><?php the_title() ?></a></h2>
                                <p class="description"><?php if ($contenido) {
                                                                $extract = wp_trim_words($contenido, 25); //  Número de palabras que deseas mostrar en el extracto
                                                                echo $extract;
                                                            } ?></p>
                            <div class="tag">
                                <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                <a class="comments" href="<?php the_permalink(); ?>" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios;  ?> </a>
                            </div>
                        </div>
                    </div>
                <?php
                $contador++;
            endwhile;

            ?>
            </div> 
            <div class="col-md-3 item-end"> <?php

            while ($contador < 5 && $contador > 2) : $slider_portada->the_post();
                ?>
                    <div class="col-md-12">
              
                    <?php
     
                    $titulo = get_the_title();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                    $categoria = get_the_category();
                    $nombres_ = '';
                    $category = $categoria[0];
                    $category_link = get_category_link($category->cat_ID);
                    $cantidad_comentarios = get_comments_number();
                    ?>
                    
                    <div class="post-item cat-4 ver1 overlay">
                        <a class="lable" href="<?php echo esc_url($category_link)?>">
                        <?php if ($categoria) {
                            foreach ($categoria as $category) {
                                $nombres_ .= $category->name . ', ';
                            }

                            $nombres_ = rtrim($nombres_, ', '); 
                        }

                        echo $nombres_; ?>
                        </a>
                        <a class="images" href="<?php the_permalink(); ?>" >
                            <img src="<?php echo $imagen ?>" alt="images">
                        </a>
                        <div class="text">
                            <h2><a href="<?php the_permalink(); ?>" ><?php echo $titulo; ?></a></h2>
                            <div class="tag">
                                <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                <a class="comments" href="<?php the_permalink(); ?>" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios;  ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $contador++;
            endwhile;

    ?> 
            </div>
        </div>
        <div class="items">
            <div class="col-md-3"> 
    <?php

    while ($contador < 7 && $contador > 4) : $slider_portada->the_post();
        ?>

                <div class="col-md-12">
                    <?php
     
                    $titulo = get_the_title();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                    $categoria = get_the_category();
                    $nombres_ = '';
                    $category = $categoria[0];
                    $category_link = get_category_link($category->cat_ID);
                    $cantidad_comentarios = get_comments_number();
                    ?>

                    <div class="post-item cat-1 ver1 overlay">
                        <a class="lable" href="<?php echo esc_url($category_link)?>"><?php if ($categoria) {
                            foreach ($categoria as $category) {
                                $nombres_ .= $category->name . ', ';
                            }

                            $nombres_ = rtrim($nombres_, ', '); 
                        }

                        echo $nombres_; ?>
                        </a>
                        <a class="images" href="<?php the_permalink(); ?>" >
                            <img src="<?php echo $imagen ?>" alt="images">
                        </a>
                        <div class="text">
                            <h2><a href="<?php the_permalink(); ?>" ><?php echo $titulo; ?></a></h2>
                            <div class="tag">
                                <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                <a class="comments" href="<?php the_permalink(); ?>" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios;  ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $contador++;
            endwhile;

            ?>
            </div> 
            <div class="col-md-6 item-center"> <?php

            while ($contador === 7) : $slider_portada->the_post();
                ?>
                    <?php
     
                    $titulo = get_the_title();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                    $categoria = get_the_category();
                    $contenido = get_the_content();
                    $nombres_ = '';
                    $category = $categoria[0];
                    $category_link = get_category_link($category->cat_ID);
                    $cantidad_comentarios = get_comments_number();
                    ?>
                    
                    <div class="post-item cat-3 ver1 overlay">
                        <a class="lable" href="<?php echo esc_url($category_link)?>"><?php if ($categoria) {
                            foreach ($categoria as $category) {
                                $nombres_ .= $category->name . ', ';
                            }

                            $nombres_ = rtrim($nombres_, ', '); 
                        }

                        echo $nombres_; ?>
                        </a>
                        <a class="images" href="<?php the_permalink(); ?>" >
                            <img src="<?php echo $imagen ?>" alt="images">
                        </a>
                        <div class="text">
                            <h2><a href="<?php the_permalink(); ?>" ><?php the_title() ?></a></h2>
                                <p class="description"><?php if ($contenido) {
                                                                $extract = wp_trim_words($contenido, 25); //  Número de palabras que deseas mostrar en el extracto
                                                                echo $extract;
                                                            } ?></p>
                            <div class="tag">
                                <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                <a class="comments" href="<?php the_permalink(); ?>" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios;  ?> </a>
                            </div>
                        </div>
                    </div>
                <?php
                $contador++;
            endwhile;

            ?>
            </div> 
            <div class="col-md-3 item-end"> <?php

            while ($contador < 10 && $contador > 7) : $slider_portada->the_post();
                ?>
                    <div class="col-md-12">
              
                    <?php
     
                    $titulo = get_the_title();
                    $imagen = get_the_post_thumbnail_url();
                    $fecha = get_the_date();
                    $categoria = get_the_category();
                    $nombres_ = '';
                    $category = $categoria[0];
                    $category_link = get_category_link($category->cat_ID);
                    $cantidad_comentarios = get_comments_number();
                    ?>
                    
                    <div class="post-item cat-4 ver1 overlay">
                        <a class="lable" href="<?php echo esc_url($category_link)?>"><?php if ($categoria) {
                            foreach ($categoria as $category) {
                                $nombres_ .= $category->name . ', ';
                            }

                            $nombres_ = rtrim($nombres_, ', '); 
                        }

                        echo $nombres_; ?>
                        </a>
                        <a class="images" href="<?php the_permalink(); ?>" >
                            <img src="<?php echo $imagen ?>" alt="images">
                        </a>
                        <div class="text">
                            <h2><a href="<?php the_permalink(); ?>" ><?php echo $titulo; ?></a></h2>
                            <div class="tag">
                                <p class="date"><i class="fa fa-clock-o"></i><?php echo $fecha; ?></p>
                                <a class="comments" href="<?php the_permalink(); ?>" ><i class="fa fa-comments"></i><?php echo $cantidad_comentarios;  ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $contador++;
            endwhile;
    ?> 
            </div>
            
        </div>
        
 
    <?php wp_reset_postdata();

endif;
?>
