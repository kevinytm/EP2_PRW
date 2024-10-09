<?php include 'roles.php';?>
<?php  include 'Static/connect/db.php'?>

<?php 
    session_start();

    $usuario = $_SESSION['usuario'];
    
    
    if(esUser($usuario)){
        $usuario = $_SESSION['usuario'];
        if(isset($usuario)){
            $fecha = $_POST['fecha'];
            $hora = $_POST['horaIni'];
            $servicio = $_POST['servicio'];

            $queryIdU = "select idU from usuarios where usuario = '$usuario';";
            $reIdU = mysqli_query($con, $queryIdU);
            $rowIdU = mysqli_fetch_assoc($reIdU);
            $idU = $rowIdU['idU'];

            $queryIdS = "select idS from servicios where nombre = '$servicio';";
            $reIdS = mysqli_query($con, $queryIdS);
            $rowIdS = mysqli_fetch_assoc($reIdS);
            $idS = $rowIdS['idS'];

            $sql = "insert into reservaciones (fecha, horaIni, idU, idS) 
                    values ('$fecha', '$hora', $idU, $idS);";

            $execute = mysqli_query($con, $sql);

            sleep(3);
            header('Location: createReservacion.php');

        }else{
            header('Location: login.php');
        }
    }else{
        header('Location: login.php');
    }  
    
?>