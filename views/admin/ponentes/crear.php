<h2 class='dashboard__heading'><?php echo $titulo?></h2>

<div class="dashboard__contenedor-boton">
    <a class='dashboard__boton' href="<?php echo BASE_URL;?>admin/ponentes">
        <i class='fa-solid fa-circle-arrow-left'></i>
        Añadir Ponente
    </a>
</div>

<div class="dashboard__formulario">

<?php require_once __DIR__ . '../../../templates/alertas.php';?>


<form method='POST' action="<?php echo BASE_URL;?>admin/ponentes/crear" enctype='multipart/form-data' class="formulario">

<?php include_once __DIR__.'/formulario.php'?>

<input class='formulario__submit formulario__submit--registrar'type="submit" value="Registrar Ponente">

</form>

</div>