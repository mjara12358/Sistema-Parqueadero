<?php

use PHPUnit\Framework\TestCase;

require_once 'emple/testEmple/ConsultarEmpleados.php';

class ConsultarEmpleadosTest extends TestCase
{
    public function testGetEmpleados()
    {
        $handler = new ConsultarEmpleados();
        $empleados = $handler->getEmpleados();

        // Verifica que la consulta haya devuelto resultados
        $this->assertNotEmpty($empleados);

    }
}
