<?php include 'Static/connect/db.php'?>
<?php include 'includes/header.php'?>

<?php
session_start();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = mysqli_query($con, $sql);
$filas = mysqli_fetch_assoc($resultado);

if($filas) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = $filas['rol'];

    if($filas['categoria'] == 'Admin') {
        header("Location: admin.php");
    } elseif($filas['categoria'] == 'Usuario') {
        header("Location: user.php");
    } else {
        echo "error";
        /* header("Location: login.php?error=rol_no_autorizado"); */
    }
} else {
    header("Location: login.php?error=login_fallido");
}
mysqli_free_result($resultado);
mysqli_close($con);
?>