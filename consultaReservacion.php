<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php include 'roles.php';?>
<?php 
    session_start(); 
    $usuario = $_SESSION['usuario'];
    $query = "SELECT * FROM servicios";
    $articulos = $con->query($query);    
    if(isset($usuario) && esUser($usuario)){
?>	


<style>
    *{
        color: white;
    }
</style>
<table  class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora inicio</th>
            <th>Hora fin</th>
            <th>Usuario</th>
            <th>Servicio</th>
        </tr>
    </thead>
    <?php
        $sql = "select * from reservaciones";
        $exec = mysqli_query($con, $sql);
        while($rows = mysqli_fetch_array($exec)){
        ?>
            <tr>
                <th><?php echo $rows['id']; ?></th>
                <th><?php echo $rows['fecha']; ?></th>
                <th><?php echo $rows['horaIni']; ?></th>
                <th><?php echo $rows['horaFin']; ?></th>
                <th><?php echo $rows['idU']; ?></th>
                <th><?php echo $rows['idS']; ?></th>
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

<a href="user.php"><img src="Static/img/back.png"></a>

<?php  include 'includes/footer.php'; ?>