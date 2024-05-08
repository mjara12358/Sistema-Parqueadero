<?php

class ModificarEmpleado
{
    private $servername = "127.0.0.1";
    private $database = "parqueadero";
    private $username = "root";
    private $password = "";
    private $port = 3306;

    public function modificarEmpleado($idEmpleado, $nombres, $apellidos, $telefono, $tipoDocumento, $numeroDocumento)
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        // Ejecutar consulta UPDATE para modificar el registro de empleado
        $sql = "UPDATE Empleado SET
                nombres = '$nombres',
                apellidos = '$apellidos',
                telefono = '$telefono',
                tipoDocumento = '$tipoDocumento',
                numeroDocumento = '$numeroDocumento'
                WHERE id = $idEmpleado";

        if ($conn->query($sql) === TRUE) {
            $resultado = "El empleado ha sido modificado exitosamente.";
        } else {
            $resultado = "Error al modificar el empleado: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();

        return $resultado;
    }
}
