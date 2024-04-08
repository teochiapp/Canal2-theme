<?php get_header();

$formulario_id = get_the_ID();

// Obtener el título del formulario de WPForms
$formulario_titulo = get_the_title($formulario_id);
?>
<!-- End container -->
<div class="container">
    <div class="row">
        <div class="col-md-12 space-30">
            <div class="single-post columna-contacto">
                <div class="blog-post-item cat-1 box">
                    <div class="title-v1">
                        <?php echo '<h3>' . esc_html($formulario_titulo) . '</h3>'; ?>
                    </div>
                    <div class="box">
                        <?php
                        if (!empty($formulario_id)) {
                            echo do_shortcode('[wpforms id="' . esc_attr($formulario_id) . '"]');
                        } else {
                            echo "No se ha seleccionado un formulario específico.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>