
  <!-- Workshops -->
<div class="eventos eventos--workshops">
  <h3 class="eventos__heading">&lt;Workshops /></h3>

  <!-- Viernes -->
  <p class="eventos__fecha">Viernes 5 de Octubre</p>
  <div class="eventos__listado swiper slider-workshops-viernes">
    <div class="swiper-wrapper">
      <?php if (!empty($eventos['workshops_v'])): ?>
        <?php foreach($eventos['workshops_v'] as $evento): ?>
          <div class="evento swiper-slide">
            <p class="evento__hora"><?= $evento->hora->hora; ?></p>
            <div class="evento__informacion">
              <h4 class="evento__nombre"><?= $evento->nombre; ?></h4>
              <p class="evento__introduccion"><?= $evento->descripcion; ?></p>

              <div class="evento__autor-info">
                <picture>
                  <source srcset="<?= BASE_URL . 'build/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                  <img src="<?= BASE_URL . 'build/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente" class="evento__imagen-autor" loading="lazy" width="200" height="300">
                </picture>
                <p class="evento__autor-nombre"><?= $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?><p>No hay workshops el viernes.</p><?php endif; ?>
    </div>
    <div class="swiper-button-next btn-workshops-viernes-next"></div>
    <div class="swiper-button-prev btn-workshops-viernes-prev"></div>
  </div>

  <!-- Sábado -->
  <p class="eventos__fecha">Sábado 6 de Octubre</p>
  <div class="eventos__listado swiper slider-workshops-sabado">
    <div class="swiper-wrapper">
      <?php if (!empty($eventos['workshops_s'])): ?>
        <?php foreach($eventos['workshops_s'] as $evento): ?>
          <div class="evento swiper-slide">
            <p class="evento__hora"><?= $evento->hora->hora; ?></p>
            <div class="evento__informacion">
              <h4 class="evento__nombre"><?= $evento->nombre; ?></h4>
              <p class="evento__introduccion"><?= $evento->descripcion; ?></p>

              <div class="evento__autor-info">
                <picture>
                  <source srcset="<?= BASE_URL . 'build/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                  <img src="<?= BASE_URL . 'build/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente" class="evento__imagen-autor" loading="lazy" width="200" height="300">
                </picture>
                <p class="evento__autor-nombre"><?= $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?><p>No hay workshops el sábado.</p><?php endif; ?>
    </div>
    <div class="swiper-button-next btn-workshops-sabado-next"></div>
    <div class="swiper-button-prev btn-workshops-sabado-prev"></div>
  </div>
</div>
