<?php include 'includes/header.php';?>

 <H2>Autentificación</H2>
<form method="POST" name="frm1" id="frm1" action="validation.php">
 <div class="form_container">
    <label for="usuario" class="formulario_label">User:
    <input type="text" name="usuario" id="usuario" class="formulario_input">
    </label>  
</div> 
<div class="form_container">
    <label for="contrasena" class="formulario_label">Password:
    <input type="password" name="contrasena" id="contrasena" class="formulario_input">
    </label>
</div>                  
<div class="form_container">            
    <button class="formulario_btn">Enviar</button> 
</div> 
</form> 

<a href="index.php"><img src="Static/img/back.png"></a>

<!-- <script src="Static/js/validaciones.js"></script>   -->
<!-- onclick=validacion(); -->