<?php
// Verificar si se recibieron los datos necesarios para modificar el servicio
if (
    isset($_POST['idServicio']) &&
    isset($_POST['placa']) &&
    isset($_POST['empleado']) &&
    isset($_POST['idTarifa']) &&
    isset($_POST['espacio'])
) {
    $idServicio = $_POST['idServicio'];
    $placa = $_POST['placa'];
    $empleado = $_POST['empleado'];
    $idTarifa = $_POST['idTarifa'];
    $espacio = $_POST['espacio'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta UPDATE para modificar el registro del servicio
    $sql = "UPDATE Servicio SET
            placa = '$placa',
            empleado = '$empleado',
            idTarifa = $idTarifa,
            espacio = $espacio
            WHERE id = $idServicio";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El servicio ha sido modificado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al modificar el servicio: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para modificar el servicio. Regresa y asegúrate de llenar todos los campos";
}
?>
