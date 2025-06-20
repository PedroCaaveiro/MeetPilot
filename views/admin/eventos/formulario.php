<fieldset class='formulario__fieldset'>
    <legend class='formulario__legend'>Información Evento</legend>

    <div class="formulario__campo">
        <label class='formulario__label' for="nombre">Nombre Evento</label>
        <input type="text" class="formulario__input"
         id="nombre"
         name="nombre"
         placeholder="Nombre Evento"
         value='<?php echo $evento->nombre;?>'>
    </div>

    <div class="formulario__campo">
        <label class='formulario__label' for="descripcion">Descripción</label>
        <textarea class="formulario__input"
         id="descripcion"
         name="descripcion"
         placeholder="Descripción Ponente"
         rows = 8> 
         <?php echo htmlspecialchars($evento->descripcion); ?></textarea>
    </div>

      <div class="formulario__campo">
        <label class='formulario__label' for="categoria">Categoria o Tipo de Evento</label>
       <select class='formulario__select' id='categoria' name='categoria_id'>
        <option value="">-Seleccionar-</option>
       <?php foreach($categorias as $categoria) { ?>

            <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : ''?> value="<?php echo $categoria->id;?>"><?php echo $categoria->nombre;?></option>
        <?php } ?>
       </select>
    </div>

    <div class="formulario__campo">
        <label class='formulario__label' for="categoria">Selecciona el día</label>

        <div class="formulario__radio">
<?php foreach($dias as $dia) { ?>

    <label for="<?php echo strtolower($dia->nombre);?>"><?php echo $dia->nombre;?></label>

        <input type="radio"
        id='<?php echo strtolower($dia->nombre);?>'
        name='dia'
        value='<?php echo $dia->id;?>'>

    <?php } ?>

        </div>
        <input type="hidden" name="dia_id" value="">
      
    </div>

   <div class="formulario__campo" id="horas">
    <label for="" class="formulario__label">Seleccionar Horas</label>
<ul  id ="horas" class="horas">
    <?php 
    foreach($horas as $hora){ ?>

    <li data-hora-id="<?php echo $hora->id ?>" class='horas__hora'><?php echo $hora->hora;?></li>

    <?php } ?>
</ul>
 <input type="hidden" name="hora_id" value="">
   </div>

</fieldset>


<fieldset class='formulario__fieldset'>

<legend class="formulario__legend">Información Extra</legend>

  <div class="formulario__campo">
        <label class='formulario__label' for="ponentes">Ponentes</label>
        <input type="text" class="formulario__input"
         id="ponentes"
         placeholder="Buscar Ponente">
    </div>

    <div class="formulario__campo">
        <label class='formulario__label' for="ponentes">Lugares Disponibles</label>
        <input type="number"
         min='1'
         class="formulario__input"
         id="disponibles"
         name = 'disponibles'
         placeholder="Ej. 20"
         value = '<?php echo $evento->disponibles?>'>
    </div>


</fieldset>



