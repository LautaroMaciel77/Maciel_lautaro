<!doctype html>
<html lang="en">

<div class="container" >
    <div class="row mt-3">
      <div class="col-md-6 mx-auto bg-dark rounded-top wrapper">
        <h2 class="text-center pt-3">Subir Banner</h2>
   
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
             
    <form action="<?php echo base_url(); ?>/store_banner" method="post" enctype="multipart/form-data">
    <div class=" text-white imb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= old('nombre_pro') ?>" class="form-control">
    </div>
    <div class=" text-white  mb-3">
    <label for="img" class="form-label text-white">imagen</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="imagen" name="imagen">
              </div>
    </div>

    <div class="d-grid">
    <button type="submit" class="btn btn-danger mb-3">subir producto</button>
    <button type="reset" class="btn btn-danger mb-3">cancelar</button>
</div>

</form>

             <!-- Fin del formulario -->
           </div>
         </div>
       </div>
     



</body>

</html>
