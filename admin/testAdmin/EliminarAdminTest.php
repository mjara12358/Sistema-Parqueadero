<?php

use PHPUnit\Framework\TestCase;

require_once 'admin/testAdmin/EliminarAdmin.php';

class EliminarAdminTest extends TestCase
{
    public function testDeleteAdmin()
    {
        // Suponiendo que se deseas eliminar el administrador con ID 4
        $idAdminToDelete = 4;

        $handler = new EliminarAdmin();
        $result = $handler->deleteAdmin($idAdminToDelete);

        // Verifica que la operación de eliminación haya sido exitosa
        $this->assertTrue($result);

    }
}
