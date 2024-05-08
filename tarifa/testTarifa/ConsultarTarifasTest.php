<?php

use PHPUnit\Framework\TestCase;

require_once 'tarifa/testTarifa/ConsultarTarifas.php'; 

class ConsultarTarifasTest extends TestCase
{
    public function testConsultarTarifas()
    {
        $handler = new ConsultarTarifas();

        $resultados = $handler->consultarTarifas();

        // Verifica que la consulta haya devuelto resultados
        $this->assertNotEmpty($resultados);

    }
}
