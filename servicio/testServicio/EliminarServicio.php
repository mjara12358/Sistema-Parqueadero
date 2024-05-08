<?php

class EliminarServicio
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function eliminarServicio($idServicio)
    {
        // Establecer conexión con la base de datos
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta DELETE para eliminar el registro del servicio
        $sql = "DELETE FROM Servicio WHERE id = $idServicio";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return true; // Eliminación exitosa
        } else {
            // Cerrar la conexión
            $conn->close();

            return false; // Error al eliminar el servicio
        }
    }
}
