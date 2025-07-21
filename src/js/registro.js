import Swal from 'sweetalert2';
document.addEventListener('DOMContentLoaded', function () {
  let eventos = [];

  const resumen = document.querySelector('#registro-resumen');
if (resumen) {
  


  const eventosboton = document.querySelectorAll('.evento__agregar');

  eventosboton.forEach(boton =>
    boton.addEventListener('click', seleccionarEvento)
  );
  
  const formularioregistro = document.querySelector('#registro');
  formularioregistro.addEventListener('submit',submitFormulario);

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
function submitFormulario(e){
e.preventDefault();

const regaloId = document.querySelector('#regalo').value;
console.log(regaloId);
const eventosId = eventos.map(evento => evento.id);
console.log(eventosId);

if (eventosId.length === 0 || regaloId === '' ) {
   Swal.fire({
      title:'Error',
      text: 'Elige al menos un evento y un regalo',
      icon: 'error',
      confirmButtonText: 'OK'
    
  });
  return;
}

}
 
});
