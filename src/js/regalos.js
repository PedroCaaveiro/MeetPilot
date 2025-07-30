(function() {
  const canvas = document.getElementById('regalos-grafica');

  if (canvas && canvas instanceof HTMLCanvasElement) {

    obtenerDatos()

    async function obtenerDatos(){

         const baseUrl = window.BASE_URL;

          if (!baseUrl) {
    console.error('BASE_URL no está definida');
    return;
  }
    const url = `${baseUrl}api/regalos`;
    const respuesta = await fetch(url);
    const resultado = await respuesta.json();
    
   
    const ctx = canvas.getContext('2d');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: resultado.map(regalo => regalo.nombre),
        datasets: [{
          label: '',
          data: resultado.map(regalo => regalo.total),
          backgroundColor: [
                '#ea580c',
                '#84cc16',
                '#22d3ee',
                '#a855f7',
                '#ef4444',
                '#14b8a6',
                '#db2777',
                '#e11d48',
                '#7e22ce'
            ],
          borderWidth: 2
        }]
      },
    options: {
  scales: {
    x: {
      ticks: {
        color: '#ffffff' // Color del texto (labels) en eje X
      },
      grid: {
        color: '#ffffff',       // Color de las líneas de la cuadrícula X
        borderColor: '#ffffff'  // Color del borde del eje X
      }
    },
    y: {
      beginAtZero: true,
      ticks: {
        color: '#ffffff' // Color del texto (labels) en eje Y
      },
      grid: {
        color: '#ffffff',       // Color de las líneas de la cuadrícula Y
        borderColor: '#ffffff'  // Color del borde del eje Y
      }
    }
  },
  plugins: {
    legend: {
      display: false
    }
  }
}


    });
  }
}
})();
