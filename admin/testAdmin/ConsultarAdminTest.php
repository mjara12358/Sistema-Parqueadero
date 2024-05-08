<?php

use PHPUnit\Framework\TestCase;

require_once 'admin/testAdmin/ConsultarAdmin.php';

class ConsultarAdminTest extends TestCase
{
    public function testGetAdmins()
    {
        $handler = new ConsultarAdmin();
        $admins = $handler->getAdmins();

        // Se Asegúra de que la consulta haya devuelto resultados
        $this->assertNotEmpty($admins);
    }
}
