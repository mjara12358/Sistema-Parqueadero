<?php

use PHPUnit\Framework\TestCase;

require_once 'servicio/testServicio/ConsultarServicio.php'; 

class ConsultarServicioTest extends TestCase
{
    public function testConsultarServicios()
    {
        $handler = new ConsultarServicio();

        $servicios = $handler->consultarServicios();

        // Verifica que la consulta haya devuelto resultados
        $this->assertNotEmpty($servicios);

    }
}
