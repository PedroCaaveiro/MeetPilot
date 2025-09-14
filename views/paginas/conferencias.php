 <div class="eventos">
    <h3 class="eventos__heading">&lt;Conferencias /></h3>

    <!-- Viernes 5 de Octubre -->
    <p class="eventos__fecha">Viernes 5 de Octubre</p>
    <div class="eventos__listado swiper slider-conferencias-viernes">
      <div class="swiper-wrapper">
        <?php if (!empty($eventos['conferencias_v'])): ?>
          <?php foreach($eventos['conferencias_v'] as $evento): ?>
            <div class="evento swiper-slide">
              <p class="evento__hora"><?= $evento->hora->hora; ?></p>
              <div class="evento__informacion">
                <h4 class="evento__nombre"><?= $evento->nombre; ?></h4>
                <p class="evento__introduccion"><?= $evento->descripcion; ?></p>
                <div class="evento__autor-info">
                  <picture>
                    <source srcset="<?= ASSETS_URL  . 'build/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                    <img src="<?= ASSETS_URL  . 'build/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente" class="evento__imagen-autor" loading="lazy" width="200" height="300">
                  </picture>
                  <p class="evento__autor-nombre"><?= $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?><p>No hay conferencias el viernes.</p><?php endif; ?>
      </div>
      <div class="swiper-button-next btn-conferencias-viernes-next"></div>
      <div class="swiper-button-prev btn-conferencias-viernes-prev"></div>
    </div>

    <!-- Sábado 6 de Octubre -->
    <p class="eventos__fecha">Sábado 6 de Octubre</p>
    <div class="eventos__listado swiper slider-conferencias-sabado">
      <div class="swiper-wrapper">
        <?php if (!empty($eventos['conferencias_s'])): ?>
          <?php foreach($eventos['conferencias_s'] as $evento): ?>
            <div class="evento swiper-slide">
              <p class="evento__hora"><?= $evento->hora->hora; ?></p>
              <div class="evento__informacion">
                <h4 class="evento__nombre"><?= $evento->nombre; ?></h4>
                <p class="evento__introduccion"><?= $evento->descripcion; ?></p>
                <div class="evento__autor-info">
                  <picture>
                    <source srcset="<?= ASSETS_URL  . 'build/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                    <img src="<?= ASSETS_URL  . 'build/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente" class="evento__imagen-autor" loading="lazy" width="200" height="300">
                  </picture>
                  <p class="evento__autor-nombre"><?= $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?><p>No hay conferencias el sábado.</p><?php endif; ?>
      </div>
      <div class="swiper-button-next btn-conferencias-sabado-next"></div>
      <div class="swiper-button-prev btn-conferencias-sabado-prev"></div>
    </div>
  </div>