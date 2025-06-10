<main class="auth">
<h2 class="auth__heading"><?php echo $titulo?></h2>
<p class="auth__texto">Recuperar Password</p>


<?php
require_once __DIR__.'/../templates/alertas.php';
?>

<form  method="POST" action="<?php echo  BASE_URL ?>olvide" class="formulario">



<div class="formulario__campo">
    <label for="email" class="formulario__label">Email</label>
    <input type="email" class="formulario__input" id="email" name='email' placeholder='Tu Email'>
</div>



<input type="submit" class="formulario__submit" value="Recuperar Password">
</form>
<div class="acciones">
    <a href="<? echo BASE_URL ?>login" class=acciones__enlace >Iniciar Sesión</a>
<a href="<? echo BASE_URL ?>registro" class=acciones__enlace >¿Aun no te registraste?</a>

</div>

</main>