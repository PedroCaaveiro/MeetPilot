<main class="auth">
<h2 class="auth__heading"><?php echo $titulo?></h2>
<p class="auth__texto">Coloca tu nuevo Password</p>


<?php
require_once __DIR__.'/../templates/alertas.php';
?>

<?php if ($token_valido) { ?>

<form  method="POST" action="" class="formulario">



<div class="formulario__campo">
    <label for="password" class="formulario__label">Nuevo Password</label>
    <input type="password" class="formulario__input" id="password" name='password' placeholder='Tu nuevo password'>
</div>



<input type="submit" class="formulario__submit" value="Guardar Password">
</form>

<?php }?>
<div class="acciones">
    <a href="<?php echo BASE_URL; ?>login" class=acciones__enlace >Iniciar Sesión</a>
<a href="<?php echo BASE_URL; ?>registro" class=acciones__enlace >¿Aun no te registraste?</a>

</div>

</main>