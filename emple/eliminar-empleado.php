<?php
// Verificar si se proporcionó un ID válido
if (isset($_GET['idEmpleado'])) {
    $idEmpleado = $_GET['idEmpleado'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta DELETE para eliminar el registro
    $sql = "DELETE FROM Empleado WHERE id = $idEmpleado";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El empleado ha sido eliminado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al eliminar el empleado: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se proporcionó un ID válido
    echo "Identificador de registro no proporcionado.";
}
?>
