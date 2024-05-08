<?php

use PHPUnit\Framework\TestCase;

require_once 'admin/testAdmin/RegistrarAdmin.php';

class RegistrarAdminTest extends TestCase
{
    public function testRegistrarAdmin()
    {
        $nombre = "NuevoNombre";
        $celular = "NuevoCelular";
        $tipoDocumento = "NuevoTipoDocumento";
        $documento = "NuevoDocumento";
        $userName = "NuevoUserName";
        $contrasena = "NuevaContrasena";

        $handler = new RegistrarAdmin();
        $result = $handler->registrarAdmin($nombre, $celular, $tipoDocumento, $documento, $userName, $contrasena);

        // Verifica que la operación de registro haya sido exitosa
        $this->assertTrue($result);

    }
}
