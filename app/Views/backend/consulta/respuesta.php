<!doctype html>
<html lang="en">
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card consulta-card text-center">
                    <div class="card-header">
                        Detalles de la consulta
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">ID de consulta: <?= $consulta['id'] ?></h5>
                        <p class="card-text">
                            <span class=" text-white">Asunto:</span>
                            <span class="text-secondary"><?= $consulta['asunto'] ?></span>
                        </p>
                        <p class="card-text">
                            <span class="text-white">Correo electrónico:</span>
                            <span class="text-secondary"><?= $consulta['mail'] ?></span>
                        </p>
                        <p class="card-text"><?= $consulta['descripcion'] ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Fecha de consulta: <?= $consulta['fecha_consulta'] ?>
                    </div>
                    <div class="card-body">
                    <form action="<?= base_url('respuesta/' . $consulta['id']) ?>" method="post">
                            <input type="hidden" name="id" value="<?= $consulta['id'] ?>">
                            <input type="hidden" name="asunto" value="<?= $consulta['asunto'] ?>">
                            <input type="hidden" name="mail" value="<?= $consulta['mail'] ?>">
                            <input type="hidden" name="descripcion" value="<?= $consulta['descripcion'] ?>">
                            <div class="mb-3">
                                <label for="respuesta" class="form-label">Respuesta</label>
                                <textarea class="form-control" id="respuesta" name="respuesta" rows="10" required></textarea>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="test_mailtrap" value="true">
                                <label class="form-check-label" for="test_mailtrap">
                                    Activar Test Mailtrap
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar respuesta</button>
                            <button type="reset" class="btn btn-secondary">Borrar respuesta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>