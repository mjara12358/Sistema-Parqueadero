<?php

use PHPUnit\Framework\TestCase;

require_once 'tarifa/testTarifa/EliminarTarifa.php'; 

class EliminarTarifaTest extends TestCase
{
    public function testEliminarTarifa()
    {
        $handler = new EliminarTarifa();
        $idTarifa = 6; // Proporciona un ID de tarifa válido

        $resultado = $handler->eliminarTarifa($idTarifa); 

        // Verifica que la respuesta sea exitosa
        $this->assertEquals("La tarifa ha sido eliminada exitosamente.", $resultado);

    }
}
