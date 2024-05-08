<?php
// Verificar si se recibieron los datos necesarios
if (
    isset($_POST['id']) &&
    isset($_POST['nombre']) &&
    isset($_POST['celular']) &&
    isset($_POST['tipoDocumento']) &&
    isset($_POST['documento']) &&
    isset($_POST['userName']) &&
    isset($_POST['contrasena'])
) {
    $idAdmin = $_POST['id'];
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

    // Ejecutar consulta UPDATE para modificar el registro
    $sql = "UPDATE admin SET
            nombre = '$nombre',
            celular = '$celular',
            tipoDocumento = '$tipoDocumento',
            documento = '$documento',
            userName = '$userName',
            contrasena = '$contrasena'
            WHERE id = $idAdmin";

    if ($conn->query($sql) === TRUE) {
        // Enviar respuesta de éxito
        echo "El administrador ha sido modificado exitosamente.";
        $_SESSION['session_id'] = $idAdmin;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['userName'] = $userName;
    } else {
        // Enviar respuesta de error
        echo "Error al modificar el administrador: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Enviar respuesta de error si no se recibieron los datos necesarios
    echo "Datos insuficientes para modificar el administrador. Regresa y asegúrate de llenar todos los campos.";
}
?>