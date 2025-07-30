import Swal from 'sweetalert2';
document.addEventListener('DOMContentLoaded', function () {
  let eventos = [];

  const resumen = document.querySelector('#registro-resumen');
if (resumen) {
  
 const eventosSeleccionadosBackend = window.eventosSeleccionadosBackend || [];

    if(eventosSeleccionadosBackend.length > 0){
      eventos = eventosSeleccionadosBackend.map(id => {
        const boton = document.querySelector(`[data-id="${id}"]`);
        if(boton){
          boton.disabled = true;
          const contenedorEvento = boton.closest('.evento');
          const tituloElem = contenedorEvento ? contenedorEvento.querySelector('.evento__nombre') : null;
          const titulo = tituloElem ? tituloElem.textContent.trim() : 'Evento sin título';
          return { id, titulo };
        }
        return null;
      }).filter(e => e !== null);
    }



  const eventosboton = document.querySelectorAll('.evento__agregar');

  eventosboton.forEach(boton =>
    boton.addEventListener('click', seleccionarEvento)
  );
  
  const formularioregistro = document.querySelector('#registro');
  formularioregistro.addEventListener('submit',submitFormulario);

  mostrareventos();

 function seleccionarEvento(e) {
  const id = e.target.dataset.id;

  // Si ya hay 5 eventos seleccionados, no permitir más
  if (eventos.length >=5) {
    Swal.fire({
      title:'Error',
      text: 'Maximo 5 eventos por registro',
      icon: 'error',
      confirmButtonText: 'OK'
    
  });
  return;
  }
  // Si ya existe ese ID en la lista, no hacer nada (evita duplicados)
  if (eventos.some(evento => evento.id === id)) {
    return;
  }

  // Obtener datos del evento desde el DOM
  const contenedorEvento = e.target.closest('.evento');
  if (!contenedorEvento) return;

  const tituloElemento = contenedorEvento.querySelector('.evento__nombre');
  const titulo = tituloElemento ? tituloElemento.textContent.trim() : 'Sin título';

  // Agregar nuevo evento
  eventos.push({
    id: id,
    titulo: titulo
  });

  // Deshabilitar botón
  e.target.disabled = true;

  // Mostrar resumen
  mostrareventos();
}



  function mostrareventos(){
 resumen.innerHTML = ''; 
        if (eventos.length > 0) {
          eventos.forEach(evento =>{
            const eventoDom = document.createElement('DIV');
            eventoDom.classList.add('registro__evento');
            const titulo = document.createElement('H4');
            titulo.classList.add('registro__nombre');
            titulo.textContent= evento.titulo;
            
            const botonEliminar = document.createElement('BUTTON');
            botonEliminar.classList.add('registro__eliminar');
            botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`
            botonEliminar.onclick = function(){
              eliminarEvento(evento.id);
            }
         
            eventoDom.appendChild(titulo);
            eventoDom.appendChild(botonEliminar);
            resumen.appendChild(eventoDom);
          })
        }else{
          const noRegistro = document.createElement('P');
          noRegistro.textContent = 'No hay eventos, añade hasta 5 eventos';
          noRegistro.classList.add('registro__texto');
          resumen.appendChild(noRegistro);

        }
    


  }
  function eliminarEvento(id){
  eventos = eventos.filter(evento => evento.id !== id);
  console.log("ID eliminado:", id);
  
  const botonAgregar = document.querySelector(`[data-id="${id}"]`);
  if (botonAgregar) {
    botonAgregar.disabled = false;
  } else {
    console.warn(`No se encontró ningún botón con data-id="${id}"`);
  }

  mostrareventos();
}



}
async function submitFormulario(e) {
  e.preventDefault();

  const regaloId = document.querySelector('#regalo').value;
  const eventosId = eventos.map(evento => evento.id);

  if (eventosId.length === 0 || regaloId === '') {
    Swal.fire({
      title: 'Error',
      text: 'Elige al menos un evento y un regalo',
      icon: 'error',
      confirmButtonText: 'OK'
    });
    return;
  }

  const baseUrl = window.BASE_URL;

  if (!baseUrl) {
    console.error('BASE_URL no está definida');
    return;
  }

  const datos = new FormData();
 eventosId.forEach((id, i) => {
  datos.append(`eventos[${i}]`, id);
});

  datos.append('regalo_id', regaloId);

  const url = `${baseUrl}finalizar-registro/conferencias`;

  try {
    const respuesta = await fetch(url, {
      method: 'POST',
      body: datos
    });

    const textoRespuesta = await respuesta.text();
    console.log('Respuesta del servidor:', textoRespuesta);

    try {
      const resultado = JSON.parse(textoRespuesta);

     if (resultado.resultado === 'ok') {
  Swal.fire({
    title: 'Registro Exitoso',
    text: 'Tus conferencias se han almacenado correctamente, te esperamos en MeetPilot',
    icon: 'success',
    confirmButtonText: 'OK'
  }).then(() => {
    
    window.location.href = `${baseUrl}boleto?id=${resultado.token}`;
  });
} else {
  Swal.fire({
    title: 'Error',
    text: resultado.mensaje || 'Error en la respuesta del servidor',
    icon: 'error',
    confirmButtonText: 'OK'
  });
}


    } catch (error) {
      console.error('Error al parsear JSON:', error);
      Swal.fire({
        title: 'Error',
        text: 'Respuesta inválida del servidor. Revisa la consola para más detalles.',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    }

  } catch (error) {
    console.error('Error en la petición fetch:', error);
    Swal.fire({
      title: 'Error',
      text: 'No se pudo conectar con el servidor.',
      icon: 'error',
      confirmButtonText: 'OK'
    });
  }
}

 
});
