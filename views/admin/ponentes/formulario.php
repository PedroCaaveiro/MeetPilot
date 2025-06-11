<fieldset class='formulario__fieldset'>
    <legend class='formulario__legend'>Información Personal</legend>

    <div class="formulario__campo">
        <label class='formulario__label' for="nombre">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre Ponente" value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label class='formulario__label' for="apellido">Apellido</label>
        <input type="text" class="formulario__input" id="apellido" name="apellido" placeholder="Apellido Ponente" value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label class='formulario__label' for="ciudad">Ciudad</label>
        <input type="text" class="formulario__input" id="ciudad" name="ciudad" placeholder="Ciudad Ponente" value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label class='formulario__label' for="pais">País</label>
        <input type="text" class="formulario__input" id="pais" name="pais" placeholder="País Ponente" value="<?php echo $ponente->pais ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label class='formulario__label' for="imagen">Imagen</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
    </div>
</fieldset>

<fieldset class='formulario__fieldset'>
    <legend class='formulario__legend'>Información Extra</legend>

    <div class="formulario__campo">
        <label class='formulario__label' for="tags__input">Área de Experiencia</label>
        <input type="text" class="formulario__input" id="tags__input" placeholder="Ej: Node.js, PHP, CSS, Laravel">
        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
    </div>
</fieldset>

<fieldset class='formulario__fieldset'>
    <legend class='formulario__legend'>Redes Sociales</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="text" name="redes[facebook]" class="formulario__input--sociales" placeholder="Facebook" value="<?php echo $ponente->facebook ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text" name="redes[twitter]" class="formulario__input--sociales" placeholder="Twitter" value="<?php echo $ponente->twitter?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text" name="redes[youtube]" class="formulario__input--sociales" placeholder="Youtube" value="<?php echo $ponente->youtube ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text" name="redes[instagram]" class="formulario__input--sociales" placeholder="intagram" value="<?php echo $ponente->instagram ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text" name="redes[tiktok]" class="formulario__input--sociales" placeholder="Tiktok" value="<?php echo $ponente->tiktok ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text" name="redes[github]" class="formulario__input--sociales" placeholder="Github" value="<?php echo $ponente->github ?? ''; ?>">
        </div>
    </div>
</fieldset>
