<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta de Hobbymania</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title">Respuesta de Hobbymania</h2>
                        <h3 class="card-subtitle mb-3">Remitente: Centro de ayuda de Hobbymania</h3>
                        <h4 class="card-subtitle mb-3">Asunto:Repuesta a <?= $asunto ?></h4>
                        <div class="mb-3">
                            <h5 class="card-subtitle mb-3">Pregunta original:</h5>
                            <p class="card-text"><?= $pregunta ?></p>
                        </div>
                        <div class="mb-3">
                            <h5 class="card-subtitle mb-3">Respuesta:</h5>
                            <p class="card-text"><?= $respuesta ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
