<?php
ob_start(); // Iniciar almacenamiento en búfer de salida
require_once "conexion.php";

// Procesar el registro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, correo_electronico, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $password);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Bienvenido!';
        $response['redirect'] = 'http://localhost/pandora/login.html'; // URL para redireccionar
        //header("location:  ");
        //echo "Usuario registrado exitosamente.";
    } else { 
        $response['status'] = 'error';
        $response['message'] = 'Este existe una cuenta registrada con ese correo.';
        echo "Error al registrar: " . $conn->error;
    }
    echo json_encode($response); // Devolver respuesta en formato JSON
    $stmt->close();
}

$conn->close();
ob_end_flush(); // Enviar el contenido de salida 
