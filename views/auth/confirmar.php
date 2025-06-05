<main class="auth">
<h2 class="auth__heading"><?php echo $titulo?></h2>
<p class="auth__texto">Cuenta MeetPilot</p>

   <?php

    require_once __DIR__ . '/../templates/alertas.php';
    ?>

  <div class="acciones">
        <a href="<?= BASE_URL ?>login" class=acciones__enlace>Iniciar Sesión</a>
        

    </div>

</main>