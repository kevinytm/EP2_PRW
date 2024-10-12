<?php include 'Static/connect/db.php'; ?>
<?php
    
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];

    $contrasena = $usuario . $apellido;  
    
    $to = $correo;
    $subject = "Credenciales para tu cuenta en BarberShop.";
    $message = "Usuario: " . $usuario . "\nContraseña: " . $contrasena;
    $headers = 'From: kevinyahirt@gmail.com'."\r\n".
    'Reply-To: kevinyahirt@gmail.com';

    if(mail($to,$subject,$message,$headers)){
        $sql = "INSERT INTO usuarios (usuario, contrasena, nombre, apellido, correo, categoria) 
            VALUES ('$usuario', '$contrasena', '$nombre', '$apellido', '$correo', 'Usuario');";

        $execute = mysqli_query($con, $sql);
        if (!$execute) {
            die("Error al insertar los datos: " . mysqli_error($con));
        }

        sleep(3);
        header('Location: login.php');
    }else{
        header('Location: index.php');
        exit();
    }

   
?>


