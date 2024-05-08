<?php

class ConsultarAdmin
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function getAdmins()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        $sqlAdmin = "SELECT * FROM admin";
        $resultAdmin = $conn->query($sqlAdmin);

        $admins = array();

        if ($resultAdmin->num_rows > 0) {
            while ($row = $resultAdmin->fetch_assoc()) {
                $admins[] = $row;
            }
        }

        $conn->close();

        return $admins;
    }
}
