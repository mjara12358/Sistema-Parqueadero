<?php

class ModificarVehiculo
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function modificarVehiculo($idVehiculo, $placa, $tipoVehiculo, $idEmpleado)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta UPDATE para modificar el registro del vehículo
        $sql = "UPDATE Vehiculo SET
                placa = '$placa',
                tipoVehiculo = '$tipoVehiculo',
                idEmpleado = $idEmpleado
                WHERE id = $idVehiculo";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return "El vehículo ha sido modificado exitosamente.";
        } else {
            // Cerrar la conexión
            $conn->close();

            return "Error al modificar el vehículo: " . $conn->error;
        }
    }
}
