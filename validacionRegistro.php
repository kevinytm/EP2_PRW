
<?php  include 'Static/connect/db.php'?>

<?php


// Verificar si la conexión falla
if (!$con) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $usuario . $apellido;  

    $to = $correo;
    $subject = "Credenciales para tu cuenta";
    $message = "Usuario: " . $usuario . "\nContraseña: " . $contrasena;
    $headers = "From: kevinyahirt@gmail.com\r\n";
    $headers .= "Reply-To: kevinyahirt@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Consulta SQL corregida
    $sql = "INSERT INTO usuarios (usuario, contrasena, nombre, apellido, correo, categoria) 
            VALUES ('$usuario', '$contrasena', '$nombre', '$apellido', '$correo', 'Usuario');";

    $execute = mysqli_query($con, $sql);

    // Verificar si la consulta SQL tuvo éxito
    if (!$execute) {
        die("Error al insertar los datos: " . mysqli_error($con));  // Mostrar el error si ocurre
    }

    sleep(3);  // Pausa de 3 segundos

    if (mail($to, $subject, $message, $headers)) {
        echo "Se han enviado los datos a tu correo.";
    } else {
        header('Location: index.php');
        exit();  // Detener la ejecución después de la redirección
    }

    // Redirigir después de la operación exitosa
    header('Location: index.php');
    exit();  // Detener la ejecución después de la redirección
?>

