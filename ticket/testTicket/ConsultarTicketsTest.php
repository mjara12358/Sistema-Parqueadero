<?php

use PHPUnit\Framework\TestCase;

require_once 'ticket/testTicket/ConsultarTickets.php'; 

class ConsultarTicketsTest extends TestCase
{
    public function testConsultarTickets()
    {
        $handler = new ConsultarTickets();

        $resultados = $handler->consultarTickets();

        // Verifica que la consulta haya devuelto resultados
        $this->assertNotEmpty($resultados);

    }
}
