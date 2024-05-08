<?php

class ModificarServicio
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function modificarServicio($idServicio, $placa, $empleado, $idTarifa, $espacio)
    {
        // Establecer conexión con la base de datos
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta UPDATE para modificar el registro del servicio
        $sql = "UPDATE Servicio SET
            placa = '$placa',
            empleado = '$empleado',
            idTarifa = $idTarifa,
            espacio = $espacio
            WHERE id = $idServicio";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return true; // Modificación exitosa
        } else {
            // Cerrar la conexión
            $conn->close();

            return false; // Error al modificar el servicio
        }
    }
}
