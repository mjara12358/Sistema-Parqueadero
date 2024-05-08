<?php

class ModificarAdmin
{
    private $servername = "localhost";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function modificarAdmin($idAdmin, $nombre, $celular, $tipoDocumento, $documento, $userName, $contrasena)
    {
        $conn = new mysqli('127.0.0.1', $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "UPDATE admin SET
                nombre = '$nombre',
                celular = '$celular',
                tipoDocumento = '$tipoDocumento',
                documento = '$documento',
                userName = '$userName',
                contrasena = '$contrasena'
                WHERE id = $idAdmin";

        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }
}
