<?php  
$numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion);


?>
<section class="paginacion">
    <ul>
        <?php echo (pagina_actual() === 1) ? "<li class='disabled'>&laquo;</li>" : "<li><a href='index.php?p=" . pagina_actual() - 1 . "'>&laquo;</a></li>" ?>
        
        <?php for($i =1; $i <= $numero_paginas; $i++):?>
            <?php if(pagina_actual() === $i): ?>
                <li class="active">
                    <?php echo $i; ?>
                </li>
            <?php else:?>
                <li><a href="index.php?p=<?php echo $i?>"><?php echo $i; ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>
        <?php echo (pagina_actual() == $numero_paginas) ? "<li class='disabled'>&raquo;</li>" : "<li><a href='index.php?p=" . pagina_actual() + 1 . "'>&raquo;</a></li>" ?>
    </ul>
</section>