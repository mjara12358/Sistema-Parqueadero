<?php

class RegistrarTicket
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function registrarTicket($placa, $tipoVehiculo, $empleado, $documento, $fechaEntrada, $fechaSalida, $tarifa, $total)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Ejecutar consulta INSERT para registrar un nuevo ticket
        $sql = "INSERT INTO Ticket (placa, tipoVehiculo, empleado, documento, fechaEntrada, fechaSalida, tarifa, total)
                VALUES ('$placa', '$tipoVehiculo', '$empleado', '$documento', '$fechaEntrada', '$fechaSalida', '$tarifa', $total)";

        if ($conn->query($sql) === TRUE) {
            // Cerrar la conexión
            $conn->close();

            return "El ticket ha sido registrado exitosamente.";
        } else {
            // Cerrar la conexión
            $conn->close();

            return "Error al registrar el ticket: " . $conn->error;
        }
    }
}
