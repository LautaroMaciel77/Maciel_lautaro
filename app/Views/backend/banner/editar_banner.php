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
             
    <form action="<?= base_url('banner/editar/' . $banner['id']) ?>" method="post" enctype="multipart/form-data">
    <div class=" text-white imb-3">
        <label for="nombre" class="form-label">Nombre del producto:</label>
        <input type="text" name="nombre" placeholder="nombre producto" value="<?= $banner['nombre'] ?>" class="form-control" >
    </div>
    <div class="d-flex justify-content-center">
    <div class="image-container text-center">
        <label for="imagen" class="text-white">Imagen Actual</label><br>
        <img src="<?= base_url() ?>/asset/uploads/banner/<?= $banner['img'] ?>" alt="Imagen del producto" style="max-width: 250px; max-height: 250px;">
    </div>
</div>

<div class=" text-white  mb-3">
    <label for="img" class="form-label text-white">Nueva Imagen</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="imagen" name="imagen">
              </div>
    </div>


    <div class="d-grid">
    <button type="submit" class="btn  btn-sm custom-btn mt-3 mb-3">editar</button>
    <a href="<?= site_url('/banner') ?>" class="btn text-white btn-sm custom-btn mt-3 mb-3">cancelar</a>
</div>

</form>

             <!-- Fin del formulario -->
           </div>
         </div>
       </div>
     



</body>

</html>
