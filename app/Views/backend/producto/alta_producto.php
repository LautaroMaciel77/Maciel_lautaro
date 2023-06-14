<!doctype html>
<html lang="en">

<div class="container" >
    <div class="row mt-3">
      <div class="col-md-6 mx-auto bg-dark rounded-top wrapper">
        <h2 class="text-center pt-3">registro producto</h2>
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
             
           
    <form action="<?php echo base_url(); ?>/ProductoController/store" method="post" enctype="multipart/form-data">
    <div class=" text-white imb-3">
        <label for="nombre_pro" class="form-label">Nombre del producto:</label>
        <input type="text" name="nombre_pro" id="nombre_pro" placeholder="Nombre del producto" value="<?= old('nombre_pro') ?>" class="form-control">
    </div>
    <div class=" text-white mb-3">
        <label for="precio" class="form-label">Precio:</label>
        <input type="number" name="precio" id="precio" placeholder="Precio" value="<?= old('precio') ?>" step="0.01"  min="0" class="form-control">
    </div>
    <div class=" text-white  mb-3">
        <label for="precio_lista" class="form-label">Precio de lista:</label>
        <input type="number" name="precio_lista" id="precio_lista" placeholder="Precio de lista"  step="0.01"  min="0" value="<?= old('precio_lista') ?>" class="form-control">
    </div>
    <div class= " text-white  mb-3">
        <label for="stock" class="form-label">Stock:</label>
        <input type="number" name="stock" id="stock" min="0"  placeholder="Stock"  value="<?= old('stock') ?>"  class="form-control">
    </div>
    <div class=" text-white  mb-3">
        <label for="stock_min" class="form-label">Stock mínimo:</label>
        <input type="number" name="stock_min" id="stock_min" placeholder="Stock mínimo" min="0" value="<?= old('stock_min') ?>"  class="form-control">
    </div>
    <div class="text-white mb-3">
        <label for="categoria_id" class="text-white">Categoría:</label>
        <select name="categoria_id" class="form-control">
            <?php foreach($categorias as $categoria){    ?>
                <option value="<?php echo $categoria['id']; ?>">
                <?php echo $categoria['id'], ".", $categoria['descripcion'];} ?>
                </option>?>
       
        </select>
    </div>
    <div class="input-group mb-3">
        <textarea name="descripcion" placeholder="Descripción" class="form-control" rows="5"><?= old('descripcion') ?></textarea>
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
