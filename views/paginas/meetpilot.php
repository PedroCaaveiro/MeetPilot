<main class="meetpilot">
    <h2 class="meetpilot__heading texto-negro"><?php echo $titulo;?></h2>

    <p class="meetpilot__descripcion">Conoce la conferencia mas importante de España</p>

    <div class="meetpilot__grid">
        <div class="meetpilot__imagen">
           <picture>
    <source src="<?= ASSETS_URL . 'build/img/sobre_devwebcamp.avif'; ?>" type="image/avif">
    <source src="<?= ASSETS_URL . 'build/img/sobre_devwebcamp.webp'; ?>" type="image/webp">
    <img loading="lazy" 
         src="<?= ASSETS_URL . 'build/img/sobre_devwebcamp.jpg'; ?>" 
         width="200" 
         height="300" 
         alt="Imagen MeetPilot">
</picture>

        </div>
        <div class="meetpilot__contenido">
            <p class="meetpilot__texto">Fundada en 2023, MeetPilot nace con la visión de conectar a ponentes y asistentes de todo el mundo en un entorno seguro y altamente interactivo.

Con MeetPilot, los usuarios pueden crear eventos personalizados, gestionar inscripciones y ofrecer experiencias únicas mediante salas virtuales con video en alta definición, chat en tiempo real y herramientas de colaboración integradas. Cada conferencia puede ser configurada con horarios flexibles, paquetes de acceso exclusivos y recursos adicionales como documentos, presentaciones y encuestas interactivas.</p>
            <p class="meetpilot__texto">Con MeetPilot, cada reunión se convierte en una experiencia única, fomentando la participación activa, la interacción significativa y el aprendizaje colaborativo. Únete a nuestra comunidad y descubre cómo llevar tus eventos online al siguiente nivel.</p>

        </div>
        
    </div>
</main>