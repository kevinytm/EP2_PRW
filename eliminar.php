<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>

<?php
    $usuario = $_SESSION['usuario'];
    if(isset($usuario)){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $sql = "delete from servicios where id = $id;";
        $execute = mysqli_query($con, $sql);
        sleep(2);
        header('Location: eli_act.php');
    }else{
        header('Location: login.php');
    }
?>


<?php  include 'includes/footer.php'; ?>