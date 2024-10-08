<?php
function conexion($bd_config){
    try{
        $conexion= new PDO('mysql:host=localhost;dbname='. $bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    
    }catch(PDOException $e){
        return false;
    }
}

/**
 * Función para evitar inyección de código
 */
function limpiarDatos($datos){
    $datos = htmlspecialchars(stripslashes(trim($datos)));
    return $datos;
}

function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_post($post_por_pagina, $conexion){
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function id_articulo($id){
    return (int)limpiarDatos($id);
}

function obtener_single_post($conexion, $id){
    $sentencia = $conexion->prepare("SELECT * FROM articulos WHERE id=:id LIMIT 1");
    $sentencia->execute(array(':id' => $id));
    $resultado = $sentencia->fetch();
    return ($resultado) ? $resultado : false;
}

function fecha($fecha){
    $timestamp = strtotime($fecha);
    $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $anio = date('Y', $timestamp);

    $fecha_completa = "$dia de " . $meses[$mes] . " del $anio";

    return $fecha_completa;
}

function numero_paginas($post_por_pagina, $conexion){
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];

    $numero_paginas = ceil($total_post / $post_por_pagina);
    return $numero_paginas;
}

function comprobarSession(){
    if(!isset($_SESSION['admin'])){
        header('Location: ' . RUTA);
    }
}

?>