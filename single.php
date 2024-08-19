<?php
    require 'admin/config.php';
    require 'functions.php';

    $conexion = conexion($bd_config);
    $id_articulo = id_articulo($_GET['id']);
    
    if(!$conexion){
        header('Location: error.php');
    }
    if(empty($id_articulo)){
        header('Location: index.php');
    }

    $post = obtener_single_post($conexion, $id_articulo);
    
    if(!$post){
        header('Location: error.php');
    }

    require 'views/single.view.php';
?>