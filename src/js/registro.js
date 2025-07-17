
document.addEventListener('DOMContentLoaded', function () {
  let eventos = [];
  const eventosboton = document.querySelectorAll('.evento__agregar');

  eventosboton.forEach(boton =>
    boton.addEventListener('click', seleccionarEvento)
  );

  function seleccionarEvento(e) {
    const contenedorEvento = e.target.closest('.evento');
    if (!contenedorEvento) return;

    const tituloElemento = contenedorEvento.querySelector('.evento__nombre');
    const titulo = tituloElemento ? tituloElemento.textContent.trim() : 'Sin título';

    eventos = [
      ...eventos,
      {
        id: e.target.dataset.id,
        titulo: titulo
      }
    ];
    e.target.disabled = true;

    mostrareventos();
  }


  function mostrareventos(){
    
        
    


  }
});
