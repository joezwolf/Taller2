<?php

require_once 'vendor/autoload.php';

use Jhon\Taller2\Controller\CalculadoraController;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $valor1 = isset($_POST['valor1']) ? (float)$_POST['valor1'] : 0;
    $valor2 = isset($_POST['valor2']) ? (float)$_POST['valor2'] : 0;

    
    $controller = new CalculadoraController();
    $controller->procesar($valor1, $valor2);
} else {
    
    header('Location: index.php');
    exit();
}
