<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../html/intranet.html");
    exit();
}

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

// Obtener datos de la tabla contactos
$sql = "SELECT * FROM contactos ORDER BY id DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - TechDev Solutions</title>
    <link rel="stylesheet" href="../css/index-intranet.css">
</head>
<body>

<header>
    <h1>Panel de Administrador</h1>
    <nav>
        <ul>
            <li><a href="principal.php">Inicio</a></li>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>

<section>
    <h2>Mensajes Recibidos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Ubicación</th>
                <th>Empresa</th>
                <th>Puesto</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['apellido_paterno']; ?></td>
                    <td><?php echo $fila['apellido_materno']; ?></td>
                    <td><?php echo $fila['correo_electronico']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['ubicacion']; ?></td>
                    <td><?php echo $fila['empresa'] ? $fila['empresa'] : 'N/A'; ?></td>
                    <td><?php echo $fila['puesto'] ? $fila['puesto'] : 'N/A'; ?></td>
                    <td><?php echo $fila['mensaje']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>

<footer>
    <p>&copy; 2025 TechDev Solutions</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>
