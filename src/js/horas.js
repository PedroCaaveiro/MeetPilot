(function () {
    const horas = document.querySelector('#horas');

    if (horas) {
        let busqueda = {
            categoria_id: '',
            dia: ''
        };

        const categoria = document.querySelector('[name="categoria_id"]');
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDias = document.querySelector('[name="dia_id"]');
        const inputHiddenHoras = document.querySelector('[name="hora_id"]');

        categoria.addEventListener('change', terminoBusqueda);
        dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));

        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value;

            if (Object.values(busqueda).includes('')) {
                return;
            }

            buscarEventos();
        }

        async function buscarEventos() {
            const baseUrl = window.BASE_URL;
            const { dia, categoria_id } = busqueda;

            if (!baseUrl) {
                console.error('BASE_URL no está definida');
                return;
            }

            const url = `${baseUrl}api/eventos-horario?dia=${dia}&categoria_id=${categoria_id}`;
            console.log('URL de consulta:', url);

            try {
                const respuesta = await fetch(url);
                const resultado = await respuesta.json();
                console.log('Datos recibidos:', resultado);

                obtenetHorasDisponibles(resultado); 
            } catch (error) {
                console.error('Error al buscar eventos:', error);
            }
        }

        function obtenetHorasDisponibles(data) {
            const horasDisponibles = document.querySelectorAll('#horas li');
           horasDisponibles.forEach(hora => hora.addEventListener('click',seleccionarHora))
        }
      function seleccionarHora(e) {
    const horaPrevia = document.querySelector('.horas__hora--seleccionada');

    if (horaPrevia) {
        horaPrevia.classList.remove('horas__hora--seleccionada');
    }

    e.target.classList.add('horas__hora--seleccionada');

    // Asegúrate de que inputHiddenHoras está definido en el ámbito
    inputHiddenHoras.value = e.target.dataset.horaId;
}

    }
})();
