<?php

class ConsultarEmpleados
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function getEmpleados()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        $sqlEmpleado = "SELECT * FROM Empleado";
        $resultEmpleado = $conn->query($sqlEmpleado);

        $empleados = array();

        if ($resultEmpleado->num_rows > 0) {
            while ($row = $resultEmpleado->fetch_assoc()) {
                $empleados[] = $row;
            }
        }

        $conn->close();

        return $empleados;
    }
}
