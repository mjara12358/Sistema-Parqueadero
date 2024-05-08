<?php

use PHPUnit\Framework\TestCase;

require_once 'admin/testAdmin/ModificarAdmin.php';

class ModificarAdminTest extends TestCase
{
    public function testModificarAdmin()
    {
        // Suponiendo que se deseas modificar el administrador con ID 5 
        $idAdmin = 5;
        $nombre = "NuevoNombre";
        $celular = "NuevoCelular";
        $tipoDocumento = "NuevoTipoDocumento";
        $documento = "NuevoDocumento";
        $userName = "NuevoUserName";
        $contrasena = "NuevaContrasena";

        $handler = new ModificarAdmin();
        $result = $handler->modificarAdmin($idAdmin, $nombre, $celular, $tipoDocumento, $documento, $userName, $contrasena);

        // Verifica que la operación de modificación haya sido exitosa
        $this->assertTrue($result);

    }
}
