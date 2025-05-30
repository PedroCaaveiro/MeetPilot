<main class="auth">
<h2 class="auth__heading"><?php echo $titulo?></h2>
<p class="auth__texto">Registrate en  MeetPilot</p>

<form action="" class="formulario">
<div class="formulario__campo">
    <label for="nombre" class="formulario__label">Nombre</label>
    <input type="text" class="formulario__input" id="nombre" name='nombre' placeholder='Tu Nombre'>
</div>
<div class="formulario__campo">
    <label for="apellido" class="formulario__label">Apellido</label>
    <input type="text" class="formulario__input" id="apellido" name='apellido' placeholder='Tu Apellido'>
</div>

<div class="formulario__campo">
    <label for="email" class="formulario__label">Email</label>
    <input type="email" class="formulario__input" id="email" name='email' placeholder='Tu Email'>
</div>
<div class="formulario__campo">
    <label for="password" class="formulario__label">Password</label>
    <input type="pasword" class="formulario__input" id="password" name='password' placeholder='Tu Password'>
</div>

<div class="formulario__campo">
    <label for="password2" class="formulario__label">Repetir Password</label>
    <input type="pasword2" class="formulario__input" id="password2" name='password2' placeholder='Repetir Password'>
</div>
<input type="submit" class="formulario__submit" value="Crear Cuenta">
</form>
<div class="acciones">
    <a href="<?= BASE_URL ?>login" class=acciones__enlace >Iniciar Sesión</a>
<a href="<?= BASE_URL ?>olvide" class=acciones__enlace>¿Olvidaste tu Password?</a>

</div>

</main>