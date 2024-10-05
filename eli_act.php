<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php session_start(); ?>	

<style>
    *{
        color: white;
    }
</style>
<?php
    $usuario = $_SESSION['usuario'];
    if(isset($usuario)){
?>
<table  class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Servicio</th>
            <th>Costo</th>
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
                <th><?php echo $rows['id']; ?></th>
                <th><?php echo $rows['nombre']; ?></th>
                <th><?php echo $rows['precio']; ?></th>
                <th><a href="eliminar.php?id=<?php echo $rows['id'];?>"><i class="bi bi-trash"></i></a></th>
                <th><a href="actualizar.php?id=<?php echo $rows['id'];?>"><i class="bi bi-arrow-clockwise"></i></a></th>
            </tr>            
        <?php
        }
    ?>
</table>

<a href="index.php" color="white">Regresar </a>
<?php
    }else{
        header('Location: login.php');
    }  

?>

<?php  include 'includes/footer.php'; ?>
