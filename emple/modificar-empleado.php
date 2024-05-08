<?php
// Verificar si se recibieron los datos necesarios para modificar el empleado
if (
    isset($_POST['idEmpleado']) &&
    isset($_POST['nombres']) &&
    isset($_POST['apellidos']) &&
    isset($_POST['telefono']) &&
    isset($_POST['tipoDocumento']) &&
    isset($_POST['numeroDocumento']
)) {
    $idEmpleado = $_POST['idEmpleado'];
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

    // Ejecutar consulta UPDATE para modificar el registro de empleado
    $sql = "UPDATE Empleado SET
            nombres = '$nombres',
            apellidos = '$apellidos',
            telefono = '$telefono',
            tipoDocumento = '$tipoDocumento',
            numeroDocumento = '$numeroDocumento'
            WHERE id = $idEmpleado";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El empleado ha sido modificado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al modificar el empleado: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para modificar el empleado. Regresa y asegúrate de llenar todos los campos";
}
?>
