<?php
// Verificar si se recibieron los datos necesarios para registrar un nuevo empleado
if (
    isset($_POST['nombres']) &&
    isset($_POST['apellidos']) &&
    isset($_POST['telefono']) &&
    isset($_POST['tipoDocumento']) &&
    isset($_POST['numeroDocumento'])
) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $numeroDocumento = $_POST['numeroDocumento'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta INSERT para registrar un nuevo empleado
    $sql = "INSERT INTO Empleado (nombres, apellidos, telefono, tipoDocumento, numeroDocumento)
            VALUES ('$nombres', '$apellidos', $telefono, '$tipoDocumento', '$numeroDocumento')";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El empleado ha sido registrado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al registrar el empleado: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para registrar el empleado. Regresa y asegúrate de llenar todos los campos";
}
?>
