<?php
// Configuración de la conexión a MySQL
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "sabado11_11";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Consulta SQL para modificar el usuario
    $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario modificado con éxito";
    } else {
        echo "Error al modificar el usuario: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
