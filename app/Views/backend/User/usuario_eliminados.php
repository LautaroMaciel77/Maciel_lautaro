<!doctype html>
<html lang="en">

<body>
<h2 class="text-center mt-3">Tabla de Usuarios dado de baja</h2>
<section class="container mt-4 text-center">
<form action="<?= base_url('/buscar') ?>" method="post" class="mb-3">
        <div class="input-group input-group-sm">
        <input type="hidden" name="vista" value="1">
        <input type="text" name="search" class="form-control" placeholder="Buscar usuario">
            <button type="submit" class="btn  btn-sm custom-btn">Buscar</button>
            
        </div>
    </form>

    <?php if (!empty($search)) : ?>
        <a href="<?= site_url('/baja_usuario') ?>" class="btn  btn-sm custom-btn">Volver a Eliminados</a>
    <?php endif; ?>
    <a href="<?= site_url('/usarios') ?>" class="btn  btn-sm custom-btn">Volver a Usuarios </a>
</section>



<div class="container mt-5">
    <div class="table-responsive">
        <table class="table  producto-table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Perfil ID</th>
            <th>Baja</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <?php if ($user['baja'] == 'SI') : ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nombre'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['perfil_id'] ?></td>
            <td><?= $user['baja'] ?></td>
            <td>
            <form action="<?= base_url('user/change_baja/' . $user['id']) ?>" method="post" style="display: inline;">
                        <button type="submit" class="btn btn-sm btn-success">Cambiar Baja</button>
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