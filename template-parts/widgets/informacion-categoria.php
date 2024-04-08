<?php

global $categoria;
global $nombres;
global $category;

?>
<h3 class="widget-title">CATEGORÍA:
    <?php if ($categoria) {
        foreach ($categoria as $category) {
            $nombres_ .= $category->name . ', ';
        }

        $nombres_ = rtrim($nombres_, ', '); // Eliminar la última coma y espacio en blanco
    }

    echo $nombres_; ?>
</h3>