

<aside class="dashboard__sidebar">


<nav class="dashboard__menu">

<a href="<?php echo BASE_URL;?>admin/dashboard" class="dashboard__enlace <?php echo paginaActual('/dashboard')? 'dashboard__enlace--actual' : '';?>">
    <i class="fa-solid fa-house dashboard__icono"></i>
<span class="dashboard__menu-texto">Inicio</span>

</a>
<a href="<?php echo BASE_URL;?>admin/ponentes" class="dashboard__enlace <?php echo paginaActual('/ponentes') ? 'dashboard__enlace--actual' : '';?>">
    <i class="fa-solid fa-microphone-lines dashboard__icono"></i>
<span class="dashboard__menu-texto">Ponentes</span>

</a>

</a>
<a href="<?php echo BASE_URL;?>admin/eventos" class="dashboard__enlace <?php echo paginaActual('/eventos') ? 'dashboard__enlace--actual' : '';?>">
  <i class="fa-solid fa-calendar dashboard__icono"></i>
<span class="dashboard__menu-texto">Eventos</span>

</a>
<a href="<?php echo BASE_URL;?>admin/registrados" class="dashboard__enlace <?php echo paginaActual('/registrados') ? 'dashboard__enlace--actual' : '';?>">
 <i class="fa-solid fa-users dashboard__icono"></i>
<span class="dashboard__menu-texto">Registrados</span>

</a>

<a href="<?php echo BASE_URL;?>admin/regalos" class="dashboard__enlace <?php echo paginaActual('/regalos') ? 'dashboard__enlace--actual' : '';?>">
<i class="fa-solid fa-gifts dashboard__icono"></i>
<span class="dashboard__menu-texto">Regalos</span>

</a>
</nav>
</aside>