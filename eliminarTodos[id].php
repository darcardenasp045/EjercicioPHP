<?php
header("Content-Type: application/json");

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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para eliminar un registro específico por su ID
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["mensaje" => "Registro eliminado con éxito"]);
    } else {
        echo json_encode(["error" => "Error al eliminar el registro: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Se requiere un parámetro 'id' en la URL"]);
}

// Cerrar la conexión
$conn->close();
?>
