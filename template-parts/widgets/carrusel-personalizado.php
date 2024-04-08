<?php
$galeria_imagenes = get_field("galeria_de_imagenes");

?>

<div id="carrusel-section">
    <div class="container_carru">
        <div id="actions">
            <a id="arrowright">
                <i class="fas fa-chevron-right arrowright"></i>
            </a>
            <a id="arrowleft">
                <i class="fas fa-chevron-left arrowleft"></i>
            </a>
        </div>
        <div id="items">
        <?php foreach ($galeria_imagenes as $image) : ?>
            <a href="<?php echo $image['url']; ?>" data-lightbox="gallery">
                <img draggable="false" id="item" 
                    src="<?php echo $image['url']; ?>" 
                    alt="<?php echo $image['alt']; ?>">
            </a>
<?php endforeach; ?>
        </div>
    </div>
</div>