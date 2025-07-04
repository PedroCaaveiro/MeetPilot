<?php 

include_once __DIR__ . '/workshops-conferencias.php';

?>

<section class="resumen">
    <div class="resumen__grid">
        <div data-aos="<?php aosAnimation();?> " data-aos-delay="500"class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentesTotal; ?></p>
            <p class="resumen__texto resumen__texto">Speakers</p>  
        </div>

        <div data-aos="<?php aosAnimation();?>" data-aos-delay="500" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferenciasTotal; ?></p>
            <p class="resumen__texto resumen__texto">Conferencias</p>  
        </div>

        <div data-aos="<?php aosAnimation();?>" data-aos-delay="500" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshopsTotal; ?></p>
            <p class="resumen__texto resumen__texto">Workshops</p>  
        </div>

        <div data-aos="<?php aosAnimation();?>" data-aos-delay="500" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto resumen__texto">Asistentes</p>  
        </div>
    </div>
</section>

<section class="speakers">

    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros Expertos de MeetPilot</p>

    <div class="speakers__grid">
        <?php 
        foreach ($ponentes as $index => $ponente) { 
            $claseFondo = '';
            if ($index % 4 === 0) {
                $claseFondo = ' speaker--destacado-1';
            } elseif ($index % 4 === 1) {
                $claseFondo = ' speaker--destacado-2';
            } elseif ($index % 4 === 2) {
                $claseFondo = ' speaker--destacado-3';
            }
            
        ?>

        <div class="speaker<?= $claseFondo ?>" 
             data-aos="<?= aosAnimation(); ?>" 
              data-aos-offset="0"
          data-aos-delay="<?= ($index < 9) ? $index * 100 : 0 ?>"
             data-aos-anchor-placement="top-bottom"
             data-aos-duration="500">
            
            <picture>
                <source srcset="<?= BASE_URL . 'build/img/speakers/' . $ponente->imagen; ?>.webp" type="image/webp">
                <img src="<?= BASE_URL . 'build/img/speakers/' . $ponente->imagen; ?>.png" alt="Imagen Ponente" class="speaker__imagen" loading="lazy" width="200" height="300">
            </picture>

            <div class="speaker__informacion">
                <h4 class="speaker__nombre">
                    <?= $ponente->nombre . ' ' . $ponente->apellido; ?>
                </h4>
                <p class="speaker__ubicacion">
                    <?= $ponente->ciudad . ' ' . $ponente->pais; ?>
                </p>

                <nav class="speaker-sociales">
                    <?php $redes = json_decode($ponente->redes); ?>

                    <?php if (!empty($redes->facebook)) : ?>
                        <a href="<?= $redes->facebook ?>" class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank">
                            <span class="speaker-sociales__ocultar">Facebook</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($redes->twitter)) : ?>
                        <a href="<?= $redes->twitter ?>" class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank">
                            <span class="speaker-sociales__ocultar">Twitter</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($redes->instagram)) : ?>
                        <a href="<?= $redes->instagram ?>" class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank">
                            <span class="speaker-sociales__ocultar">Instagram</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($redes->youtube)) : ?>
                        <a href="<?= $redes->youtube ?>" class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank">
                            <span class="speaker-sociales__ocultar">YouTube</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($redes->tiktok)) : ?>
                        <a href="<?= $redes->tiktok ?>" class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank">
                            <span class="speaker-sociales__ocultar">TikTok</span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($redes->github)) : ?>
                        <a href="<?= $redes->github ?>" class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank">
                            <span class="speaker-sociales__ocultar">GitHub</span>
                        </a>
                    <?php endif; ?>
                </nav>

                <ul class="speaker__listado-skills">
                    <?php 
                    $tags = explode(',', $ponente->tags);
                    foreach ($tags as $tag) { ?>
                        <li class="speaker__skill"><?= $tag; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <?php } // fin foreach ?>
    </div>
</section>


<div id="mapa" class='mapa'></div>

<section class="boletos">
    <h2 class="boletos_heading">Tiquets & Precios</h2>
    <p class="boletos__descripcion">Precios para MeetPilot</p>
    <div class="boletos__grid">
       <div class="boleto boleto--presencial" data-aos="<?php aosAnimation();?>" data-aos-delay="50">
    <h4 class="boleto__logo">&#60;Meetpilot</h4>
    <p class="boleto__plan">Presencial</p>
    <p class="boleto__precio">199€</p>
</div>

<div class="boleto boleto--virtual" data-aos="<?php aosAnimation();?>" data-aos-delay="30">
    <h4 class="boleto__logo">&#60;Meetpilot</h4>
    <p class="boleto__plan">Virtual</p>
    <p class="boleto__precio">49€</p>
</div>

<div class="boleto boleto--gratis" data-aos="<?php aosAnimation();?>" data-aos-delay="20">
    <h4 class="boleto__logo">&#60;Meetpilot</h4>
    <p class="boleto__plan">Gratis</p>
    <p class="boleto__precio">Gratis -  0€</p>
</div>

    </div>
<div class="boleto__enlace-contenedor">
    <a href="<?php echo BASE_URL;?>paquetes" class="boleto__enlace">Ver Paquetes</a>

</div>

</section>