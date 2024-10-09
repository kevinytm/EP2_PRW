<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php include 'roles.php';?>

<?php     
    session_start();
    $usuario = $_SESSION['usuario']; 
    if (esAdmin($usuario)){
?>	
	
<?php
    $usuario = $_SESSION['usuario'];
    if(isset($usuario)){
        $servicio = $_POST['nombre'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracion'];

        $sql="insert into servicios (nombre, precio, duracion) values ('$servicio', $precio, $duracion);";
        $execute = mysqli_query($con, $sql);
        sleep(3);
        header('Location: create.php');
    }else{
        header('Location: login.php');
    }
?>
<?php
    }else{
        header('Location: login.php');
    }  
?>

<?php  include 'includes/footer.php'; ?>