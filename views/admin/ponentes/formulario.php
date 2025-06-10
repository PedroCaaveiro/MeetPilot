<fieldset class='formulario__fielset'>
    <legend class='formulario__legend'>Informacion Personal</legend>
</fieldset>

<div class="formulario__campo">
    
<label class='formulario__label'for="nombre">Nombre</label>
<input type="text" class="formulario__input" id='nombre'name='nombre' placeholder='Nombre Ponente' value='<?php echo $ponente->nombre ?? '';?>'>

</div>

<div class="formulario__campo">
    
<label class='formulario__label'for="nombre">Apellido</label>
<input type="text" class="formulario__input" id='apelido'name='apellido' placeholder='Apellido Ponente' value='<?php echo $ponente->apellido ?? '';?>'>

</div>