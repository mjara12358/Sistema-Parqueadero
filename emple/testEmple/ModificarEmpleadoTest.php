<?php

use PHPUnit\Framework\TestCase;

require_once 'emple/testEmple/ModificarEmpleado.php'; 

class ModificarEmpleadoTest extends TestCase
{
    public function testModificarEmpleado()
    {
        $handler = new ModificarEmpleado();
        $idEmpleado = 4; // Proporciona un ID válido
        $nombres = "NuevoNombre";
        $apellidos = "NuevoApellido";
        $telefono = "NuevoTelefono";
        $tipoDocumento = "NuevoTipoDocumento";
        $numeroDocumento = "NuevoNumeroDocumento";

        $resultado = $handler->modificarEmpleado($idEmpleado, $nombres, $apellidos, $telefono, $tipoDocumento, $numeroDocumento);

        // Verifica que la modificación haya sido exitosa
        $this->assertEquals("El empleado ha sido modificado exitosamente.", $resultado);

    }
}
