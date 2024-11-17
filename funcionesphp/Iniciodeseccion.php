<?php
session_start(); // Iniciar sesión

// Conexión a la base de datos
$host = 'localhost';
$db = 'pandora_ravangers';
$user = 'root';  // Tu usuario de MySQL
$pass = '';      // Tu contraseña de MySQL

$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios_registrados WHERE nombre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el usuario existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Almacenar información del usuario en la sesión
            $_SESSION['username'] = $user['nombre'];
            header("Location: fhttp://localhost/Paginapandora/index2.html"); // Redirigir a la página de usuarios registrados
            exit;
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}

$conn->close();
?>