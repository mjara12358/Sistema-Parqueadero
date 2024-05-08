<?php

class ConsultarTarifas
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function consultarTarifas()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        // Consultar la información de la tabla Tarifa
        $sqlTarifa = "SELECT * FROM Tarifa";
        $resultTarifa = $conn->query($sqlTarifa);

        $tarifas = array();

        if ($resultTarifa->num_rows > 0) {
            while ($row = $resultTarifa->fetch_assoc()) {
                $tarifas[] = $row;
            }
        }

        // Cerrar la conexión
        $conn->close();

        return $tarifas;
    }
}
