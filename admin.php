<?php  include 'includes/header.php'?>
<?php session_start(); 
    $usuario = $_SESSION['usuario'];
    if(isset($usuario)){
?>	

<article class="entrada">
    <div class="entrada__imagen">
              <div class="entrada_contenido">
          <h4 class="no-margin">Barbershop México</h4>
          <p><a href="create.php"><img src="./Static/img/c.png"></a>|
          <a href="consulta.php"> <img src="./Static/img/r.png"></a>|
          <a href="eli_act.php"><img src="./Static/img/u.gif"></a>|
          <a href="eli_act.php"><img src="./Static/img/d.png"></a>|
          <a href="logout.php"><i class="bi bi-box-arrow-in-left"></i></a></p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, rerum, reprehenderit consequatur perferendis officia, vitae fuga animi temporibus itaque atque</p>
            <picture>                      
        <img loading="lazy" src="./Static/img/2.jpg" alt="imagen blog"> 
      </picture>
    </div>
      </div>
</article>     

<?php
    }else{
        header('Location: login.php');
    }
    ?>
