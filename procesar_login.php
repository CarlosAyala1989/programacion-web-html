<?php
session_start(); // Iniciar sesión

// Conexión a la base de datos
$servername = "mysql1002.site4now.net";
$username = "ab6c84_web";
$password = "carlos60005";
$database = "db_ab6c84_web";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = trim($_POST['usuario']);
$contrasena = trim($_POST['contrasena']);

// Consulta SQL corregida
$sql = "SELECT id, contrasena FROM logins_administradores WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    
    // Verificar si la contraseña es correcta (sin encriptar)
    if ($contrasena === $fila['contrasena']) {
        // Almacenar sesión y redirigir
        $_SESSION['admin_id'] = $fila['id'];
        $_SESSION['usuario'] = $usuario;
        header("Location: principal.php");
        exit();
    } else {
        echo "Error: Usuario o contraseña incorrectos.";
    }
} else {
    echo "Error: Usuario no encontrado.";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
