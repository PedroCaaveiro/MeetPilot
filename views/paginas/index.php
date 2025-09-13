<?php 
include_once __DIR__ . '/workshops-conferencias.php';
?>

<section class="resumen">
    <div class="resumen__grid">
        <?php
        $resumenItems = [
            ['valor' => $ponentesTotal, 'texto' => 'Speakers'],
            ['valor' => $conferenciasTotal, 'texto' => 'Conferencias'],
            ['valor' => $workshopsTotal, 'texto' => 'Workshops'],
            ['valor' => 500, 'texto' => 'Asistentes']
        ];
        foreach ($resumenItems as $item):
        ?>
        <div class="resumen__bloque" data-animate="fade">
            <p class="resumen__texto resumen__texto--numero" data-count="<?= $item['valor'] ?>">0</p>
            <p class="resumen__texto"><?= $item['texto'] ?></p>  
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros Expertos de MeetPilot</p>

    <div class="speakers__grid">
        <?php foreach ($ponentes as $index => $ponente):
            $claseFondo = '';
            if ($index % 4 === 0) $claseFondo = ' speaker--destacado-1';
            elseif ($index % 4 === 1) $claseFondo = ' speaker--destacado-2';
            elseif ($index % 4 === 2) $claseFondo = ' speaker--destacado-3';
        ?>
        <div class="speaker<?= $claseFondo ?>" data-animate="fade" data-index="<?= $index ?>">
            <picture>
                <source srcset="<?= BASE_URL . 'build/img/speakers/' . $ponente->imagen; ?>.webp" type="image/webp">
                <img src="<?= BASE_URL . 'build/img/speakers/' . $ponente->imagen; ?>.png" alt="Imagen Ponente" class="speaker__imagen" loading="lazy" width="200" height="300">
            </picture>

            <div class="speaker__informacion">
                <h4 class="speaker__nombre"><?= $ponente->nombre . ' ' . $ponente->apellido; ?></h4>
                <p class="speaker__ubicacion"><?= $ponente->ciudad . ' ' . $ponente->pais; ?></p>

                <nav class="speaker-sociales">
                    <?php $redes = json_decode($ponente->redes); ?>
                    <?php foreach(['facebook','twitter','instagram','youtube','tiktok','github'] as $red): ?>
                        <?php if (!empty($redes->$red)): ?>
                            <a href="<?= $redes->$red ?>" class="speaker-sociales__enlace" target="_blank" rel="noopener noreferrer">
                                <span class="speaker-sociales__ocultar"><?= ucfirst($red) ?></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </nav>

                <ul class="speaker__listado-skills">
                    <?php foreach(explode(',', $ponente->tags) as $tag): ?>
                        <li class="speaker__skill"><?= $tag ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<div id="mapa" class="mapa"></div>

<section class="boletos">
    <h2 class="boletos_heading">Tiquets & Precios</h2>
    <p class="boletos__descripcion">Precios para MeetPilot</p>

    <div class="boletos__grid">
        <?php 
        $boletos = [
            ['clase'=>'presencial','plan'=>'Presencial','precio'=>'199€'],
            ['clase'=>'virtual','plan'=>'Virtual','precio'=>'49€'],
            ['clase'=>'gratis','plan'=>'Gratis','precio'=>'0€']
        ];
        foreach($boletos as $index => $boleto): 
        ?>
        <div class="boleto boleto--<?= $boleto['clase'] ?>" data-animate="fade" data-index="<?= $index ?>">
            <h4 class="boleto__logo">&#60;Meetpilot</h4>
            <p class="boleto__plan"><?= $boleto['plan'] ?></p>
            <p class="boleto__precio"><?= $boleto['precio'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="boleto__enlace-contenedor">
        <a href="<?= BASE_URL; ?>paquetes" class="boleto__enlace">Ver Paquetes</a>
    </div>
</section>

<style>
[data-animate] {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

[data-animate].active {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const elementos = document.querySelectorAll('[data-animate]');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                const el = entry.target;
                const index = parseInt(el.dataset.index) || 0;

                setTimeout(() => el.classList.add('active'), index * 100); // escalonamiento suave

                // Animar números
                if(el.dataset.animate === 'fade'){
                    const numberEl = el.querySelector('[data-count]');
                    if(numberEl){
                        const valor = parseInt(numberEl.dataset.count);
                        let current = 0;
                        const step = Math.ceil(valor / 50);
                        const interval = setInterval(()=>{
                            current += step;
                            if(current >= valor){
                                numberEl.textContent = valor;
                                clearInterval(interval);
                            } else {
                                numberEl.textContent = current;
                            }
                        }, 15);
                    }
                }

                observer.unobserve(el);
            }
        });
    }, { threshold: 0.2 });

    elementos.forEach(el => observer.observe(el));
});
</script>
