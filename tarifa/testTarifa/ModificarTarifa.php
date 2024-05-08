<?php

class ModificarTarifa
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function modificarTarifa($idTarifa, $tipoTarifa, $valorHora, $tipoVehiculo)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta UPDATE para modificar el registro de la tarifa
        $sql = "UPDATE Tarifa SET
                tipoTarifa = '$tipoTarifa',
                valorHora = $valorHora,
                tipoVehiculo = '$tipoVehiculo'
                WHERE id = $idTarifa";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return "La tarifa ha sido modificada exitosamente.";
        } else {
            // Cerrar la conexión
            $conn->close();

            return "Error al modificar la tarifa: " . $conn->error;
        }
    }
}
