<?php

class RegistrarServicio
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function registrarServicio($placa, $empleado, $fechaEntrada, $idTarifa, $espacio)
    {
        // Establecer conexión con la base de datos
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta INSERT para registrar un nuevo servicio
        $sql = "INSERT INTO Servicio (placa, empleado, fechaEntrada, idTarifa, espacio)
                VALUES ('$placa', '$empleado', '$fechaEntrada', $idTarifa, $espacio)";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return true; // Registro exitoso
        } else {
            // Cerrar la conexión
            $conn->close();

            return false; // Error al registrar el servicio
        }
    }
}
