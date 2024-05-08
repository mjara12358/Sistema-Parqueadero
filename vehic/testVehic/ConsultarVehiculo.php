<?php

class ConsultarVehiculo
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function consultarVehiculos()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consultar la información de la tabla Vehiculo junto con los nombres de los empleados
        $sqlVehiculo = "SELECT Vehiculo.*, Empleado.nombres AS nombresEmpleado 
                       FROM Vehiculo
                       INNER JOIN Empleado ON Vehiculo.idEmpleado = Empleado.id";

        $resultVehiculo = $conn->query($sqlVehiculo);

        $vehiculos = array();

        if ($resultVehiculo->num_rows > 0) {
            while ($row = $resultVehiculo->fetch_assoc()) {
                $vehiculos[] = $row;
            }
        }

        $conn->close();

        return $vehiculos;
    }
}
