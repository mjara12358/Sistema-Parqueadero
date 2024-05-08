<?php

use PHPUnit\Framework\TestCase;

require_once 'servicio/testServicio/RegistrarServicio.php';

class RegistrarServicioTest extends TestCase
{
    public function testRegistrarServicioExitoso()
    {
        $handler = new RegistrarServicio();

        // Simula datos del formulario
        $placa = 'KKK879';
        $empleado = 'Mile Ross';
        $fechaEntrada = '2023-01-01 10:00:00';
        $idTarifa = 1;
        $espacio = 1;

        // Realiza la prueba
        $resultado = $handler->registrarServicio($placa, $empleado, $fechaEntrada, $idTarifa, $espacio);

        // Verifica que el registro sea exitoso
        $this->assertTrue($resultado);
    }

    public function testRegistrarServicioFallido()
    {
        $handler = new RegistrarServicio();

        // Simula datos del formulario con información insuficiente
        $placa = 'BBB098';
        $empleado = 'Pedro Villa';
        $fechaEntrada = '2023-01-01 10:00:00';
        $idTarifa = 1;

        // Realiza la prueba
        $resultado = $handler->registrarServicio($placa, $empleado, $fechaEntrada, $idTarifa, null);

        // Verifica que el registro sea fallido
        $this->assertFalse($resultado);
    }
}
