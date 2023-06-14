<!doctype html>
<html lang="en">


<body>

  <!--inicio de secion-->
  <div class="container" id="signup">
    <div class="row mt-3">
      <div class="col-md-6 mx-auto bg-dark rounded-top wrapper">
        <h2 class="text-center pt-3">Regístrate ahora</h2>
        <p class="text-center lead mb-3">Solo toma unos pocos segundos</p>
        <!-- Comienzo del formulario -->
        <?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
<?php endif; ?>

        <form  action="<?php echo base_url(); ?>/SignupController/store" method="post">
          <div class="text-white input-group mb-3">
            <img src="asset\img\iconos\person.png">
            <input type="text" name="nombre" placeholder="nombre" value="<?= set_value('nombre') ?>" class="form-control" >
          </div>
          <div class="input-group mb-3">
            <img src="asset\img\iconos\mail.png">
            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
          </div>
          <div class="input-group mb-3">
            <img src="asset\img\iconos\lock.png">
            <input type="password" name="password" placeholder="Password" class="form-control" >
          </div>
          <div class="input-group mb-3">
            <img src="asset\img\iconos\lock.png">
            <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
          </div>
          <div class="d-grid">
          <button type="submit" class="btn  btn-sm custom-btn">Crear Cuenta</button>
            <p class="text-center">
              ¿Ya tienes una cuenta? <a href="#logindemo" data-bs-toggle="modal" role="button">Inicia sesión aquí</a>
            </p>
          </div>
        </form>
        <!-- Fin del formulario -->
      </div>
    </div>
  </div>










</body>

</html>