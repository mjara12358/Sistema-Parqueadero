<?php

class EliminarAdmin
{
    private $servername = "localhost";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function deleteAdmin($idAdmin)
    {
        $conn = new mysqli('127.0.0.1', $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta DELETE para eliminar el administrador por ID
        $sql = "DELETE FROM admin WHERE id = $idAdmin";

        $result = $conn->query($sql);

        // Cerrar la conexión
        $conn->close();

        return $result;
    }
}
