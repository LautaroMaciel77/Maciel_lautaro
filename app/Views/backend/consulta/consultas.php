<!doctype html>
<html lang="en">


<body>

    <h2 class="text-center mt-3">Tabla de Consulta</h2>
    <?php if (session()->getFlashdata('msg')): ?>
    <div class="custom-alert h6 text-center alert alert-warning alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= session()->getFlashdata('msg') ?>
    </div>
<?php endif; ?>
    <section class="container mt-4 text-center">
    <form action="<?= base_url('/buscar_consulta') ?>" method="post" class="mb-3">
        <div class="input-group input-group-sm">
            <input type="text" name="search" class="form-control" placeholder="buscar consulta">
            <button type="submit" class="btn  btn-sm custom-btn">Buscar</button>
        </div>
    </form>
    <?php if (!empty($search)) : ?>
        <a href="<?= site_url('/consultas') ?>" class="btn  btn-sm custom-btn">Volver a consultas</a>
    <?php endif; ?>
    <a href="<?= site_url('/consultas_respuestas') ?>" class="btn  btn-sm custom-btn">Respuestas </a>
    </section>

<div class="container mt-5">
    <div class="table-responsive">
        <table class="table  producto-table">
            <thead>
                <tr>  
                    <th>id</th>
                    <th>Asunto</th>
                    <th>mail</th>
                    <th>fecha de la consulta</th>
                    <th>Responder</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consulta as $consulta) : ?>
                    <?php  if($consulta['fecha_respuesta'] == null) :?>
                        <tr>
                        <td><?= $consulta['id'] ?></td>
                        <td><?= $consulta['asunto'] ?></td>
                        <td><?= $consulta['mail'] ?></td>
                        <td><?= $consulta['fecha_consulta'] ?></td>
                        <td> <form action="<?= base_url('respuestas/' . $consulta['id']) ?>" method="post" style="display: inline;">
                        <button type="submit" class="btn btn-sm btn-success">ver consulta</button>
                    </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
    <?= $paginador->links(); ?>
</div>
    </div>    </div>
    
</body>

</html>

