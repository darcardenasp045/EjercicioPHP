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

// Obtener el ID de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener un registro específico por su ID
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["mensaje" => "No se encontró el registro con ID $id"]);
    }
} else {
    echo json_encode(["error" => "Se requiere un parámetro 'id' en la URL"]);
}

// Cerrar la conexión
$conn->close();
?>
