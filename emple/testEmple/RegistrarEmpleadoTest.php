<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'emple/testEmple/RegistrarEmpleado.php';

class RegistrarEmpleadoTest extends TestCase
{
    public function testRegistrarEmpleado()
    {
        $handler = new RegistrarEmpleado();
        $nombres = "NombreTest";
        $apellidos = "ApellidoTest";
        $telefono = 123456789; // Proporciona un número de teléfono válido
        $tipoDocumento = "TipoDocumentoTest";
        $numeroDocumento = "NumeroDocumentoTest";

        $resultado = $handler->registrarEmpleado($nombres, $apellidos, $telefono, $tipoDocumento, $numeroDocumento);

        // Verifica que el registro haya sido exitoso
        $this->assertEquals("El empleado ha sido registrado exitosamente.", $resultado);

    }
}
