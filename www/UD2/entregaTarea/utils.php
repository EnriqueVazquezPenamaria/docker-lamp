<?php
function obtenerTareas() {
    if (!isset($_SESSION['tareas'])) {
        $_SESSION['tareas'] = [];
    }
    return $_SESSION['tareas'];
}

    function filtrarEntrada($entrada) {
    $entrada = trim ($entrada);
    $entrada = stripslashes ($entrada);
    $entrada = htmlspecialchars ($entrada);
    $entrada = preg_replace('/\s+/', "", $entrada);    
    return $entrada;
    }

    function entradaValida($entrada) {
        $entrada=filtrarEntrada($entrada);
        return !empty($entrada);
    }
function guardarTarea($id, $descripcion, $estado) {
    if (entradaValida($id) && entradaValida($descripcion) && in_array($estado, ['pendiente', 'en proceso', 'completada'])) {
        $nuevaTarea = [
            'id' => filtrarEntrada($id),
            'descripcion' => filtrarEntrada($descripcion),
            'estado' => filtrarEntrada($estado)
        ];
        $_SESSION['tareas'][] = $nuevaTarea;
        return true;
    }
    return false;
}

?>