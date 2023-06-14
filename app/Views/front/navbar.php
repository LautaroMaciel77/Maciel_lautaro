<!doctype html>
<html lang="en">

<body>
    <!-- Inicio del top -->
    <div id="top">
    <div class="container-fluid">
        <div class="col-md-3 offer">
            <ul class="text-white navbar me-auto" id="top">
            <?php if (!(session()->get('perfil_id') == 1 || session()->get('perfil_id') == 2)): ?>

            <li class="nav-item">
                        <a class="text-reset text-decoration-none " href="<?php echo base_url("/signup"); ?>">Registrarte</a>
                        <a class="text-reset text-decoration-none" data-bs-toggle="modal" href="#logindemo" role="button">Inicio sesión</a>
                    </li>
      
                    <?php endif; ?>
               

                <?php if (session()->get('perfil_id') == 1): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Crud Producto
                        </a>

                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url("/productos"); ?>">Tabla de Productos</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url("/productos_eliminados"); ?>">Tabla de Eliminados</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url("/alta_productos"); ?>">Agregar producto</a>
                            <li>                           
                        </ul>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Crud Usuarios
                        </a>

                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url("/usarios"); ?>">Tabla de Usuarios</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url("/baja_usuario"); ?>">Tabla de Eliminados</a>
                            </li>
                                                   
                        </ul>
                        </li>
    <li class="nav-item">
        <a class="text-reset text-decoration-none" href="<?php echo base_url("/ventas"); ?>">Ventas</a>
    </li>

    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Consultas
                        </a>

                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url("/consultas"); ?>">Tabla de Consultas</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url("/consultas_respuestas"); ?>">Tabla de Respuestas</a>
                            </li>
                                                   
                        </ul>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Crud Banner
                        </a>

                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url("/alta_banner"); ?>">agregar banner</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url("/banner"); ?>">lista de banner</a>
                            </li>  
                            <li><a class="dropdown-item" href="<?php echo base_url("/banner_eliminados"); ?>">lista de banner en desuso</a>
                            </li>                
                        </ul>
                        </li>
    <li class="nav-item">
        <a class="text-reset text-decoration-none" href="<?php echo base_url(); ?>/SigninController/logout">Cerrar sesión</a>
    </li>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</div>




    <!-- fin  del top -->
    <!-- Inicio del menu -->
    <nav class="navbar navbar-expand-md navbar-dark navbarFondo">
        <div class="container-fluid">
            <!-- icono o nombre -->

            <a class="navbar-brand">
          <img src="<?= base_url() ?>/asset/img\iconos\dice-twenty-faces-twenty-svgrepo-com(1).svg" width="35em" height="35em"
                    alt="">
                <span class="text-white">Hobbymania</span>
            </a>

            <!-- boton del menu -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- elementos del menu colapsable -->

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url(" /"); ?>">Inicio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Acerca de
                        </a>

                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url(" terminos"); ?>">Terminos y usos</a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url(" nosotros"); ?>">Nosotros</a>
                            <li>
                            <li><a class="dropdown-item" href="<?php echo base_url(" contacto"); ?>">Centro de ayuda</a>
                            </li>
                        </ul>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url("/catalogo"); ?>">Catalogo</a>
                    </li>
                    <?php if (session()->get('perfil_id') == 2): ?>
                    <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo base_url("/carrito"); ?>">Carrito</a>
                </li>
                
                <li class="dropdown">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Mi cuenta
                    </a>
                    <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url("/ventas"); ?>">Compras</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('user/editar_usuario/' . session()->get('id')); ?>">Editar perfil</a></li>

                        <li>
                        <li><a class="dropdown-item" href="<?php echo base_url("/favoritos"); ?>">favoritos</a></li>
    <a class="dropdown-item" href="<?php echo base_url(); ?>/SigninController/logout">Cerrar sesión</a>
</li>

                    </ul>
                </li>

            
                <?php endif; ?>
                </ul>
            
                <hr class="d-md-none text-white-50">

                <!-- enlaces redes sociales -->

                <ul class="navbar-nav  flex-row flex-wrap text-light">

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="https://twitter.com/?lang=es" class="text-white"><i class="bi bi-twitter"></i>
                            <small class="d-md-none ms-2 text-white">Twitter</small></a>

                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="https://web.whatsapp.com/" class="text-white"><i class="bi bi-whatsapp"></i>
                            <small class="d-md-none ms-2 text-white">WhatsApp</small></a>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="https://es-la.facebook.com/" class="text-white"><i class="bi bi-facebook"></i>
                            <small class="d-md-none ms-2 text-white">Facebook</small></a>

                    </li>

                </ul>

                <!--boton Informacion -->

            </div>
    </nav>




    <!-- inicio modal -->
    <div id="logindemo" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-bdoy">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                    </button>
                    <div class="myform bg-dark">
                        <h1 class="text-center">Inicio secion</h1>
                        <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                            <div class="mb-3 mt-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Email"  class="form-control" >
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" placeholder="....." class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-light mt-3">Iniciar secion</button>
                            <p>No tienes cuenta? <a class="text-white" href="<?php echo base_url(" /signup"); ?>">Cree
                                    una</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal-->

    <?php if (session()->getFlashdata('msg')): ?>
    <div class="custom-alert h6 text-center alert alert-warning alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= session()->getFlashdata('msg') ?>
    </div>
    <?php endif  ?>
</body>