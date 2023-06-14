<!doctype html>
<html lang="en">

<div class="container" >
    <div class="row mt-3">
      <div class="col-md-6 mx-auto bg-dark rounded-top wrapper">
        <h2 class="text-center pt-3">editar producto</h2>
        <p class="text-center lead mb-3">Solo toma unos pocos segundos</p>
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
             
           
    <form action="<?= base_url('product/editar/' . $producto['id']) ?>"  method="post" enctype="multipart/form-data">
    <div class=" text-white imb-3">
        <label for="nombre_pro" class="form-label">Nombre del producto:</label>
        <input type="text" name="nombre_pro" placeholder="nombre producto" value="<?= $producto['nombre_pro'] ?>" class="form-control" >
    </div>
    <div class=" text-white mb-3">
        <label for="precio" class="form-label">Precio:</label>
        <input type="number" name="precio" placeholder="precio" value="<?= $producto['precio'] ?>"  class="form-control">
    </div>
    <div class=" text-white  mb-3">
        <label for="precio_lista" class="form-label">Precio de lista:</label>
        <input type="number" name="precio_lista" placeholder="precio lista"  value="<?= $producto['precio_lista'] ?>" class="form-control" >
    </div>
    <div class= " text-white  mb-3">
        <label for="stock" class="form-label">Stock:</label>
        <input type="number" name="stock" placeholder="stock"   value="<?= $producto['stock'] ?>"   class="form-control" >
    </div>
    <div class=" text-white  mb-3">
        <label for="stock_min" class="form-label">Stock mínimo:</label>
        <input type="number" name="stock_min" placeholder="stock minimo"   value="<?= $producto['stock_min'] ?>"   class="form-control" >
    </div>
    <div class="text-white mb-3">
        <label for="categoria_id" class="text-white">Categoría:</label>
    <select name="categoria_id" class="form-control">
        <option value="1" <?= ($producto['categoria_id'] == 1) ? 'selected' : '' ?>>Juego de mesa</option>
        <option value="2" <?= ($producto['categoria_id'] == 2) ? 'selected' : '' ?>>Juego de rol</option>
        <option value="3" <?= ($producto['categoria_id'] == 3) ? 'selected' : '' ?>>TGC</option>
    </select>
    </div>
    <div class="input-group mb-3">
    <textarea name="descripcion" placeholder="Descripción" class="form-control scrollable-textarea" rows="5"><?= $producto['descripcion'] ?></textarea>
</div>
    <div class="d-flex justify-content-center">
    <div class="image-container text-center">
        <label for="imagen" class="text-white">Imagen Actual</label><br>
        <img src="<?= base_url() ?>/asset/uploads/<?= $producto['img'] ?>" alt="Imagen del producto" style="max-width: 250px; max-height: 250px;">
    </div>
</div>

<div class=" text-white  mb-3">
    <label for="img" class="form-label text-white">Nueva Imagen</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="imagen" name="imagen">
              </div>
    </div>







<div class="d-grid mt-3">
    <button type="submit" class="btn btn-sm custom-btn  mb-3">subir producto</button>
    <a href="<?= site_url('/productos') ?>" class="btn text-white btn-sm custom-btn mt-3 mb-3">cancelar</a>
</div>

</form>



             <!-- Fin del formulario -->
           </div>
         </div>
       </div>
     



</body>

</html>
