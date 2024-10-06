<?php include 'Static/connect/db.php'; ?>
<?php
    session_start();
    $usuario = $_SESSION['usuario']; 
    if (isset($usuario)){

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

        $sql = "INSERT INTO usuarios (usuario, contrasena, nombre, apellido, correo, categoria) 
                VALUES ('$usuario', '$contrasena', '$nombre', '$apellido', '$correo', 'Usuario');";

        $execute = mysqli_query($con, $sql);
        if (!$execute) {
            die("Error al insertar los datos: " . mysqli_error($con));
        }
        sleep(3);
        if (mail($to, $subject, $message, $headers)) {
            echo "Se han enviado los datos a tu correo.";
        } else {
            header('Location: index.php');
            exit();
        }
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php');
        exit();
    }
?>


