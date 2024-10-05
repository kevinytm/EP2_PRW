<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>

<?php session_start(); ?>	
	
<?php
    $usuario = $_SESSION['usuario'];
    if(isset($usuario)){
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from servicios where id = $id;";
        $execute = mysqli_query($con, $sql);
        if(mysqli_num_rows($execute)==1){
            
            $row = mysqli_fetch_array($execute);
            $nombre = $row['nombre'];
            $precio = $row['precio'];
           
        }
    }else{
        echo "No se ha recibido un ID";
    }
    
    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $sql = "update servicios set nombre = '$nombre', precio = '$precio' where id = $id;";
        $execute = mysqli_query($con, $sql);
        if($execute){
            echo "Registro actualizado";
        }else{
            echo "Error al actualizar";
        }
        header('Location: eli_act.php');
    }
    
 /*    sleep(2);
    header('Location: eli_act.php'); */
?>

<form action="actualizar.php?id=<?php echo $_GET['id'];?>" method="post">
    <div class ="form_container">
        <label> Nombre del servicio
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        </label>
    </div>
    <br>
    <div class ="form_container">
        <label>Precio del servicio
            <input type="text" name="precio" id="precio" value="<?php echo $precio; ?>">
        </label>
        <br>
    </div>
    <button name="actualizar" class="formulario_btn">Actualizar</button>
</form>
<?php
    }else{
        header('Location: login.php');
    }   
?>

<?php  include 'includes/footer.php'; ?>