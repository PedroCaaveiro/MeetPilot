<h2 class='dashboard__heading'><?php echo $titulo?></h2>

<div class="dashboard__contenedor-boton">
    <a class='dashboard__boton' href="<?php echo BASE_URL;?>admin/eventos">
        <i class='fa-solid fa-circle-plus'></i>
        Volver Eventos
    </a>
</div>

<div class="dashboard__formulario">

<?php require_once __DIR__ . '../../../templates/alertas.php';?>


<form method='POST' action="<?php echo BASE_URL;?>admin/eventos/crear" class="formulario">

<?php include_once __DIR__.'/formulario.php'?>

<input class='formulario__submit formulario__submit--registrar'type="submit" value="Registrar evento">

</form>

</div>