<!DOCTYPE html>
<html lang="en">

<body>

  <div class="container-fluid pt-5 text-center">
    <div class="tittle">
      <h1 class="text-center"> <img src="asset\img\auriculares.png" alt="audiculares"> Bienvenido al <span>
          centro de ayuda </span>de hobbymania</h1>
      <h3> Contactate con nuestros asesores via</h3>
    </div>


  </div>



  </div>
  <div class="container-fluid p-5 text-center">
    <div class="row">

      <div class="col-12 col-md-6 ">
        <img src="asset\img\telefino.png" class="img-fluid" alt="telefono">
      </div>
      <div class="col-12 col-md-6">
        <img src="asset\img\whatsapp-help.png" class="img-fluid" alt="telefono">
      </div>

    </div>
  </div>

  <div class="container text-white">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center mb-4">Horarios de atención</h2>
      </div>
      <div class="col-md-6 text-center">
        <strong> TEL. / WhatsApp / Mail </strong>
        <div class="table-responsive">
          <table class="table table-bordered  mt-2 text-white">
            <thead>
              <tr>
                <th scope="col"><strong>Dia</strong></th>
                <th scope="col"><strong>Horario</strong></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Lunes a viernes</td>
                <td>8:00 - 18:00</td>
              </tr>

            </tbody>
          </table>
        </div>
        </p>
      </div>
      <div class="col-md-6 text-center">
        <strong>Horarios de la tienda</strong>
        <div class="table-responsive">
          <table class="table table-bordered  mt-2 text-white">
            <thead>
              <tr>
                <th scope="col">Día</th>
                <th scope="col">Horario</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Lunes a viernes</td>
                <td>8:00 - 21:00</td>
              </tr>
              <tr>
                <td>Sábado y domingo</td>
                <td>8:00 - 13:00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>





  <div class="container">
    <div class="row">


      <div class=" col-md-6 col-sm-12 py-4">
        <div class="fom-area ">
          <!-- Bootstrap 5 starter form -->
          <form id="contactForm"  action="<?= base_url() ?>store_consulta" method="post">

            <!-- Name input -->
            <div class="mb-3">
              <label class="form-label" >asunto</label>
              <input class="form-control" name="asunto" type="text" placeholder="asunto del mensaje" />
            </div>

            <!-- Email address input -->
            <div class="mb-3">
              <label class="form-label" >Direccion de Email </label>
              <input class="form-control" name="mail" type="email" placeholder="Direccion de Email" />
            </div>

            <!-- Message input -->
            <div class="mb-3">
              <label class="form-label">Mensaje</label>
              <textarea class="form-control" name="mensaje" type="text" placeholder="Mensaje"
                style="height: 10rem;"></textarea>
            </div>

            <!-- Form submit button -->
            <div class="d-grid">
              <button class="btn  btn-lg" type="submit">Enviar</button>
            </div>

          </form>
        </div>

      </div>
      <div class=" col-md-6 col-sm-12 py-4">
        <div class="map-area">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2431.961435334594!2d-58.831962942950796!3d-27.46639689594309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses!2sar!4v1681946103804!5m2!1ses!2sar"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>


      </div>
    </div>
  </div>
  </div>
  </div>



</body>

</html>