<?php
// Verificar si se recibieron los datos necesarios para registrar un nuevo servicio
if (
    isset($_POST['placa']) &&
    isset($_POST['empleado']) &&
    isset($_POST['fechaEntrada']) &&
    isset($_POST['idTarifa']) &&
    isset($_POST['espacio'])
) {
    $placa = $_POST['placa'];
    $empleado = $_POST['empleado'];
    $fechaEntrada = $_POST['fechaEntrada'];
    $idTarifa = $_POST['idTarifa'];
    $espacio = $_POST['espacio'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta INSERT para registrar un nuevo servicio
    $sql = "INSERT INTO Servicio (placa, empleado, fechaEntrada, idTarifa, espacio)
            VALUES ('$placa', '$empleado', '$fechaEntrada', $idTarifa, $espacio)";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El servicio ha sido registrado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al registrar el servicio: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para registrar el servicio. Regresa y asegúrate de llenar todos los campos";
}
?>
