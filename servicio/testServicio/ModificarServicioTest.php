<?php

use PHPUnit\Framework\TestCase;

require_once 'servicio/testServicio/ModificarServicio.php';

class ModificarServicioTest extends TestCase
{
    public function testModificarServicioExitoso()
    {
        $handler = new ModificarServicio();

        // Simula datos del formulario
        $idServicio = 1;
        $placa = 'XYZ789';
        $empleado = 'Ana Rodriguez';
        $idTarifa = 2;
        $espacio = 3;

        // Realiza la prueba
        $resultado = $handler->modificarServicio($idServicio, $placa, $empleado, $idTarifa, $espacio);

        // Verifica que la modificación sea exitosa
        $this->assertTrue($resultado);
    }

    public function testModificarServicioFallido()
    {
        $handler = new ModificarServicio();

        // Simula datos del formulario con información insuficiente
        $idServicio = 1;
        $placa = 'XYZ789';
        $empleado = 'Ana Rodriguez';
        $idTarifa = 2;

        // Realiza la prueba
        $resultado = $handler->modificarServicio($idServicio, $placa, $empleado, $idTarifa, null);

        // Verifica que la modificación sea fallida
        $this->assertFalse($resultado);
    }
}
