<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php include 'roles.php';?>

<?php   
session_start();
  $usuario = $_SESSION['usuario']; 
  if (esAdmin($usuario)){ 
?>
<?php
    if(isset($_GET['idS'])){
        $id = $_GET['idS'];
        $sql = "select * from servicios where idS = $id;";
        $execute = mysqli_query($con, $sql);
        if(mysqli_num_rows($execute)==1){
            
            $row = mysqli_fetch_array($execute);
            $nombre = $row['nombre'];
            $precio = $row['precio'];
            $duracion = $row['duracion'];
           
        }
    }else{
        echo "No se ha recibido un ID";
    }
    
    if(isset($_POST['actualizar'])){
        $id = $_GET['idS'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracion'];
        $sql = "update servicios set nombre = '$nombre', precio = '$precio', duracion = '$duracion' where idS = $id;";
        $execute = mysqli_query($con, $sql);
        if($execute){
            echo "Registro actualizado";
        }else{
            echo "Error al actualizar";
        }
        header('Location: eli_act.php');
    }
    
/*     sleep(2);
    header('Location: eli_act.php'); */
?>

<form action="actualizar.php?idS=<?php echo $_GET['idS'];?>" method="post">
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
    <div class ="form_container">
        <label>Duración del servicio
            <input type="text" name="duracion" id="duracion" value="<?php echo $duracion; ?>">
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