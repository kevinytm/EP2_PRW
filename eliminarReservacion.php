<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php include 'roles.php';?>

<?php
    session_start();
    $usuario = $_SESSION['usuario']; 
    if (esAdmin($usuario)){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $sql = "delete from reservaciones where id = $id;";
        $execute = mysqli_query($con, $sql);
        sleep(2);
        header('Location: eli_reservaciones.php');
    }else{
        header('Location: login.php'); 
    }
?>


<?php  include 'includes/footer.php'; ?>