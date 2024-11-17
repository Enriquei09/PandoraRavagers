<?php
ob_start(); // Iniciar almacenamiento en búfer de salida

require_once "conexion.php";

$response = array(); // Crear un array para la respuesta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo_electronico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $response['status'] = 'success';
            $response['message'] = 'Bienvenido!';
            $response['redirect'] = 'index2usuario.html'; // URL para redireccionar
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Contraseña incorrecta. Por favor, intenta de nuevo.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No existe ninguna cuenta con ese correo.';
    }

    echo json_encode($response); // Devolver respuesta en formato JSON

    $stmt->close();
}

$conn->close();
ob_end_flush(); // Enviar el contenido de salida 