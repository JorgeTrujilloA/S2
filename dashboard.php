<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fet";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos enviados por el usuario
$user_input = $_POST['username'];

// Construir la consulta SQL vulnerable
$sql = "SELECT * FROM users WHERE name = '$user_input'";


// Ejecutar la consulta
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de la consulta
    $entrada  = 'ok';
} else {
    header('Location: index.html');
    die();
}

// Cerrar la conexión
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="logo">
                
            </div>
            <ul>
                <?php
                if($entrada == 'ok')
                {
                ?>
                <li><a href="http://109.233.191.130:8090">Camara 1</a></li>
                <li><a href="http://92.249.172.220:8080">Camara 2</a></li>
                <li><a href="http://72.220.85.93:8080">Camara 3</a></li>
                <li><a href="http://58.188.42.111:8008">Camara 4</a></li>
                <li><a href="http://175.208.29.47:8087">Camara 5</a></li>
                <?php  
                } else{
                ?>
                <li><a href="index.html">Inicio</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
        <div class="main-content">
            <header>
                <h1>Encuentra la pista</h1>
                <div class="user-info">
                    <img src="https://via.placeholder.com/40" alt="User Avatar">
                    <span>Admin</span>
                </div>
            </header>
            <section class="cards">

                <?php
                if($entrada == 'ok')
                {
                ?>
                <div class="card">
                    <h2>Descifra el Archivo</h2>
                    <a href="desencriptame.txt" download>Descargar</a>
                </div>
                <?php  
                } else {
                ?>
                <h1> Creo que tomaste el camino equivocado...</h1>
                <?php
                }
                ?>
            </section>
        </div>
    </div>
</body>
</html>
