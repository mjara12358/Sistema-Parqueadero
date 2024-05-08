<?php

class EliminarEmpleado
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function eliminarEmpleado($idEmpleado)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        // Ejecutar consulta DELETE para eliminar el registro
        $sql = "DELETE FROM Empleado WHERE id = $idEmpleado";

        if ($conn->query($sql) === TRUE) {
            $resultado = "El empleado ha sido eliminado exitosamente.";
        } else {
            $resultado = "Error al eliminar el empleado: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();

        return $resultado;
    }
}
