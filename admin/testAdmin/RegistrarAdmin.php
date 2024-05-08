<?php

class RegistrarAdmin
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function registrarAdmin($nombre, $celular, $tipoDocumento, $documento, $userName, $contrasena)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "INSERT INTO admin(nombre, celular, tipoDocumento, documento, userName, contrasena)
                VALUES ('$nombre', '$celular', '$tipoDocumento', '$documento', '$userName', '$contrasena')";

        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }
}
