<?php

class RegistrarEmpleado
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function registrarEmpleado($nombres, $apellidos, $telefono, $tipoDocumento, $numeroDocumento)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        // Ejecutar consulta INSERT para registrar un nuevo empleado
        $sql = "INSERT INTO Empleado (nombres, apellidos, telefono, tipoDocumento, numeroDocumento)
                VALUES ('$nombres', '$apellidos', $telefono, '$tipoDocumento', '$numeroDocumento')";

        if ($conn->query($sql) === TRUE) {
            $resultado = "El empleado ha sido registrado exitosamente.";
        } else {
            $resultado = "Error al registrar el empleado: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();

        return $resultado;
    }
}
