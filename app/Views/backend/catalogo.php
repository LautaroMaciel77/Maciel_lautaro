<!doctype html>
<html lang="en">

<body>
    <h2 class="text-center mt-3">Catalogo</h2>
    <section class="container mt-4 text-center">
        <form action="<?= base_url('/buscar_catalogo') ?>" method="post" class="mb-3">
            <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control" placeholder="Buscar Producto">
                <button type="submit" class="btn  btn-sm custom-btn">Buscar</button>
            </div>
        </form>

        <?php if (!empty($search)) : ?>
            <a href="<?= site_url('/catalogo') ?>" class="btn  btn-sm custom-btn">Volver a catalogo</a>
        <?php endif; ?>
    </section>

    <?php if (empty($search)) : ?>
        <section class="container mt-4 text-center">
            <form action="<?= base_url('/catalogo') ?>" method="post" class="mb-3">
                <label for="categoria_id" class="text-white">filtrar por categoria:</label>
                <div class="d-inline-block">
                    <select name="categoria_id" class="form-select w-auto">
                        <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria['id']; ?>">
                                <?php echo $categoria['id'] . '. ' . $categoria['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn  btn-sm custom-btn">filtrar</button>
            </form>
            <?php if (!empty($search)) : ?>
                <a href="<?= site_url('/catalogo') ?>" class="btn  btn-sm custom-btn">Volver a catalogo</a>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <div class="container">
        <div class="row g-3 justify-content-center">
            <?php foreach ($producto as $producto) : ?>
                <div class="col-10 col-md-4 col-lg-4 align-items-end">
                    <div class="card h-100" id="card-hover">
                        <img src="<?= base_url() ?>/asset/uploads/<?= $producto['img'] ?>" alt="<?= $producto['nombre_pro']; ?>" class="card-img-top">
                        <div class="middle">
                        <a href="<?php echo 'crear_favorito/' . $producto['id']; ?>" class="d-block mb-2"><i class="bi bi-heart"></i></a>

                            
                            <a class="text-reset text-decoration-none d-block" data-bs-toggle="modal" data-bs-target="#productoModal<?= $producto['id'] ?>">
                                <i class="bi bi-info-circle-fill"></i>
                            </a>
                        </div>
                        <?php foreach ($categorias as $categoria) { ?>
                            <?php if ($categoria['id'] == $producto['categoria_id']) : ?>
                                <span class="product-type text-center"><?php echo $categoria['descripcion']; ?></span>
                            <?php endif ?>
                        <?php  } ?>
                        <a href="#" class="d-block  text-center  text-decoration-none py-2 product-name"><?php echo $producto['nombre_pro']; ?></a>
                        <span class="product-price  text-center">$<?php echo $producto['precio_lista']; ?></span>
                        <?php if ($producto['elimininado'] == "SI" || $producto['stock_min'] == $producto['stock']) : ?>
                            <div class="btn-wrapper mt-auto text-center">
                                <p class="text-danger">Sin stock</p>
                            </div>
                        <?php else : ?>
                      
                        <div class="btn-wrapper mt-auto text-center">
                            <?php
                            echo form_open('carrito_agrega');
                            echo form_hidden('id', $producto['id']);
                            echo form_hidden('precio', $producto['precio']);
                            echo form_hidden('nombre_pro', $producto['nombre_pro']);
                            echo form_hidden('stock', $producto['stock']);
                            echo form_hidden('stock_min', $producto['stock_min']);
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
                 </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Modal del producto -->
                <div class="modal fade" id="productoModal<?= $producto['id'] ?>" tabindex="-1" aria-labelledby="productoModalLabel<?= $producto['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="pt-4">
                                    <div class="container local">
                                        <div class="row g-0">
                                            <div class="col-6 col-md-5">
                                                <img src="<?= base_url() ?>/asset/uploads/<?= $producto['img'] ?>" alt="<?= $producto['nombre_pro']; ?>" class="card-img  img-fluid rounder-start">
                                            </div>
                                            <div class="col-6 col-md-7">
                                                <div class="card-body d-flex flex-column h-100">
                                                    <h3 class="card-tittle"><?php echo $producto['nombre_pro']; ?></h3>
                                                    <p class="card-text">
                                                        <?php echo $producto['descripcion']; ?>
                                                    </p>
                                                    <span class="precio">Precio: $<?php echo $producto['precio']; ?></span>
                                                    <span style="color:#696969">Precio lista: $<?php echo $producto['precio_lista']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pagination">
            <?= $paginador->links(); ?>
        </div>
    </div>
</body>

</html>
