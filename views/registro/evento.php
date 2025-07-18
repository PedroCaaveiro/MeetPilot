 <div class="evento ">
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

                <button 
                type='button' 
                data-id="<?php echo $evento->id;?>"
                class='evento__agregar'
                <?php echo ($evento->disponibles === "0" ? 'disabled'  : ''); ?>
                
                >
                  <?php echo ($evento->disponibles === "0" ? 'Agotado'  : 'Agregar - ' . $evento->disponibles . ' Disponibles' ); ?>
                </button>
              </div>
            </div>