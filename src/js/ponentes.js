(function(){
    const ponentesInput = document.querySelector('#ponentes');

    if (ponentesInput) {
        let ponentes = [];
        let ponentesFiltrados = [];

       const listadoPonentes = document.querySelector('#listado-ponentes');
       const ponenteHidden = document.querySelector('[name="ponente_id"]');


        obtenerPonentes();

        ponentesInput.addEventListener('input', buscarPonentes);

         if (ponenteHidden.value) {
            (async() =>{
                const ponente = await obtenerPonente(ponenteHidden.value);
                const ponenteDOM = document.createElement('LI');
                ponenteDOM.classList.add('listado-ponentes__ponente','listado-ponentes__ponente--seleccionado');
                ponenteDOM.textContent = `${ponente.nombre} ${ponente.apellido}`;
listadoPonentes.appendChild(ponenteDOM);

            })();
        }



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
                
            } catch (error) {
                console.error('Error al buscar eventos:', error);
            }
        }

        async function obtenerPonente(id){

             const baseUrl = window.BASE_URL;

        if (!baseUrl) {
            console.error('BASE_URL no está definida');
            return;
        }

             const url = `${baseUrl}api/ponente?id=${id}`;
             const respuesta = await fetch(url);
             const resultado = await respuesta.json();
             return resultado;
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
            mostrarPonentes();
        }

        function mostrarPonentes(){
            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }   

            if (ponentesFiltrados.length > 0) {
                
                 ponentesFiltrados.forEach(ponente => {

                const ponenteHTML = document.createElement('LI');
                ponenteHTML.classList.add('listado-ponentes__ponente');
                ponenteHTML.textContent = ponente.nombre;
                ponenteHTML.dataset.ponenteId = ponente.id;
                ponenteHTML.onclick = seleccionarPonente;

                listadoPonentes.appendChild(ponenteHTML);

            });
            }else{
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes__no-resultado');
                noResultados.textContent = 'No hay resultados para esta busqueda';
                listadoPonentes.appendChild(noResultados);
            }

           
        }

        function seleccionarPonente(e){

          document.querySelectorAll('.listado-ponentes__ponente--seleccionado')
        .forEach(item => item.classList.remove('listado-ponentes__ponente--seleccionado'));

    
    e.target.classList.add('listado-ponentes__ponente--seleccionado');

  ponenteHidden.value = e.target.dataset.ponenteId;

        }
    }
})();
