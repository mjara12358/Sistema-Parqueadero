<?php
// Verificar si se recibieron los datos necesarios para registrar una nueva tarifa
if (
    isset($_POST['tipoTarifa']) &&
    isset($_POST['valorHora']) &&
    isset($_POST['tipoVehiculo']
)) {
    $tipoTarifa = $_POST['tipoTarifa'];
    $valorHora = $_POST['valorHora'];
    $tipoVehiculo = $_POST['tipoVehiculo'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta INSERT para registrar una nueva tarifa
    $sql = "INSERT INTO Tarifa (tipoTarifa, valorHora, tipoVehiculo)
            VALUES ('$tipoTarifa', $valorHora, '$tipoVehiculo')";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "La tarifa ha sido registrada exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al registrar la tarifa: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para registrar la tarifa. Regresa y asegúrate de llenar todos los campos";
}
?>
