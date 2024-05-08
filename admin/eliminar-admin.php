<?php
// Verificar si se proporcionó un ID válido
if (isset($_GET['idAdmin'])) {
    $idAdmin = $_GET['idAdmin'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta DELETE para eliminar el registro
    $sql = "DELETE FROM admin WHERE id = $idAdmin";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El administrador ha sido eliminado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al eliminar el administrador: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se proporcionó un ID válido
    echo "Identificador de administrador no proporcionado.";
}
?>