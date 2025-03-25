<?php
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
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellidoPaterno'];
$apellido_materno = $_POST['apellidoMaterno'];
$correo_electronico = $_POST['correoElectronico'];
$telefono = $_POST['telefono'];
$ubicacion = $_POST['ubicacion'];
$empresa = $_POST['empresa'] ?? null;
$puesto = $_POST['puesto'] ?? null;
$mensaje = $_POST['mensaje'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO contactos (nombre, apellido_paterno, apellido_materno, correo_electronico, telefono, ubicacion, empresa, puesto, mensaje) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nombre, $apellido_paterno, $apellido_materno, $correo_electronico, $telefono, $ubicacion, $empresa, $puesto, $mensaje);

if ($stmt->execute()) {
    echo "<script>
            alert('Mensaje enviado satisfactoriamente.');
            window.location.href = '../html/contacto.html';
          </script>";
} else {
    echo "<script>
            alert('Error al enviar el mensaje. Inténtalo de nuevo.');
            window.location.href = '../html/contacto.html';
          </script>";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>

