<?php

use PHPUnit\Framework\TestCase;

require_once 'ticket/testTicket/EliminarTicket.php';

class EliminarTicketTest extends TestCase
{
    public function testEliminarTicket()
    {
        $handler = new EliminarTicket();

        $resultado = $handler->eliminarTicket(5);

        // Verifica que la respuesta sea exitosa
        $this->assertEquals("El ticket ha sido eliminado exitosamente.", $resultado);

    }
}
