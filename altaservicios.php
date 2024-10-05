<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>

<?php session_start(); ?>	
	
<?php
    $usuario = $_SESSION['usuario'];
    if(isset($usuario)){
        $servicio = $_POST['nombre'];
        $precio = $_POST['precio'];

        $sql="insert into servicios (nombre, precio) values ('$servicio', $precio);";
        $execute = mysqli_query($con, $sql);
        sleep(3);
        header('Location: create.php');
    }else{
        header('Location: login.php');
    }
?>

<?php  include 'includes/footer.php'; ?>