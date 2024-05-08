<?php

use PHPUnit\Framework\TestCase;

require_once 'vehic/testVehic/EliminarVehiculo.php'; 

class EliminarVehiculoTest extends TestCase
{
    public function testEliminarVehiculo()
    {
        $handler = new EliminarVehiculo();

        $resultado = $handler->eliminarVehiculo(4); 

        // Verifica que la respuesta sea exitosa
        $this->assertEquals('El vehículo ha sido eliminado exitosamente.', $resultado);

    }
}
