<?php

// Conexión a la base de datos
$host = 'localhost';
$db = 'pandora_ravangers';
$user = 'root';  // Tu usuario de MySQL
$pass = '';      // Tu contraseña de MySQL

$conn = new mysqli($host, $user, $pass, $db);

// if ($conn->connect_error) {
//     die("Conexión fallida: " . $conn->connect_error);
// } else {
//     echo "Conexión exitosa";
// }
