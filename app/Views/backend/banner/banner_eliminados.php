<!doctype html>
<html lang="en">


<body>
    <h2 class="text-center mt-3">Tabla de Banner</h2>
    <section class="container mt-4 text-center">
    <form action="<?= base_url('/buscar_banner') ?>" method="post" class="mb-3">
        <div class="input-group input-group-sm">
        <input type="hidden" name="vista" value="1">
            <input type="text" name="search" class="form-control" placeholder="Buscar producto">
            <button type="submit" class="btn  btn-sm custom-btn">Buscar</button>
        </div>
    </form>

    <?php if (!empty($search)) : ?>
        <a href="<?= site_url('/banner_eliminados') ?>" class="btn  btn-sm custom-btn">Volver</a>
    <?php endif; ?>
    <a href="<?= site_url('/banner') ?>" class="btn  btn-sm custom-btn">Volver a Banners</a>
</section>





    <div class="container mt-5">
    <div class="table-responsive">
        <table class="table  producto-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>Imagen</th>
                    <th>Eliminado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banners as $banner) : ?>
                    <?php if ($banner['baja'] == 'SI' ) : ?>
                        <tr>
                        <td class="resaltado"><?= $banner['id'] ?></td>
                        <td><?= $banner['nombre'] ?></td>
                        <td><img src="<?= base_url() ?>/asset/uploads/banner/<?= $banner['img'] ?>" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;"></td>
                        <td><?= $banner['baja'] ?></td>
                            <td>
                            <form action="<?= base_url('banner/change_baja/' . $banner['id']) ?>" method="post" style="display: inline;">
    <button type="submit" class="btn btn-sm">Cambiar Baja</button>
</form>

<form action="<?= base_url('editar_banner/' . $banner['id']) ?>" method="post" style="display: inline;">
    <button type="submit" class="btn btn-sm">Editar</button>
</form>

                            </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
    <?= $paginador->links(); ?>
</div>
    </div>
    </div>
    
</body>

</html>