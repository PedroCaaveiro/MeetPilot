<main class="registro">
    <h2 class="registro__heading"> <?php echo $titulo;?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
    <div class="paquete">
        <h3 class="paquete__nombre">Pase Gratis</h3>
        <ul class="paquete__lista">
            <li class="paquete__elemento">Acceso Virtual a MeetPilot</li>
        </ul>
        <p class="paquete__precio">0 €</p>

        <form action="<?php echo BASE_URL;?>finalizar-registro/gratis" method="POST">

    <input class="paquetes__submit" type='submit' value='Inscripción gratis'>

        </form>

    </div>
     <div class="paquete">
        <h3 class="paquete__nombre">Pase Presencial</h3>
        <ul class="paquete__lista">
            <li class="paquete__elemento">Acceso Presencial a MeetPilot</li>
            <li class="paquete__elemento">Pase 2 días</li>
             <li class="paquete__elemento">Acceso Talleres & Conferencias</li>
              <li class="paquete__elemento">Acceso Grabaciones</li>
              <li class="paquete__elemento">Camisa Evento</li>
               <li class="paquete__elemento">Comida & Bebida</li>
        </ul>
        <p class="paquete__precio">199 €</p>
        <div id="paypal-button-presencial"></div>

    

    </div>


      <div class="paquete">
        <h3 class="paquete__nombre">Pase Virtual</h3>
        <ul class="paquete__lista">
            <li class="paquete__elemento">Acceso Virtual a MeetPilot</li>
            <li class="paquete__elemento">Pase 2 días</li>
             <li class="paquete__elemento">Enlace Talleres & Conferencias</li>
              <li class="paquete__elemento">Acceso Grabaciones</li>
              <li class="paquete__elemento">Camisa Evento</li>
               
        </ul>
        <p class="paquete__precio">49 €</p>
 <div id="paypal-button-virtual"></div>
    </div>
</div>
</main>

<!-- SDK PayPal en modo SANDBOX -->
<script src="https://www.paypal.com/sdk/js?client-id=AXXCwJDCAmB8ryBpQSQ2R749VN3F0jAFd5eUOzoiveZHJNnXLCKTx5TyQZ9CJArJgN2K6_t3FyDzg_os&currency=EUR"></script>

<script>
  window.BASE_URL = "<?php echo BASE_URL; ?>"; 
</script>

<script>
paypal.Buttons({
  style: {
    color: 'blue',     // Botón azul
    shape: 'pill',     // Forma redondeada
    label: 'paypal'    // Texto del botón
  },
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        description: "Pase Presencial MeetPilot",
        amount: {
          value: '199.00',
          currency_code: 'EUR'
        }
      }]
    });
  },
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(orderData) {
     const datos = new FormData();
     datos.append('paquete_id',1);
     datos.append('pago_id',orderData.purchase_units[0].payments.captures[0].id);



      const baseUrl = window.BASE_URL;
     fetch(baseUrl + 'finalizar-registro/pagar',{
      method: 'POST',
      body: datos
     }).then(respuesta=> respuesta.json())
     .then(resultado => {
      if (resultado.resultado === 'ok') {
        window.location.href = baseUrl + 'finalizar-registro/conferencias';

        
      }
     })

    });
  }
}).render('#paypal-button-presencial');



paypal.Buttons({
  style: {
    color: 'blue',
    shape: 'pill',
    label: 'paypal'
  },
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        description: "Pase Virtual MeetPilot",
        amount: {
          value: '49.00',
          currency_code: 'EUR'
        }
      }]
    });
  },
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(orderData) {
      const datos = new FormData();
      datos.append('paquete_id', 2); // ID correcto del pase virtual
      datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

      const baseUrl = window.BASE_URL;
      fetch(baseUrl + 'finalizar-registro/pagar', {
        method: 'POST',
        body: datos
      })
      .then(respuesta => respuesta.json())
      .then(resultado => {
     
        if (resultado.resultado === 'ok') {
         window.location.href = baseUrl + 'finalizar-registro/conferencias';

        } else {
          alert('Error en el registro. Intenta de nuevo.');
        }
      });
    });
  }
}).render('#paypal-button-virtual');

</script>