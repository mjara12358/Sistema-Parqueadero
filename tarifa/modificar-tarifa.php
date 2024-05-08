<?php
// Verificar si se recibieron los datos necesarios para modificar la tarifa
if (
    isset($_POST['idTarifa']) &&
    isset($_POST['tipoTarifa']) &&
    isset($_POST['valorHora']) &&
    isset($_POST['tipoVehiculo']
)) {
    $idTarifa = $_POST['idTarifa'];
    $tipoTarifa = $_POST['tipoTarifa'];
    $valorHora = $_POST['valorHora'];
    $tipoVehiculo = $_POST['tipoVehiculo'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta UPDATE para modificar el registro de la tarifa
    $sql = "UPDATE Tarifa SET
            tipoTarifa = '$tipoTarifa',
            valorHora = $valorHora,
            tipoVehiculo = '$tipoVehiculo'
            WHERE id = $idTarifa";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "La tarifa ha sido modificada exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al modificar la tarifa: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para modificar la tarifa. Regresa y asegúrate de llenar todos los campos";
}
?>
