<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php include 'roles.php';?>

<?php
    session_start();
    $usuario = $_SESSION['usuario']; 
    if (esAdmin($usuario)){
        if(isset($_GET['idS'])){
            $id = $_GET['idS'];
        }
        $sql = "delete from servicios where idS = $id;";
        $execute = mysqli_query($con, $sql);
        sleep(2);
        header('Location: eli_act.php');
    }else{
        header('Location: login.php'); 
    }
?>


<?php  include 'includes/footer.php'; ?>