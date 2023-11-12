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

// Obtener el ID de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener un registro específico por su ID
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);

    echo "<html><head><title>Resultado</title></head><body>";

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["apellido"] . "</td>
                    <td>" . $row["email"] . "</td>
                  </tr>";
        }

        echo "</table>";
        echo '<a href="/2771446G1/EjercicioPHP/index.html">Regresar al Home</a>';
    } else {
        echo "No hay registros en la base de datos.";
    }

    echo "</body></html>";
} else {
    echo "Se requiere un parámetro 'id' en la URL";
}

// Cerrar la conexión
$conn->close();
?>
