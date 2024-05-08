<?php

use PHPUnit\Framework\TestCase;

require_once 'vehic/testVehic/ModificarVehiculo.php'; 

class ModificarVehiculoTest extends TestCase
{
    public function testModificarVehiculo()
    {
        $handler = new ModificarVehiculo();

        $resultado = $handler->modificarVehiculo(4, 'JJJ765', 'Automóvil', 1); 

        // Verifica que la respuesta sea exitosa
        $this->assertEquals('El vehículo ha sido modificado exitosamente.', $resultado);

    }
}
