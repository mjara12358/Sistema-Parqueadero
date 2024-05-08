<?php

use PHPUnit\Framework\TestCase;

require_once 'servicio/testServicio/EliminarServicio.php'; 

class EliminarServicioTest extends TestCase
{
    public function testEliminarServicioExitoso()
    {
        $handler = new EliminarServicio();

        // Simula el ID del servicio a eliminar
        $idServicio = 1;

        // Realiza la prueba
        $resultado = $handler->eliminarServicio($idServicio);

        // Verifica que la eliminación sea exitosa
        $this->assertTrue($resultado);
    }

    public function testEliminarServicioFallido()
    {
        $handler = new EliminarServicio();

        // Simula un ID de servicio que no existe
        $idServicio = 999;

        // Realiza la prueba
        $resultado = $handler->eliminarServicio($idServicio);

        // Verifica que la eliminación sea fallida
        $this->assertFalse($resultado);
    }
}
