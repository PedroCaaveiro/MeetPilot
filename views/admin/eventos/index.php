<h2 class='dashboard__heading'><?php echo $titulo?></h2>

<div class="dashboard__contenedor-boton">
    <a class='dashboard__boton' href="<?php echo BASE_URL;?>admin/eventos/crear">
        <i class='fa-solid fa-circle-plus'></i>
        Añadir Eventos
    </a>
</div>

<div class="dashboard__contenedor">

<?php if (!empty($eventos)) { ?>
    <table class="table">
<thead class='table__thead'>
    <tr>
        <th scope='col' class="table__th">Nombre</th>
        <th scope='col' class="table__th">Categoría</th>
        <th scope='col' class="table__th">Día & Hora</th>
        <th scope='col' class="table__th">Ponente</th>
        <th scope='col' class="table__th">Opciones</th>
    </tr>
</thead>
<tbody class="table__tbody">

<?php foreach($eventos as $evento) { ?>
<tr class="table__tr">
<td class="table__td">

<?php echo $evento->nombre;?>
</td>
<td class="table__td">

<?php echo $evento->categoria->nombre;?>
</td>

<td class="table__td">

<?php echo $evento->dia->nombre. ' , ' . $evento->hora->hora;?>
</td>



<td class="table__td">

<?php echo $evento->ponente->nombre . "," . $evento->ponente->apellido;?>
</td>

    <td class="table__td--acciones">
    <a class='table__accion table__accion--editar' href="<?php echo BASE_URL . 'admin/eventos/editar?id=' . $evento->id; ?>">
        <i class="fa-solid fa-pencil"></i>Editar
    </a>

   <form method="POST" action="<?php echo BASE_URL . 'admin/eventos/eliminar'; ?>" class="table__formulario">
    <input type="hidden" name="id" value='<?php echo $eventos->id;?> '>
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

<p class="text-center">No hay eventos</p>
        <?php } ?>

</div>



<?php echo $paginacion->paginacion(); ?>
