<?php

class ConsultarTickets
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function consultarTickets()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consultar la información de la tabla Ticket, incluyendo los datos relacionados
        $sqlTicket = "SELECT * FROM Ticket";

        $resultTicket = $conn->query($sqlTicket);

        $tickets = array();

        if ($resultTicket->num_rows > 0) {
            while ($row = $resultTicket->fetch_assoc()) {
                $tickets[] = $row;
            }
        }

        // Cerrar la conexión
        $conn->close();

        return $tickets;
    }
}
