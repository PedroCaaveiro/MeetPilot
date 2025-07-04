<h2 class='dashboard__heading'><?php echo $titulo?></h2>

<?php require_once __DIR__ . '../../../templates/alertas.php';?>

<div class="dashboard__contenedor-boton">
    <a class='dashboard__boton' href="<?php echo BASE_URL;?>admin/ponentes/crear">
        <i class='fa-solid fa-circle-plus'></i>
        Añadir Ponente
    </a>
</div>
<div class="dashboard__contenedor">

<?php if (!empty($ponentes)) { ?>
    <table class="table">
<thead class='table__thead'>
    <tr>
        <th scope='col' class="table__th">Nombre</th>
        <th scope='col' class="table__th">Ubicación</th>
        <th scope='col' class="table__th">Opciones</th>
    </tr>
</thead>
<tbody class="table__tbody">

<?php foreach($ponentes as $ponente) { ?>
<tr class="table__tr">
<td class="table__td">

<?php echo $ponente->nombre. " " . $ponente->apellido;?>
</td>

<td class="table__td">

<?php echo $ponente->ciudad. "," . $ponente->pais;?>
</td>


    <td class="table__td--acciones">
    <a class='table__accion table__accion--editar' href="<?php echo BASE_URL . 'admin/ponentes/editar?id=' . $ponente->id; ?>">
        <i class="fa-solid fa-pen-to-square"></i>Editar
    </a>

   <form method="POST" action="<?php echo BASE_URL . 'admin/ponentes/eliminar'; ?>" class="table__formulario">
    <input type="hidden" name="id" value='<?php echo $ponente->id;?> '>
        <button class='table__accion table__accion--eliminar' type='submit'>
            <i class="fa-solid fa-circle-xmark"></i>
            Eliminar
        </button></form>
</td>


</tr>

    <?php } ?>

</tbody>

    </table>

    <?php } else { ?>

<p class="text-center">No hay ponentes</p>
        <?php } ?>

</div>



<?php echo $paginacion->paginacion(); ?>
