<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Service\PedidoService;
use App\Model\Pedido;
use App\Repository\PedidoRepository;
use App\Infrastructure\EmailService;

class PedidoServiceTest extends TestCase
{
    private $repoMock;
    private $emailMock;
    private $service;

    protected function setUp(): void
    {
        $this->repoMock = $this->createMock(PedidoRepository::class);
        $this->emailMock = $this->createMock(EmailService::class);

        $this->service = new PedidoService(
            $this->repoMock,
            $this->emailMock
        );
    }

    public function testFinalizarPedidoComSucesso()
    {
        $this->repoMock
            ->expects($this->once())
            ->method('salvar');

        $this->emailMock
            ->expects($this->once())
            ->method('enviarConfirmacao')
            ->with("Pedido finalizado");

        $pedido = new Pedido(100);

        $this->assertEquals(
            100,
            $this->service->finalizarPedido($pedido)
        );
    }

    public function testPedidoComDesconto()
    {
        $pedido = new Pedido(300);

        $this->assertEquals(
            270,
            $this->service->finalizarPedido($pedido)
        );
    }

    public function testPedidoInvalido()
    {
        $this->expectException(Exception::class);
        $this->service->finalizarPedido(new Pedido(0));
    }
}