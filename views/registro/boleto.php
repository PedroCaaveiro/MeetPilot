<main class="pagina">


<h2 class="pagina__heading"><?php echo $titulo;?></h2>
<p class="pagina__descripcion">Tu Tiquet -- Te recomendamos almacenarlo, puedes compartilo en redes sociales</p>

<div class="boleto__virtual">

<div class="boleto boleto--<?php echo strtolower($registro->paquete->nombre); ?> boleto--acceso">

<div class="boleto__contenido">
    <h4 class="boleto__logo">&#60;Meetpilot/></h4>
    <p class="boleto__plan"><?php echo $registro->paquete->nombre;?></p>
    <p class="boleto__nombre"><?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido;?></p>
</div>
<p class="boleto__codigo"><?php echo '#' . $registro->token;?></p>
</div>

</div>

 <?php if (isAuth()) : ?>
        <div class="boleto__acciones" style="text-align: center; margin-top: 2rem;">
            <a href="/finalizar-registro" class="boton boton--secundario">Comprar otro pase</a>

        </div>
    <?php endif; ?>
</main>

