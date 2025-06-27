(function () {
    const horas = document.querySelector('#horas');

    if (!horas) {
        console.warn('No se encontró el contenedor de horas (#horas)');
        return;
    }

    const categoria = document.querySelector('[name="categoria_id"]');
    const dias = document.querySelectorAll('[name="dia"]');
    const inputHiddenDias = document.querySelector('[name="dia_id"]');
    const inputHiddenHoras = document.querySelector('[name="hora_id"]');

    if (!categoria || dias.length === 0 || !inputHiddenDias || !inputHiddenHoras) {
        console.error('Faltan campos obligatorios en el formulario.');
        return;
    }

    // Estado de búsqueda actual
    let busqueda = {
        categoria_id: categoria.value || '',
        dia: +inputHiddenDias.value || ''
    };

    console.log('Estado inicial busqueda:', busqueda);

    // Escuchar cambios para volver a buscar eventos
    categoria.addEventListener('change', terminoBusqueda);
    dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));

    // Iniciar la app
    if (!Object.values(busqueda).includes('')) {
        iniciarApp();
    } else {
        console.log('Faltan datos para iniciar la búsqueda de eventos.');
    }

    async function iniciarApp() {
        console.log('Iniciando app, buscando eventos...');
        await buscarEventos();
        marcarHoraSeleccionada();
    }

    function terminoBusqueda(e) {
        console.log('Cambio en formulario:', e.target.name, e.target.value);
        busqueda[e.target.name] = e.target.value;

        // Resetear selección de hora y día hidden
        inputHiddenHoras.value = '';
        inputHiddenDias.value = '';

        // Quitar selección previa visible
        const horaPrevia = document.querySelector('.horas__hora--seleccionada');
        if (horaPrevia) {
            horaPrevia.classList.remove('horas__hora--seleccionada');
        }

        if (Object.values(busqueda).includes('')) {
            console.log('Datos incompletos, no se realiza búsqueda.');
            return;
        }

        // Ejecutar nueva búsqueda
        buscarEventos();
    }

    async function buscarEventos() {
        const baseUrl = window.BASE_URL;
        const { dia, categoria_id } = busqueda;

        if (!baseUrl) {
            console.error('BASE_URL no está definida');
            return;
        }

        const url = `${baseUrl}api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;
        console.log('Buscando eventos en URL:', url);

        try {
            const respuesta = await fetch(url);
            if (!respuesta.ok) {
                throw new Error(`HTTP error! status: ${respuesta.status}`);
            }
            const resultado = await respuesta.json();
            console.log('Eventos recibidos:', resultado);

            obtenetHorasDisponibles(resultado);
            marcarHoraSeleccionada();

        } catch (error) {
            console.error('Error al buscar eventos:', error);
        }
    }

    function obtenetHorasDisponibles(resultados) {
        console.log('Actualizando horas disponibles...');
        const listadoHoras = document.querySelectorAll('#horas li');

        // Marcar todas las horas como deshabilitadas primero
        listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitado'));

        // Obtener IDs de horas tomadas
        const horasTomadas = resultados.map(resultado => resultado.hora_id);
        console.log('Horas tomadas:', horasTomadas);

        // Filtrar horas libres
        const listadoHorasArray = Array.from(listadoHoras);
        const resultadoFinal = listadoHorasArray.filter(li => !horasTomadas.includes(+li.dataset.horaId));

        // Quitar deshabilitado solo en horas libres
        resultadoFinal.forEach(li => li.classList.remove('horas__hora--deshabilitado'));

        // Añadir evento click solo a horas disponibles
        const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitado)');
        horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora));

        console.log(`Horas habilitadas: ${horasDisponibles.length}`);
    }

    function marcarHoraSeleccionada() {
        const id = inputHiddenHoras.value;
        console.log('Hora seleccionada actualmente:', id);

        if (!id) {
            console.log('No hay hora seleccionada para marcar.');
            return;
        }

        const horaSeleccionada = document.querySelector(`[data-hora-id="${id}"]`);
        if (horaSeleccionada) {
            // Asegurarse que esté habilitada y seleccionada
            if (horaSeleccionada.classList.contains('horas__hora--deshabilitado')) {
                console.log('Hora seleccionada estaba deshabilitada, habilitando para edición.');
                horaSeleccionada.classList.remove('horas__hora--deshabilitado');
            }
            // Quitar selección previa si existe
            const seleccionPrevia = document.querySelector('.horas__hora--seleccionada');
            if (seleccionPrevia) {
                seleccionPrevia.classList.remove('horas__hora--seleccionada');
            }
            horaSeleccionada.classList.add('horas__hora--seleccionada');
        } else {
            console.warn(`No se encontró la hora con data-hora-id="${id}" para marcar.`);
        }
    }

    function seleccionarHora(e) {
        const horaPrevia = document.querySelector('.horas__hora--seleccionada');
        if (horaPrevia) {
            horaPrevia.classList.remove('horas__hora--seleccionada');
        }

        e.target.classList.add('horas__hora--seleccionada');

        inputHiddenHoras.value = e.target.dataset.horaId;

        const diaSeleccionado = document.querySelector('[name="dia"]:checked');
        if (diaSeleccionado) {
            inputHiddenDias.value = diaSeleccionado.value;
            busqueda.dia = diaSeleccionado.value;
        }

        console.log(`Hora seleccionada: ${inputHiddenHoras.value}, Día seleccionado: ${inputHiddenDias.value}`);
    }

})();
