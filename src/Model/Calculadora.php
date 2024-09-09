<?php

namespace Jhon\Taller2\Model;

class Calculadora
{
    private $valor1;
    private $valor2;

    public function __construct($valor1, $valor2)
    {
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    public function sumar()
    {
        return $this->valor1 + $this->valor2;
    }

    public function multiplicar()
    {
        return $this->valor1 * $this->valor2;
    }

    public function convertirKmAMillas()
    {
        return $this->valor1 * 0.621371;
    }

    public function calcularIMC()
    {
        return $this->valor1 / ($this->valor2 * $this->valor2);
    }
}
