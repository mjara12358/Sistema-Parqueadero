<?php

use PHPUnit\Framework\TestCase;

require_once 'tarifa/testTarifa/ModificarTarifa.php';

class ModificarTarifaTest extends TestCase
{
    public function testModificarTarifa()
    {
        $handler = new ModificarTarifa();

        $resultado = $handler->modificarTarifa(6, 'Tipo B', 15, 'Motocicleta');

        // Verifica que la respuesta sea exitosa
        $this->assertEquals("La tarifa ha sido modificada exitosamente.", $resultado);

    }
}
