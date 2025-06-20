(function(){
    const ponentesInput = document.querySelector('#ponentes');

    if (ponentesInput) {
        let ponentes = [];
        let ponentesFiltrados = [];

        obtenerPonentes();

        ponentesInput.addEventListener('input', buscarPonentes);

        async function obtenerPonentes(){
            const baseUrl = window.BASE_URL;

            if (!baseUrl) {
                console.error('BASE_URL no está definida');
                return;
            }

            const url = `${baseUrl}api/ponentes`;

            try {
                const respuesta = await fetch(url);
                const resultado = await respuesta.json();

                ponentes = formatearPonentes(resultado);
                console.log('Ponentes formateados:', ponentes);
            } catch (error) {
                console.error('Error al buscar eventos:', error);
            }
        }

        function formatearPonentes(arrayPonentes = []) {
            return arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            });
        }

        function buscarPonentes(e){
            const busqueda = e.target.value;

            if (busqueda.length > 3) {
                const expresion = new RegExp(busqueda, 'i');
                ponentesFiltrados = ponentes.filter(ponente =>
                    expresion.test(ponente.nombre.toLowerCase())
                );
                
            } else {
                ponentesFiltrados = [];
                
            }
        }
    }
})();
