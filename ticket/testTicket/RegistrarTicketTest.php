<?php

use PHPUnit\Framework\TestCase;

require_once 'ticket/testTicket/RegistrarTicket.php'; 

class RegistrarTicketTest extends TestCase
{
    public function testRegistrarTicket()
    {
        $handler = new RegistrarTicket();

        $resultado = $handler->registrarTicket(
            'ABC123',
            'Automóvil',
            'Ambar Swin',
            '123456789',
            '2023-11-17 08:00:00',
            '2023-11-17 18:00:00',
            'Tarifa Estándar',
            20.00
        );

        // Verifica que la respuesta sea exitosa
        $this->assertEquals("El ticket ha sido registrado exitosamente.", $resultado);

    }
}
