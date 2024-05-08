<?php

class ConsultarServicio
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function consultarServicios()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        // Consultar la información de la tabla Servicio
        $sqlServicio = "SELECT Servicio.*, 
                        Tarifa.tipoTarifa AS tipoTarifa, Tarifa.valorHora AS valorTarifa
                        FROM Servicio
                        INNER JOIN Tarifa ON Servicio.idTarifa = Tarifa.id";

        $resultServicio = $conn->query($sqlServicio);

        $servicios = array();

        if ($resultServicio->num_rows > 0) {
            while ($row = $resultServicio->fetch_assoc()) {
                $servicios[] = $row;
            }
        }

        // Cerrar la conexión
        $conn->close();

        return $servicios;
    }
}
