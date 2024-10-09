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
            <th>Servicio</th>
            <th>Costo</th>
            <th>Duración</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
        </tr>
    </thead>
    <?php
        $sql = "select * from servicios";
        $exec = mysqli_query($con, $sql);
        while($rows = mysqli_fetch_array($exec)){
        ?>
            <tr>
                <th><?php echo $rows['idS']; ?></th>
                <th><?php echo $rows['nombre']; ?></th>
                <th><?php echo $rows['precio']; ?></th>
                <th><?php echo $rows['duracion']; ?></th>
                <th><a href="eliminar.php?idS=<?php echo $rows['idS'];?>"><i class="bi bi-trash"></i></a></th>
                <th><a href="actualizar.php?idS=<?php echo $rows['idS'];?>"><i class="bi bi-arrow-clockwise"></i></a></th>
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

