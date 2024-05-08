<?php
session_start();

// Cerrar sesión si ya existe una sesión activa
if (isset($_SESSION['session_id'])) {
    session_destroy();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar las credenciales ingresadas por el usuario
    $userName = $_POST['userName'];
    $contrasena = $_POST['password'];

    // Establecer la conexión a la base de datos
    $servername = "localhost";
    $database = "parqueadero";
    $username = "root";
    $password_db = "";
    $port = 3306;

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password_db, $database, $port);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    // Consultar las credenciales en la tabla "integrante"
    $sql = "SELECT * FROM admin WHERE userName = '$userName' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Obtener el nombre del usuario
        $row = $result->fetch_assoc();
        $exist = true;
        $idAdmin = $row['idAdmin'];
        $nombre = $row['nombre'];
        $userName = $row['userName'];

        // Iniciar sesión y redirigir al usuario a la página de inicio
        $_SESSION['idAdmin'] = $idAdmin;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['userName'] = $userName;
        //if ($rol == 2){ header("Location: admin.php"); exit(); }
        //header("Location: home.html");
        //exit();
    } else {
        // Mostrar un mensaje de error si las credenciales son incorrectas
        $error_message = "Cédula o contraseña incorrectos";
    }
    
    $conn->close();

    // Devolver los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($exist);
}
?>