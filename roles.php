<?php  include 'Static/connect/db.php';

function esAdmin($usuario) {
    global $con; // Usar la conexión a la base de datos

    // Consulta para obtener la categoría del usuario
    $query = "SELECT categoria FROM usuarios WHERE usuario = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['categoria'] === 'Admin'; // Retorna true si es admin
    } else {
        return false; // Usuario no encontrado
    }
}

function esUser($usuario) {
    global $con; // Usar la conexión a la base de datos

    // Consulta para obtener la categoría del usuario
    $query = "SELECT categoria FROM usuarios WHERE usuario = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['categoria'] === 'Usuario'; // Retorna true si es usuario
    } else {
        return false; // Usuario no encontrado
    }
}
?>
