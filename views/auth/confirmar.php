<main class="auth">
<h2 class="auth__heading"><?php echo $titulo?></h2>
<p class="auth__texto">Cuenta MeetPilot</p>

   <?php

    require_once __DIR__ . '/../templates/alertas.php';
    ?>

<?php  if (isset($alertas['exito'])) 
 
 {?>


  <div class="acciones">
        <a href="<? echo BASE_URL ?>login" class=acciones__enlace>Iniciar Sesión</a>
        

    </div>
<?php }?>
</main>