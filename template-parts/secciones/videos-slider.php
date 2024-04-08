        <div class="title-v2">
            <h3>VIDEOS</h3>
        </div>
        <div class="slide-item-youtube nav-ver2 full-width">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'category_name'  => 'videos',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'enlace-video',
                        'compare' => 'EXISTS',
                    )
                ),
            );

            $video_posts = new WP_Query($args);

            if ($video_posts->have_posts()) {
                while ($video_posts->have_posts()) {
                    $video_posts->the_post();
                    $imagen = get_the_post_thumbnail_url();
                    $video_url = get_field("enlace-video");
                    $titulo = get_the_title();
                    $video_id = get_youtube_video_id($video_url);

                    if ($video_id) {
                    ?>
                        <div class="post-item ver1 overlay video" data-videourl="https://www.youtube.com/watch?v=<?php echo $video_id; ?>" data-videosite="youtube">
                            <a class="images" href="https://www.youtube.com/watch?v=<?php echo $video_id; ?>">
                                <img class="img-responsive" href="https://www.youtube.com/watch?v=<?php echo $video_id; ?>" src="<?php echo $imagen; ?>">
                            </a>
                            <div class="text">
                                <h2><span><?php echo $titulo; ?></span></h2>
                            </div>
                        </div>
                    <?php

                    }
                }

                // Restablecer la consulta original
                wp_reset_postdata();
            } else {
                echo 'No se encontraron posts con videos.';
            }
            ?>
            <!-- End item -->
        </div>