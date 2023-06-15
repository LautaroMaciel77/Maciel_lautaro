<!doctype html>
<html lang="en">

<body>

    <!--inicio de cuerpo de la pagina-->

    <div class="container text-center">
        <div class=" my-5  tittle ">
            <h1>¡Bienvenido a Hobbymania!</h1>
            <h2> En nuestra tienda, encontrarás el juego perfecto para cualquier ocasión.</h2>

        </div>

    </div>
    <!--carrusel -->
   

    <div class="container">
    <div class="col-md-12">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $active = true; // Variable para rastrear el primer elemento activo
                foreach ($banners as $banner) {
                    if ($banner['baja'] == 'NO') {
                        ?>
                        <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                            <img src="<?php echo base_url('/asset/uploads/banner/' . $banner['img']); ?>" class="d-block w-100" alt="Banner" style="max-height: 400px;">
                        </div>
                        <?php
                        $active = false; // Establecer el valor de la variable a false después del primer elemento
                    }
                }
                ?>
            </div>
            <button class="carousel-control-prev btn btn-dark" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next btn btn-dark" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>





    <!--tarjeta sobre beneficios -->
    <div class="container">
        <div class=" my-5  tittle ">
            <h2 class="text-center">Porque elegirnos</h2>

        </div>
        <div class="container beneficio">
            <div class="row g-3">
                <div class="col-12  col-lg-4">
                    <div class="card h-100">
                        <div class="card-icon"><i class="bi bi-cart"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Amplia variedad de juegos</h5>
                            <p class="card-text">Ofrecemos una amplia variedad de juegos de mesa, incluyendo los
                                últimos lanzamientos y clásicos favoritos, para que los clientes encuentren lo que
                                están buscando y prueben nuevos juegos emocionantes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-lg-4">
                    <div class="card h-100">
                        <div class="card-icon"><i class="bi bi-truck"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Envío rápido y seguro </h5>
                            <p class="card-text">Garantizamos envío rápido y seguro para que los clientes reciban
                                sus juegos de mesa en poco tiempo y sin preocupaciones, lo que genera una
                                experiencia de compra positiva y fomenta la fidelidad del cliente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12  col-lg-4">
                    <div class="card h-100">
                        <div class="card-icon"><i class="bi bi-heart"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Asesoramiento por nuestro vendedores</h5>
                            <p class="card-text">Encuentra el juego perfecto con nuestro empleador experimentos!
                                Recibe asesoramiento personalizado y recomendaciones de un jugador experimentado
                                para mejorar tu experiencia de juego. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--fin de tarjetas de beneficios -->

    <!--slider de productos -->
    <div class="container">
    <div class="my-5 tittle">
        <h2 class="text-center">Últimos Productos</h2>
    </div>
    <div class="col-md-12 text-center">
        <div id="carouselProductos" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-3 justify-content-center">
                        <?php $counter = 0; ?>
                        <?php foreach ($producto as $productoItem) : ?>
                            <?php if ($counter < 3) : ?>
                                <div class="col-10 col-md-4 col-lg-4 align-items-end">
                                    <div class="card h-100" id="card-hover">
                                        <img src="<?= base_url() ?>/asset/uploads/<?= $productoItem['img'] ?>" alt="<?= $productoItem['nombre_pro']; ?>" class="card-img-top">
                                        <div class="middle">
                                      
                                        <a href="<?php echo 'crear_favorito/' . $producto['id']; ?>" class="d-block mb-2"><i class="bi bi-heart"></i></a>
                                            <a class="text-reset text-decoration-none d-block" data-bs-toggle="modal" data-bs-target="#productoModal<?= $productoItem['id'] ?>">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                        </div>
                                        <?php foreach ($categorias as $categoria) : ?>
                                            <?php if ($categoria['id'] == $productoItem['categoria_id']) : ?>
                                                <span class="product-type text-center"><?php echo $categoria['descripcion']; ?></span>
                                            <?php endif ?>
                                        <?php endforeach ?>

                                        <a href="#" class="d-block text-center text-decoration-none py-2 product-name"><?php echo $productoItem['nombre_pro']; ?></a>
                                        <span class="product-price text-center">$<?php echo $productoItem['precio_lista']; ?></span>

                                        <?php if ($productoItem['elimininado'] == "SI" || $productoItem['stock_min'] == $productoItem['stock']) : ?>
                                            <div class="btn-wrapper mt-auto text-center">
                                                <p class="text-danger">Sin stock</p>
                                            </div>
                                        <?php else : ?>
                                            <div class="btn-wrapper  mb-2 mt-auto text-center">
                                                <?php
                                                echo form_open('carrito_agrega');
                                                echo form_hidden('id', $productoItem['id']);
                                                echo form_hidden('precio', $productoItem['precio']);
                                                echo form_hidden('nombre_pro', $productoItem['nombre_pro']);
                                                echo form_hidden('stock', $productoItem['stock']);
                                                echo form_hidden('stock_min', $productoItem['stock_min']);
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
                            <?php endif ?>
                            <?php $counter++; ?>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-3 justify-content-center">
                        <?php $counter = 0; ?>
                        <?php foreach ($producto as $productoItem) : ?>
                            <?php if ($counter >= 3 && $counter < 6) : ?>
                                <div class="col-10 col-md-4 col-lg-4 align-items-end">
                                    <div class="card h-100" id="card-hover">
                                        <img src="<?= base_url() ?>/asset/uploads/<?= $productoItem['img'] ?>" alt="<?= $productoItem['nombre_pro']; ?>" class="card-img-top">
                                        <div class="middle">
                                       

                                        <a href="<?php echo 'crear_favorito/' . $producto['id']; ?>" class="d-block mb-2"><i class="bi bi-heart"></i></a>

                                            <a class="text-reset text-decoration-none d-block" data-bs-toggle="modal" data-bs-target="#productoModal<?= $productoItem['id'] ?>">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                        </div>
                                        <?php foreach ($categorias as $categoria) : ?>
                                            <?php if ($categoria['id'] == $productoItem['categoria_id']) : ?>
                                                <span class="product-type text-center"><?php echo $categoria['descripcion']; ?></span>
                                            <?php endif ?>
                                        <?php endforeach ?>

                                        <a href="#" class="d-block text-center text-decoration-none py-2 product-name"><?php echo $productoItem['nombre_pro']; ?></a>
                                        <span class="product-price text-center">$<?php echo $productoItem['precio_lista']; ?></span>
                                        <?php if ($productoItem['elimininado'] == "SI" || $productoItem['stock_min'] == $productoItem['stock']) : ?>
                                            <div class="btn-wrapper  mt-auto text-center">
                                                <p class="text-danger">Sin stock</p>
                                            </div>
                                        <?php else : ?>
                                            <div class="btn-wrapper mb-2 mt-auto text-center">
                                                <?php
                                                echo form_open('carrito_agrega');
                                                echo form_hidden('id', $productoItem['id']);
                                                echo form_hidden('precio', $productoItem['precio']);
                                                echo form_hidden('nombre_pro', $productoItem['nombre_pro']);
                                                echo form_hidden('stock', $productoItem['stock']);
                                                echo form_hidden('stock_min', $productoItem['stock_min']);
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
                            <?php endif; ?>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-3 justify-content-center">
                        <?php $counter = 0; ?>
                        <?php foreach ($producto as $productoItem) : ?>
                            <?php if ($counter >= 6 && $counter < 9) : ?>
                                <div class="col-10 col-md-4 col-lg-4 align-items-end">
                                    <div class="card h-100" id="card-hover">
                                        <img src="<?= base_url() ?>/asset/uploads/<?= $productoItem['img'] ?>" alt="<?= $productoItem['nombre_pro']; ?>" class="card-img-top">
                                        <div class="middle">
                                       

                                        <a href="<?php echo 'crear_favorito/' . $producto['id']; ?>" class="d-block mb-2"><i class="bi bi-heart"></i></a>

                                            <a class="text-reset text-decoration-none d-block" data-bs-toggle="modal" data-bs-target="#productoModal<?= $productoItem['id'] ?>">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                        </div>
                                        <?php foreach ($categorias as $categoria) : ?>
                                            <?php if ($categoria['id'] == $productoItem['categoria_id']) : ?>
                                                <span class="product-type text-center"><?php echo $categoria['descripcion']; ?></span>
                                            <?php endif ?>
                                        <?php endforeach ?>

                                        <a href="#" class="d-block text-center text-decoration-none py-2 product-name"><?php echo $productoItem['nombre_pro']; ?></a>
                                        <span class="product-price text-center">$<?php echo $productoItem['precio_lista']; ?></span>
                                        <?php if ($productoItem['elimininado'] == "SI" || $productoItem['stock_min'] == $productoItem['stock']) : ?>
                                            <div class="btn-wrapper mt-auto text-center">
                                                <p class="text-danger">Sin stock</p>
                                            </div>
                                        <?php else : ?>
                                            <div class="btn-wrapper  mb-2 mt-auto text-center">
                                                <?php
                                                echo form_open('carrito_agrega');
                                                echo form_hidden('id', $productoItem['id']);
                                                echo form_hidden('precio', $productoItem['precio']);
                                                echo form_hidden('nombre_pro', $productoItem['nombre_pro']);
                                                echo form_hidden('stock', $productoItem['stock']);
                                                echo form_hidden('stock_min', $productoItem['stock_min']);
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
                            <?php endif; ?>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


        <section class="container ">
            <div class="row mt-5 tittle">
                <h2 class="text-center">Marcas con la que trabajamos</h2>

            </div>
            <div class="row">
                <div class="col-md-12">

                    <div id="carouselLogos" class="carousel slide  pb-4" data-bs-ride="carousel">

                        <div class="carousel-inner px-5">
                            <div class="carousel-item active">
                                <div class="row  ">
                                    <div class="  col-6 col-md-4 col-lg-2 align-self-center">
                                        <img class=" max-img-size d-block w-100 px-3 mb-3"
                                            src="asset\img\companias\1-small_default.png" alt="">
                                    </div>
                                    <div class=" col-6  col-md-4 col-lg-2  align-self-center">
                                        <img class=" max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\2-small_default.png" alt="">
                                    </div>
                                    <div class=" col-6 col-md-4 col-lg-2  align-self-center">
                                        <img class=" max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\3-small_default.jpg" alt="">
                                    </div>
                                    <div class=" col-6 col-md-4 col-lg-2  align-self-center">
                                        <img class=" max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\4-small_default.png" alt="">
                                    </div>
                                    <div class=" col-6  col-md-4 col-lg-2  align-self-center">
                                        <img class=" max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\5-small_default.png" alt="">
                                    </div>
                                    <div class=" col-6  col-md-4 col-lg-2  align-self-center">
                                        <img class="max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\6-small_default.png" alt="">
                                    </div>
                                </div>

                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-6 col-md-4 col-lg-2 align-self-center">
                                        <img class="max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\7-small_default.png" alt="">
                                    </div>
                                    <div class="col-6  col-md-4  col-lg-2  align-self-center">
                                        <img class="max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\8-small_default.png" alt="">
                                    </div>
                                    <div class="col-6 col-md-4  col-lg-2 align-self-center">
                                        <img class="max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\9-small_default.png" alt="">
                                    </div>
                                    <div class="col-6 col-md-4  col-lg-2  align-self-center">
                                        <img class="max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\10-small_default.png" alt="">
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-2  align-self-center">
                                        <img class="max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\11-small_default.png" alt="">
                                    </div>
                                    <div class="col-6  col-md-4 col-lg-2  align-self-center">
                                        <img class="max-img-size d-block w-100 px-3  mb-3"
                                            src="asset\img\companias\194-small_default.png" alt="">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="w-100 px-3 text-center mt-4">
                            <a class="carousel-control-prev position-relative d-inline me-4" href="#carouselLogos"
                                data-bs-slide="prev">
                                <img src="asset\img\iconos\left-arrow.svg" width="30em" height="30em" alt="">
                            </a>
                            <a class="carousel-control-next position-relative d-inline" href="#carouselLogos"
                                data-bs-slide="next">
                                <img src="asset\img\iconos\right-arrow.svg" width="30em" height="30em" alt="">
                            </a>






                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>

        </section>
    </div>

    <!--fin de slider  de productos -->



    <?php foreach ($producto as $productoItem) : ?>
    <div class="modal fade" id="productoModal<?= $productoItem['id'] ?>" tabindex="-1" aria-labelledby="productoModalLabel<?= $productoItem['id'] ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-body">
        <div class="pt-4">
          <div class="container local">
            <div class="row g-0">
              <div class="col-6 col-md-5">
              <img src="<?= base_url() ?>/asset/uploads/<?= $productoItem['img'] ?>" alt="<?= $productoItem['nombre_pro']; ?>"  class="card-img  img-fluid rounder-start">
                    </div>
              <div class="col-6 col-md-7">
                <div class="card-body d-flex flex-column h-100">
                    <h3 class="card-tittle"><?php echo $productoItem['nombre_pro']; ?></h3>
                   
              
                        
                  <p class="card-text">
                  <?php echo $productoItem['descripcion']; ?>
                  </p>
                  <span class="precio">Precio: $<?php echo $productoItem['precio']; ?></span>   
                  <span style="color:#696969">Precio lista: $<?php echo $productoItem['precio_lista']; ?></span>   
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
<?php endforeach ?>





</body>

</html>