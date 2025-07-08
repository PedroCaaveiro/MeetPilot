<main class="registro">
    <h2 class="registro__heading"> <?php echo $titulo;?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
    <div class="paquete">
        <h3 class="paquete__nombre">Pase Gratis</h3>
        <ul class="paquete__lista">
            <li class="paquete__elemento">Acceso Virtual a MeetPilot</li>
        </ul>
        <p class="paquete__precio">0 €</p>

        <form action="<?php echo BASE_URL;?>finalizar-registro/gratis" method="POST">

    <input class="paquetes__submit" type='submit' value='Inscripción gratis'>

        </form>

    </div>
     <div class="paquete">
        <h3 class="paquete__nombre">Pase Presencial</h3>
        <ul class="paquete__lista">
            <li class="paquete__elemento">Acceso Presencial a MeetPilot</li>
            <li class="paquete__elemento">Pase 2 días</li>
             <li class="paquete__elemento">Acceso Talleres & Conferencias</li>
              <li class="paquete__elemento">Acceso Grabaciones</li>
              <li class="paquete__elemento">Camisa Evento</li>
               <li class="paquete__elemento">Comida & Bebida</li>
        </ul>
        <p class="paquete__precio">199 €</p>

    </div>


      <div class="paquete">
        <h3 class="paquete__nombre">Pase Virtual</h3>
        <ul class="paquete__lista">
            <li class="paquete__elemento">Acceso Virtual a MeetPilot</li>
            <li class="paquete__elemento">Pase 2 días</li>
             <li class="paquete__elemento">Enlace Talleres & Conferencias</li>
              <li class="paquete__elemento">Acceso Grabaciones</li>
              <li class="paquete__elemento">Camisa Evento</li>
               
        </ul>
        <p class="paquete__precio">49 €</p>

    </div>
</div>
</main>