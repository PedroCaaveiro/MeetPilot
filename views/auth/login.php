<main class="auth">
<h2 class="auth__heading"><?php echo $titulo?></h2>
<p class="auth__texto">Iniciar Sesión MeetPilot</p>

<?php    

require_once __DIR__. '/../templates/alertas.php';

?>

<form action="<?php echo BASE_URL;?>login" method="POST" class="formulario">


<div class="formulario__campo">
    <label for="email" class="formulario__label">Email</label>
    <input type="email" class="formulario__input" id="email" name='email' placeholder='Tu Email'>
</div>
<div class="formulario__campo">
    <label for="password" class="formulario__label">Password</label>
    <input type="password" class="formulario__input" id="password" name='password' placeholder='Tu Password'>
</div>
<input type="submit" class="formulario__submit" value="Iniciar Sesión">
</form>
<div class="acciones">
    <a href="<?php echo BASE_URL; ?>registro" class=acciones__enlace >¿Aun no te registraste?</a>
<a href="<?php echo  BASE_URL; ?>olvide" class=acciones__enlace>¿Olvidaste tu Password?</a>

</div>

</main>