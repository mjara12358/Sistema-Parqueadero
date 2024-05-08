<?php

class EliminarVehiculo
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function eliminarVehiculo($idVehiculo)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta DELETE para eliminar el registro
        $sql = "DELETE FROM Vehiculo WHERE id = $idVehiculo";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return "El vehículo ha sido eliminado exitosamente.";
        } else {
            // Cerrar la conexión
            $conn->close();

            return "Error al eliminar el vehículo: " . $conn->error;
        }
    }
}
