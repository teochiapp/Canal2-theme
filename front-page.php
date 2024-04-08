<?php get_header(); ?>

<div class="home3-slideshow home4_sileshow float-left box">
    <div class="container">
        <?php get_template_part('template-parts/secciones/slider-portada', null, array()); ?>
    </div>
    
        <?php get_template_part('template-parts/secciones/slider-mobile', null, array()); ?>
</div>

    <div class="container">
        <?php get_template_part('template-parts/secciones/ultimas-noticias', null, array()); ?>
    </div>

    <div class="box locales-box">
        <?php get_template_part('template-parts/secciones/categoria-locales', null, array()); ?>
    </div>
</div>

<div class="wrap-slide-youtube  space-50">
    <div class="container">
        <?php get_template_part('template-parts/secciones/videos-slider', null, array()); ?> 
    </div>
</div>

<div class="box">
    <?php get_template_part('template-parts/secciones/categoria-deportes', null, array()); ?> 
</div>

<div class="box">
    <?php get_template_part('template-parts/widgets/pop-up', null, array()); ?>
</div>  

<?php get_footer(); ?>