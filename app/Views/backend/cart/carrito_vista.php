<!doctype html>
<html lang="en">

<body>
    <div class="container">
        <?php
        $session = session();
        $cart = \Config\Services::cart();
        $cart = $cart->contents();

        if (empty($cart)) {
            echo '<div class="cart-message">Para agregar productos al carrito, haz clic en "comprar"</div>';
        }
        ?>

        <?php if ($cart == true) : ?>
            <div class="container mt-5">
    <div class="table-responsive">
        <table class="table  producto-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre del Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Cancelar Producto</th>
                </tr>
        </thead>
                <?php
                echo form_open('carrito_actualiza');
                $gran_total = 0;
                $i = 1;
                foreach ($cart as $item) :
                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                    echo form_hidden('cart[' . $item['id'] . '][stock]', $item['stock']);
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td>$<?php echo number_format($item['price'], 2); ?>
                    </td>
                        <td><?php echo $item['qty']; ?> 
                        <?php echo anchor('sumar_carrito?id=' . $item['rowid'], '<i class="bi bi-plus"></i>', ['class' => 'btn btn-link p-0']); ?>
                        <?php echo anchor('restar_carrito?id=' . $item['rowid'], '<i class="bi bi-dash"></i>', ['class' => 'btn btn-link p-0']); ?>
                    
                    </td>
                        <?php $gran_total=$gran_total+($item['price']* $item['qty'])?>
                        
                        <td>$<?php echo number_format($item['subtotal'], 2); ?></td>
                        
                        <td>
    <?php echo anchor('carrito_elimina/' . $item['rowid'], '<i class="bi bi-trash"></i>', ['class' => 'btn btn-link p-0']); ?>

                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="5">
                        <b>Total: $<?php echo number_format($gran_total, 2); ?></b>
                    </td>
                    <td>
                        <input type="button" class="btn btn-primary btn-lg" value="Borrar Carrito" onclick="window.location = 'borrar'">
                        <input type="button" class ='btn btn-primary btn-lg' value="comprar" onclick="window.location = 'carrito-comprar'">
                  
                  
                    </td>
                </tr>
            <?php echo form_close(); ?>
            </table>
        <?php endif; ?>
    </div>    
    </body>


</html>