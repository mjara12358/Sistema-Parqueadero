<?php
if (
    isset($_POST['nombre']) &&
    isset($_POST['celular']) &&
    isset($_POST['tipoDocumento']) &&
    isset($_POST['documento']) &&
    isset($_POST['userName']) &&
    isset($_POST['contrasena'])
) {
    $nombre = $_POST['nombre'];
    $celular = $_POST['celular'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $documento = $_POST['documento'];
    $userName = $_POST['userName'];
    $contrasena = $_POST['contrasena'];

    // Establecer conexión con la base de datos
    $conn = new mysqli("localhost", "root", "", "parqueadero");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Ejecutar consulta INSERT para registrar el nuevo administrador
    $sql = "INSERT INTO admin(nombre, celular, tipoDocumento, documento, userName, contrasena)
            VALUES ('$nombre', '$celular', '$tipoDocumento', '$documento', '$userName', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El administrador ha sido registrado exitosamente.";
    } else {
        // Enviar respuesta de error
        echo "Error al registrar el administrador: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para registrar el administrador. Regresa y asegúrate de llenar todos los campos.";
}
?>