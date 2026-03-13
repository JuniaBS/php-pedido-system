<?php

namespace App\Model;

class Pedido
{
    private float $valor;

    public function __construct(float $valor)
    {
        $this->valor = $valor;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function aplicarDesconto(float $percentual): void
    {
        $this->valor -= $this->valor * ($percentual / 100);
    }
}