<?php

use PHPUnit\Framework\TestCase;

require_once 'tarifa/testTarifa/RegistrarTarifa.php'; 

class RegistrarTarifaTest extends TestCase
{
    public function testRegistrarTarifa()
    {
        $handler = new RegistrarTarifa();

        $resultado = $handler->registrarTarifa('Tipo A', 10, 'Automóvil');

        // Verifica que la respuesta sea exitosa
        $this->assertEquals("La tarifa ha sido registrada exitosamente.", $resultado);

    }
}
