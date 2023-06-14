
<!doctype html>
<html lang="en">

<body>
    <div class="container">
    <a href="<?= site_url('/ventas') ?>" class="btn  btn-sm custom-btn">Volver</a>
        <!-- Aquí colocas el diseño de la factura -->
        <h1>Factura</h1>

        <div class="container mt-5">
        <div class="table-responsive">
            <table class="table producto-table">
                <tr>
                    <th>Venta</th>
                    <td><?= $ventaCabecera['id'] ?></td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <td><?= $ventaCabecera['fecha'] ?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td><?= $ventaCabecera['total_venta'] ?></td>
                </tr>
                <tr>
                    <th>Comprador</th>
                    <td><?= $nombre_comprador ?></td>
                </tr>
            </table>
        </div>
    </div>


        <h2>Detalles de la venta</h2>

        <div class="container mt-5">
            <div class="table-responsive">
                <table class="table producto-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalles as $detalle) : ?>
                            <tr>
                                <td><?= $productos[$detalle['producto_id']] ?></td>
                                <td><?= $detalle['cantidad'] ?></td>
                                <td><?= $detalle['precio'] ?></td>
                                <td><?= $detalle['cantidad'] * $detalle['precio'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-sm custom-btn" onclick="window.print()">Imprimir</button>
        
        </div>
    </div>
</body>
</html>


