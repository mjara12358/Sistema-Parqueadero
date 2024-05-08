<?php

use PHPUnit\Framework\TestCase;

require_once 'vehic/testVehic/ConsultarVehiculo.php';

class ConsultarVehiculoTest extends TestCase
{
    public function testConsultarVehiculos()
    {
        $handler = new ConsultarVehiculo();

        $resultado = $handler->consultarVehiculos();

        // Verifica que la respuesta no esté vacía
        $this->assertNotEmpty($resultado);

    }
}
