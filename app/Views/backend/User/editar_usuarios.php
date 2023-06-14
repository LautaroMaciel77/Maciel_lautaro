<!doctype html>
<html lang="en">

<div class="container" >
    <div class="row mt-3">
      <div class="col-md-6 mx-auto bg-dark rounded-top wrapper">
        <h2 class="text-center pt-3">Editar Cuenta</h2>
   
        <!-- Comienzo del formulario -->
  <!--inicio de secion-->
  <div class="custom-alert">
    <!--recuperamos datos con la función Flashdata para mostrarlos-->
    <?php if (session()->getFlashdata('warning')) {
        echo "<div class='h6 text-center alert alert-warning alert-dismissible'>
              <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('warning') . "
           </div>";
    }
    ?>
</div>

    <?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Resto del código del formulario -->


    <?php  $validation = \Config\Services::validation();?>
             
    <form action="<?= base_url('user/editar/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
    <div class=" text-white imb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" placeholder="nombre producto" value="<?= $user['nombre'] ?>" class="form-control" >
    </div>
  
    <div class=" text-white imb-3">
        <label  class="form-label">mail:</label>
        <input type="text" name="email" placeholder="nombre producto" value="<?= $user['email'] ?>" class="form-control" >
    </div>

    <div class=" text-white imb-3">
        <label  class="form-label">Ingrese contraseña si quiere restablecer a una nueva:</label>
        <input type="password" name="current_password" placeholder="...."  class="form-control" >
    </div>
    <div class=" text-white imb-3">
        <label  class="form-label">Nueva contraseña:</label>
        <input type="password" name="new_password" placeholder=".... "class="form-control" >
    </div>
    <div class=" text-white imb-3">
        <label  class="form-label">Confirma nueva contraseña:</label>
        <input type="password" name="confirm_password" placeholder="....." class="form-control" >
    </div>

    <div class="d-grid">
    <button type="submit" class="btn btn-danger mb-3">editar</button>
    <button type="reset" class="btn btn-danger mb-3">cancelar</button>
</div>

</form>

             <!-- Fin del formulario -->
           </div>
         </div>
       </div>
     



</body>

</html>
