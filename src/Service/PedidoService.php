<?php

namespace App\Service;

use App\Model\Pedido;
use App\Repository\PedidoRepository;
use App\Infrastructure\EmailService;
use Exception;

class PedidoService
{
    private PedidoRepository $pedidoRepository;
    private EmailService $emailService;

    public function __construct(
        PedidoRepository $pedidoRepository,
        EmailService $emailService
) {
        $this->pedidoRepository = $pedidoRepository;
        $this->emailService = $emailService;
}

    public function finalizarPedido(Pedido $pedido): float
    {
        $this->validarPedido($pedido);

        $this->aplicarDescontoSeElegivel($pedido);

        $this->pedidoRepository->salvar($pedido);

        $this->emailService->enviarConfirmacao("Pedido finalizado");

        return $pedido->getValor();
    }

    private function validarPedido(Pedido $pedido): void
    {
        if ($pedido->getValor() <= 0) {
            throw new Exception("Valor do pedido inválido");
        }
    }

    private function aplicarDescontoSeElegivel(Pedido $pedido): void
    {
        if ($pedido->getValor() > 200) {
            $pedido->aplicarDesconto(10);
        }
    }
}