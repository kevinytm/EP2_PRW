<?php  include 'includes/header.php'?>

<form action="validacionRegistro.php" method="POST">
    

    <label>Usuario:</label>
    <input type="text" name="usuario">
    <br>
    <label>Nombre:</label>
    <input type="text" name="nombre">
    <br>
    <label>Apellido:</label>
    <input type="text" name="apellido">
    <br>
    <label>Correo:</label>
    <input type="text" name="correo">
    <br>

    <button class="formulario_btn">Enviar</button>
</form>

<br>
<br>

<a href="index.php"><img src="Static/img/back.png"></a>

<?php  include 'includes/footer.php'; ?>