<html lang="en">



<body>
 
<div class="container mt-5">
<h2>Favoritos</h2>
    <div class="table-responsive">
        <table class="table  producto-table">
            <thead>
                <tr>  
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Comprar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($favoritos as $favorito) : ?>
                    <tr>
                        <td><?= $favorito['nombre_pro']; ?></td>
                        <td>
                            <img src="<?= base_url('asset/uploads/' . $favorito['img']); ?>" alt="<?= $favorito['nombre_pro']; ?>" class="img-thumbnail" width="100">
                        </td>
                        <td>
                            <!-- Aquí puedes agregar acciones adicionales para cada favorito -->
                            <?php if ($favorito['stock'] > $favorito['stock_min']) :?>
                        
                            <?php
                            echo form_open('carrito_agrega');
                            echo form_hidden('id', $favorito['id']);
                            echo form_hidden('precio', $favorito['precio']);
                            echo form_hidden('nombre_pro', $favorito['nombre_pro']);
                            echo form_hidden('stock', $favorito['stock']);
                            echo form_hidden('stock_min', $favorito['stock_min']);
                            ?>
                            <?php
                            $btn = array(
                                'class' => 'btn btn-secondary fuenteBotenes',
                                'value' => 'Agregar al Carrito',
                                'name' => 'action'
                            );
                            echo form_submit($btn);
                            echo form_close();
                            ?>
                     
                                <?php else: ?>
                                NO STOCK DISPONIBLE                              
                                <?php endif ?>
                               
                        </td>
                        <td>  
                        <a href="<?php echo base_url('favoritos/borrar/' . $favorito['producto_id']); ?>" class="btn btn-link p-0"><i class="bi bi-trash"></i></a>
                              
                    </td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
   
</body>

</html>