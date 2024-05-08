<?php

class RegistrarTarifa
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function registrarTarifa($tipoTarifa, $valorHora, $tipoVehiculo)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta INSERT para registrar una nueva tarifa
        $sql = "INSERT INTO Tarifa (tipoTarifa, valorHora, tipoVehiculo)
                VALUES ('$tipoTarifa', $valorHora, '$tipoVehiculo')";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return "La tarifa ha sido registrada exitosamente.";
        } else {
            // Cerrar la conexión
            $conn->close();

            return "Error al registrar la tarifa: " . $conn->error;
        }
    }
}
