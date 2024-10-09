<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php include 'roles.php';?>

<style>
    *{
        color: white;
    }
</style>
<?php
    session_start();
    $usuario = $_SESSION['usuario']; 
    if (esAdmin($usuario)){
?>
<table  class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <?php
        $sql = "select * from reservaciones;";
        $exec = mysqli_query($con, $sql);
        while($rows = mysqli_fetch_array($exec)){
        ?>
            <tr>
                <th><?php echo $rows['id']; ?></th>
                <th><?php echo $rows['fecha']; ?></th>
                <th><?php echo $rows['horaIni']; ?></th>
                <th><?php echo $rows['horaFin']; ?></th>
                <th><a href="eliminarReservacion.php?id=<?php echo $rows['id'];?>"><i class="bi bi-trash"></i></a></th>
            </tr>            
        <?php
        }
    ?>
</table>

<?php
    }else{
        header('Location: login.php');
    }  

?>

<a href="admin.php"><img src="Static/img/back.png"></a>

<?php  include 'includes/footer.php'; ?>

