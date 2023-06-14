
    <!doctype html>
<html lang="en">


<body>
    
<h1 class="text-center mt-3">Tabla de Productos Eliminados</h1>

<section class="container mt-4 text-center">
    <form action="<?= base_url('/buscar_producto') ?>" method="post" class="mb-3">
        <div class="input-group input-group-sm">
            <input type="text" name="search" class="form-control" placeholder="Buscar producto">
            <input type="hidden" name="vista" value="1">
            <button type="submit" class="btn  btn-sm custom-btn">Buscar</button>
        </div>
    </form>

<?php if (!empty($search)) : ?>

  
    <a href="<?= site_url('/productos_eliminados') ?>"  class="btn  btn-sm custom-btn">Ver todos los eliminados</a>
<?php endif; ?>
<a href="<?= site_url('/productos') ?>"  class="btn  btn-sm custom-btn">volver a productos</a>
</section>





    <div class="container mt-5">
    <div class="table-responsive">
        <table class="table  producto-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Precio Lista</th>
                    <th>Stock</th>
                    <th>Stock Mínimo</th>
                    <th>Fecha Modificación</th>
                    <th>Eliminado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($producto as $producto) : ?>
                    <?php if ($producto['elimininado'] == 'SI') : ?>
                        <tr>
                        <td class="resaltado"><?= $producto['id'] ?></td>
                        <td><?= $producto['nombre_pro'] ?></td>
                        <td><?= $producto['categoria_id'] ?></td>
                        <td><img src="<?= base_url() ?>/asset/uploads/<?= $producto['img'] ?>" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;"></td>
                        <td><?= $producto['precio'] ?></td>
                        <td><?= $producto['precio_lista'] ?></td>
                        <td><?= $producto['stock'] ?></td>
                        <td><?= $producto['stock_min'] ?></td>
                        <td><?= $producto['fecha_modificacion'] ?></td>
                        <td><?= $producto['elimininado'] ?></td>
                            <td>
                            <form action="<?= base_url('product/change_baja/' . $producto['id']) ?>" method="post" style="display: inline;">
    <button type="submit" class="btn btn-sm">Restaurar</button>
</form>

<form action="<?= base_url('product/editar_producto/' . $producto['id']) ?>" method="post" style="display: inline;">
    <button type="submit" class="btn btn-sm">Editar</button>
</form>

                            </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    
</body>

</html>