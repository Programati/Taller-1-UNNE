<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Comercializacion
<?=$this->endSection()?>

<?=$this->section('content')?>

<section class="container">

  <!-- CABECERA -->
  <div class="row mt-3 text-center justify-content-center">
    <h2>Información</h2>
  </div>

  <hr>

  <!-- LISTA COMO COMPRAR -->
  <div class="row justify-content-center m-2">
  
    <div class="col-md-8">
      <ul class="list-group">
        <li class="list-group-item active text-center breve-descripcion" aria-current="true">¿Cómo comprar?</li>
        <li class="list-group-item">Encontrá tu producto por BANDA, ARTISTA, PERSONAJE o desde el BUSCADOR.</li>
        <li class="list-group-item">Seleccioná el diseño que más te guste y agregalo al carrito.</li>
        <li class="list-group-item">Completá los datos, forma de envío que más cómodo te quede y el medio de pago que más te convenga.</li>
        <li class="list-group-item">Si estas en la Ciudad de Corrientes, contactanos a nuestro Whatsapp para envíos locales.</li>
      </ul>
    </div>
  </div>

  <!-- PAGOS Y ENVIOS-->
  <div class="row m-5">
    <!-- MEDIOS DE PAGOS -->
    <div class="col-md-5">
      <!-- CABECERA e ICONO -->
      <div class="row align-items-center justify-content-center">
        <div class="col-12 text-center">
          <i class="display-1 bi bi-cash-coin"></i>
        </div>
        <div class="col-12 text-center">
          <h4>Pagá con el medio de pago que quieras</h4>
        </div>
      </div>
      <!-- IMAGENES TARJETAS -->
      <div class="row row-cols-2 row-cols-lg-4 text-center justify-content-lg-center">
        <div class="col p-1">
          <img class="img-fluid rounded tarjetas" src="assets/img/magicshopctes/medios_de_pagos/mastercard.png" alt="">
        </div>
        <div class="col p-1">
          <img class="img-fluid rounded tarjetas" src="assets/img/magicshopctes/medios_de_pagos/mercadopago.png" alt="">
        </div>
        <div class="col p-1">
          <img class="img-fluid rounded tarjetas" src="assets/img/magicshopctes/medios_de_pagos/pagofacil.png" alt="">
        </div>
        <div class="col p-1">
          <img class="img-fluid rounded tarjetas" src="assets/img/magicshopctes/medios_de_pagos/rapipago.png" alt="">
        </div>
        <div class="col p-1">
          <img class="img-fluid rounded tarjetas" src="assets/img/magicshopctes/medios_de_pagos/tarjeta-naranja.png" alt="">
        </div>
        <div class="col p-1">
          <img class="img-fluid rounded tarjetas" src="assets/img/magicshopctes/medios_de_pagos/visa.png" alt="">
        </div>
      </div>

    </div>

    <!-- ENVIOS -->
    <div class="col-md-5 mt-5 mt-md-0 ms-auto">
      <!-- CABECERA e ICONO -->
      <div class="row align-items-center">
        <div class="col-12 text-center">
          <i class="display-1 bi bi-truck"></i>
        </div>
        <div class="col-12 text-center">
          <h4>Recibí el producto que esperás</h4>
        </div>
      </div>
        
      <!-- IMAGENES ENVIOS -->
      <div class="row row-cols-2 row-cols-lg-3 text-center">
        <div class="col p-1">
          <img class="img-fluid rounded img-envios" src="assets/img/magicshopctes/medios_de_envios/andreani.png" alt="">
        </div>
        <div class="col p-1">
          <img class="img-fluid rounded img-envios" src="assets/img/magicshopctes/medios_de_envios/correo_argentino.png" alt="">
        </div>
        <div class="col p-1">
          <img class="img-fluid rounded img-envios" src="assets/img/magicshopctes/medios_de_envios/oca.png" alt="">
        </div>
      </div>
    </div>

  </div>
  <!-- PREGUNTAS FRECUENTES -->
  <div class="row m-2">
    <!-- SECCION TITULO -->
    <div class="row">
      <div class="col">
        <h2>Preguntas más frecuentes</h2>
      </div>
    </div>
    
    <hr>
    <!-- SECCION PREGUNTAS -->
    <div class="row">
      <div class="col-12 col-lg-10 accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Pregunta-1" aria-expanded="false" aria-controls="Pregunta-1">
              ¿Envian a través de Moto-Mandados?
            </button>
          </h2>
          <div id="Pregunta-1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Si sos de Corrientes Capital, nos contactas al <strong>WhatsApp</strong> y acordamos el envio.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Pregunta-2" aria-expanded="false" aria-controls="Pregunta-2">
            ¿Tenemos tienda física?
            </button>
          </h2>
          <div id="Pregunta-2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Sólo cuando hay feria en el Parque Camba Cua. Nos encontrarás en unos de los puestos del parque.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Pregunta-3" aria-expanded="false" aria-controls="Pregunta-3">
            ¿Puedo ir a retirar mi pedido?
            </button>
          </h2>
          <div id="Pregunta-3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Si!. Te enviamos la ubicación de nuestro domicilio personal para que puedas recoger el pedido.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Pregunta-4" aria-expanded="false" aria-controls="Pregunta-4">
            ¿Se puede personalizar?
            </button>
          </h2>
          <div id="Pregunta-4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Todos nuestros productos se pueden personalizar al gusto de ustedes.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Pregunta-5" aria-expanded="false" aria-controls="Pregunta-5">
            ¿A dónde enviar las imágenes?
            </button>
          </h2>
          <div id="Pregunta-5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">A nuestro WhatsApp! Tienen un boton de acceso directo desde la web o la solicitan por DM en nuestras redes sociales. En la seccion <a href="<?= base_url(route_to('contacto'))?>">Contacto</a> tienen toda la información para lograr contactarnos a través de diferentes medios</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Pregunta-6" aria-expanded="false" aria-controls="Pregunta-6">
            ¿Cúanto tarda mi producto personalizado?
            </button>
          </h2>
          <div id="Pregunta-6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Sólo el cuaderno tarda varios días(entre 2 y 5 días hábiles), el resto de los productos se pueden hacer en 1 o 2 días, dependiendo de nuestro flujo de trabajo.</div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <br>

  <!-- AYUDA -->
  <div class="row  justify-content-center m-2">
    <div class="col-lg-6">

      <div class="row bg-primary bg-opacity-25 justify-content-center align-items-center p-3 rounded">

        <div class="col-md-8">
          <p class="m-0">No encontraste lo que necesitabas?</p>
        </div>
        <div class="col-md-4 mt-2 mt-md-0">
          <a class="btn btn-primary" href="<?= base_url(route_to('contacto'))?>" role="button">CONTACTANOS</a>
        </div>

      </div>

    </div>
  </div>
  <br>
</section>

<?=$this->endSection()?>