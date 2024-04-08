<?php get_header(); ?>
<!-- End container -->
<div class="container" style="min-height: 680px;">
    <div class="row">
        <div class="col-md-8">
            <div class="single-post columna-contacto">
                <div class="blog-post-item cat-1 box">
                    <div class="title-v1">
                        <h3>Contacto</h3>
                    </div>
                    <div class="box">
                        <?php echo do_shortcode('[wpforms id="315"]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="title-v1">
                        <h3>¿Dónde estamos?</h3>
                    </div>
        <div id="googleMap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61048.54120328437!2d-63.60426633459126!3d-31.572077811852385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94332bad5915c31f%3A0x3583e1983dc6da8b!2sCoovilros!5e0!3m2!1ses-419!2sar!4v1691590491671!5m2!1ses-419!2sar" id="mapaEmbed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>