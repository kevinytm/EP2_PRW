<?php  include 'includes/header.php'?>
<?php  include 'Static/connect/db.php'?>
<?php include 'roles.php';?>
<?php session_start(); 
    $usuario = $_SESSION['usuario'];
    $query = "SELECT * FROM servicios";
    $articulos = $con->query($query);    
    if(isset($usuario)){
?>	
	
<h6>Incorpora servicios</h6>
<form method="POST" name="frm1" id="frm1" action="validacionReservacion.php">

    <div class="form_container">
        <label class="formulario_label">Fecha de la reservación:</label>
        <input type="date" name="fecha" id="fecha">
    </div> 

    <div class="form_container">
        <label class="formulario_label">Hora de inicio:</label>
        <input type="time" name="horaIni" id="horaIni">
    </div>

    <div class="form_container">
        <label class="formulario_label">Elige el servicio:</label>
    
        <select name="servicio" id="servicio">
                <?php
                foreach ($articulos as $articulo) {
                    echo "<option value=\"{$articulo['nombre']}\">{$articulo['nombre']}</option>";
                }
                ?>
        </select>
    </div> 
    <br>
    <div class="form_container">                    
       <input type="submit" value="Enviar Datos"  class="formulario_btn" onclick="validacion()">                    
    </div>
    <script src='Static/js/appvlidacion.js'></script>         

</form>

      
<?php
    }else{
        header('Location: login.php');
    }
?>

<?php  include 'includes/footer.php'; ?>