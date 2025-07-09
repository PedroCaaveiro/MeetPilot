<header class="header">

<div class="header__contenedor">

<nav class="header__navegacion">

<?php if (isAuth()) { ?>
    <?php if (isAdmin()) { ?>
        <a href="<?= BASE_URL; ?>admin/dashboard" class="header__enlace">Administrar</a>
    <?php } ?>

    <form method="POST" action="<?= BASE_URL; ?>logout" class="header__form">
        <input type="submit" value="Cerrar Sesión" class="header__submit">
    </form>
<?php } else { ?>
    <a href="<?= BASE_URL; ?>registro" class="header__enlace">Registro</a>
    <a href="<?= BASE_URL; ?>login" class="header__enlace">Iniciar Sesión</a>
<?php } ?>

    </nav>


    <div class="header__contenido">
<a href="<?= BASE_URL;?>" class="header__enlace">
    <h1 class="header__logo">&#60;MeetPilot /></h1>
</a>
<p class="header__texto">Noviembre 10-11 - 2025</p>
<p class="header__texto header__texto--modalidad">En linea - Presencial</p>
<a href="<?= BASE_URL; ?>registro" class="header__boton">Comprar Pase </a>

    </div>
</div>

</header>
<div class="barra">
    <div class="barra__contenido">

       <a href="<?php echo BASE_URL;?>"> <h2 class="barra__logo">&#60;MeetPilot /></h2></a>
            
        <nav class="navegacion">
    <a href="<?php echo BASE_URL;?>meetpilot" 
       class="navegacion__enlace <?php echo paginaActual('/meetpilot') ? 'navegacion__enlace--actual' : ''; ?>">Evento</a>

    <a href="<?php echo BASE_URL;?>paquetes" 
       class="navegacion__enlace <?php echo paginaActual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Paquetes</a>

    <a href="<?php echo BASE_URL;?>workshops-conferencias" 
       class="navegacion__enlace <?php echo paginaActual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Workshops / Conferencias</a>

    <a href="<?php echo BASE_URL;?>registro" 
       class="navegacion__enlace <?php echo paginaActual('/registro') ? 'navegacion__enlace--actual' : ''; ?>">Comprar Pase</a>
</nav>

    </div>
</div>