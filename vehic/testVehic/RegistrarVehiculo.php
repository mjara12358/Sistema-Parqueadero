<?php

class RegistrarVehiculo
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function registrarVehiculo($placa, $tipoVehiculo, $idEmpleado)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta INSERT para registrar un nuevo vehículo
        $sql = "INSERT INTO Vehiculo (placa, tipoVehiculo, idEmpleado)
                VALUES ('$placa', '$tipoVehiculo', $idEmpleado)";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return "El vehículo ha sido registrado exitosamente.";
        } else {
            // Cerrar la conexión
            $conn->close();

            return "Error al registrar el vehículo: " . $conn->error;
        }
    }
}
