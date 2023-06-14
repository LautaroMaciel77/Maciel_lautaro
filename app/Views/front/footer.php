<!doctype html>
<html lang="en">

<body>

  <div class="container-fluid mt-5 footer text-white">

    <footerclass>
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4">
            <h5 class="mb-3" style="letter-spacing: 2px;">Sobre Nosotros</h5>
            <p class="text-justify">
              Hobbymania es una empresa especializada en la venta de productos y accesorios para aficionados a los
              juegos de mesa.
              Ofrecemos una amplia selección de productos de alta calidad, desde juegos clásicos hasta las ultimas
              novedades
            </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="mb-3">Ayuda</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1 text-white">
                <a class="  text-white text-decoration-none" href="<?php echo base_url(" terminos"); ?>">Preguntas
                  frecuentes</a>
              </li>
              <li class="mb-1">
                <a class="  text-white  text-decoration-none" href="<?php echo base_url(" contacto"); ?>" >Contacto</a>
              </li>
              <li class="mb-1">
                <a class="  text-white text-decoration-none" href="<?php echo base_url(" nosotros"); ?>" >Mas acerca de
                  nosotros</a>
              </li>
              <li>
                <a href="#!" class="  text-white text-decoration-none">Mi cuenta</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4  text-white">
            <h5 class="mb-1" style="letter-spacing: 2px;">Horarios</h5>
            <table class="table  text-white">
              <tbody>
                <tr>
                  <td>Lunes - Viernes:</td>
                  <td>8am - 9pm</td>
                </tr>
                <tr>
                  <td>Sabado - Domingo:</td>
                  <td>8am - 1am</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <img src="<?= base_url() ?>/asset\img\iconos\dice-twenty-faces-twenty-svgrepo-com(1).svg" width="35em" height="35em" alt=""> © 2023
    Copyright:
    <a class="text-white" href="<?php echo base_url(" nosotros"); ?>">Hobbymania.com</a>
  </div>
</body>

</html>