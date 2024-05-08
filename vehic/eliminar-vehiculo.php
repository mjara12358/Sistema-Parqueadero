<?php
// Verificar si se proporcionó un ID válido
if (isset($_GET['idVehiculo'])) {
    $idVehiculo = $_GET['idVehiculo'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta DELETE para eliminar el registro
    $sql = "DELETE FROM Vehiculo WHERE id = $idVehiculo";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El vehículo ha sido eliminado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al eliminar el vehículo: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se proporcionó un ID válido
    echo "Identificador de registro no proporcionado.";
}
?>
