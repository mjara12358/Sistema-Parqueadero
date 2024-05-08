<?php

use PHPUnit\Framework\TestCase;

require_once 'emple/testEmple/EliminarEmpleado.php';

class EliminarEmpleadoTest extends TestCase
{
    public function testEliminarEmpleado()
    {
        $handler = new EliminarEmpleado();
        $idEmpleado = 4; // Proporciona un ID de empleado válido 

        $resultado = $handler->eliminarEmpleado($idEmpleado);

        // Verifica que la eliminación haya sido exitosa
        $this->assertEquals("El empleado ha sido eliminado exitosamente.", $resultado);

    }
}
