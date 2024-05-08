<?php

use PHPUnit\Framework\TestCase;

require_once 'vehic/testVehic/RegistrarVehiculo.php'; 

class RegistrarVehiculoTest extends TestCase
{
    public function testRegistrarVehiculo()
    {
        $handler = new RegistrarVehiculo();

        $resultado = $handler->registrarVehiculo('ABC123', 'Automóvil', 1); 

        // Verifica que la respuesta sea exitosa
        $this->assertEquals('El vehículo ha sido registrado exitosamente.', $resultado);

    }
}
