<?php require 'header.php'; ?>
    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class= "titulo"><?php echo $post['titulo']; ?></h2>
                <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
                <div class="thumb">
                    <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="">
                </div>
                <p class="extracto">
                    <?php echo nl2br($post['texto']); ?> <!--nl2br función para que respete espacios-->
                </p>
                <a href="index.php" class="continuar">Regresar</a>
            </article>
        </div>
    </div>
<?php require 'footer.php'; ?>