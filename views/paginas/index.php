<?php 

include_once __DIR__ .'/workshops-conferencias.php';

?>

<section class="resumen">
    <div class="resumen__grid">
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentesTotal;?></p>
            <p class="resumen__texto resumen__texto">Speakers</p>  
        </div>

          <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferenciasTotal;?></p>
            <p class="resumen__texto resumen__texto">Conferencias</p>  
        </div>

          <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshopsTotal;?></p>
            <p class="resumen__texto resumen__texto">Workshops</p>  
        </div>

          <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto resumen__texto">Asistentes</p>  
        </div>
    </div>
</section>

<section class="speakers">

  <h2 class="speakers__heading">Speakers</h2>
  <p class="speakers__descripcion">Conoce a nuestros Expertos de MeetPilot</p>

    <?php foreach($ponentes as $ponente) { ?>

        <div class="spaeaker">
            <picture>
                    <source srcset="<?= BASE_URL . 'build/img/speakers/' . $ponente->imagen; ?>.webp" type="image/webp">
                    <img src="<?= BASE_URL . 'build/img/speakers/' . $ponente->imagen; ?>.png" alt="Imagen Ponente" class="speaker__imagen" loading="lazy" width="200" height="300">
                  </picture>
                  <div class="spaeaker__informacion">
                    <h4 class="speaker__nombre">
                        <?php echo $ponente->nombre . ' '. $ponente->apellido;?>
                    </h4>
                    <p class="speaker__ubicacion">
                        <?php echo $ponente->ciudad . ' ' . $ponente->pais;?>
                    </p>

                    <nav class="speaker__sociales">

                    <?php
                    $redes = json_decode($ponente->redes);
                    ?>

            <?php if (!empty($redes->facebook)) : ?>
    <a href="<?= $redes->facebook ?>" class="speaker__enlace" rel="noopener noreferrer" target="_blank">
        <span class="speaker__ocultar">Facebook</span>
    </a>
<?php endif; ?>

<?php if (!empty($redes->twitter)) : ?>
    <a href="<?= $redes->twitter ?>" class="speaker__enlace" rel="noopener noreferrer" target="_blank">
        <span class="speaker__ocultar">Twitter</span>
    </a>
<?php endif; ?>

<?php if (!empty($redes->instagram)) : ?>
    <a href="<?= $redes->instagram ?>" class="speaker__enlace" rel="noopener noreferrer" target="_blank">
        <span class="speaker__ocultar">Instagram</span>
    </a>
<?php endif; ?>

<?php if (!empty($redes->youtube)) : ?>
    <a href="<?= $redes->youtube ?>" class="speaker__enlace" rel="noopener noreferrer" target="_blank">
        <span class="speaker__ocultar">YouTube</span>
    </a>
<?php endif; ?>

<?php if (!empty($redes->tiktok)) : ?>
    <a href="<?= $redes->tiktok ?>" class="speaker__enlace" rel="noopener noreferrer" target="_blank">
        <span class="speaker__ocultar">TikTok</span>
    </a>
<?php endif; ?>

<?php if (!empty($redes->github)) : ?>
    <a href="<?= $redes->github ?>" class="speaker__enlace" rel="noopener noreferrer" target="_blank">
        <span class="speaker__ocultar">GitHub</span>
    </a>
<?php endif; ?>

          
          


                    </nav>
                    <ul class="speaker__listado-skills">
                        <?php $tags = explode(',',$ponente->tags);
                            foreach($tags as $tag){ ?>

                            <li class="speaker__skill"><?php echo $tag;?></li>
                            
                           <?php } ?>
                        

                    </ul>
                  </div>
        </div>
    <?php } ?>

</section>