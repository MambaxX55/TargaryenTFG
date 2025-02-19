<?php
$servername = "localhost";
$username = "raenyra";   
$password = "syrax44";       
$dbname = "proyecto_westeros"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT 
    u.nombreUsuario,
    u.email,
    c.texto
FROM 
    Comentario c
INNER JOIN 
    MiembroEquipo me ON c.idUsuario = me.idUsuario
INNER JOIN 
    Usuario u ON me.idUsuario = u.idUsuario
INNER JOIN 
    Equipo e ON me.idEquipo = e.idEquipo
WHERE 
    e.nombreEquipo = 'Negro';
";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users[] = [
            'nombreUsuario' => $row['nombreUsuario'],
            'email' => $row['email'],
            'texto' => $row['texto']
        ];
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($users);
?>