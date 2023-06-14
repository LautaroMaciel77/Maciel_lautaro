<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\productModel;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\UserModel;


class VentasController extends Controller
{
    public function __construct() {

        $session=session();
         $cart = \Config\Services::cart();
         $cart->contents();


     }
     // public function catalogo(){
     //     $session=session();
     //     $dato = array('titulo'=>'Todos los productos')
     //     $productoModel=new ProductModel();
     //     $data['producto']=$productoModel->orderBy('id','DESC')->findAll();
     //     echo view('front/header',$dato)
     //     echo view('front/navbar');
     //     echo view('backend/catalogo', $data);
     //     echo view('front/footer');
     // }


     public function factura($venta_id)
     {
         $detalleModel = new Ventas_detalle_model();
         $ventaCabeceraModel = new Ventas_cabecera_model();
         $productModel = new ProductModel();
         $userModel = new UserModel();
     
         // Obtener detalles de la venta
         $detalles = $detalleModel->getDetalles($venta_id);
     
         // Obtener información de la cabecera de la venta
         $ventaCabecera = $ventaCabeceraModel->find($venta_id);
     
         // Obtener nombres de los productos
         $productos = [];
         foreach ($detalles as $detalle) {
             $producto = $productModel->find($detalle['producto_id']);
             $productos[$detalle['producto_id']] = $producto['nombre_pro'];
         }
     
         // Obtener nombre del comprador
         $comprador = $userModel->find($ventaCabecera['usuario_id']);
     
         // Pasar los datos a la vista
         $data = [
             'detalles' => $detalles,
             'ventaCabecera' => $ventaCabecera,
             'productos' => $productos,
             'nombre_comprador' => $comprador['nombre']
         ];
     
         echo view('front/header');
         echo view('front/navbar');
         echo view('backend/factura', $data);
         echo view('front/footer');
     }

    public function ventas(){
    
        $session = session();
        $id=$session->get('id');
        $perfil=$session->get('perfil_id');
        
            $detalle_ventas = new Ventas_cabecera_model();
            
            if ($perfil == '1') {
                $data['ventaDetalle'] = $detalle_ventas->orderBy('id', 'DESC')->findAll();
            } else if ($perfil == '2') {
       
                $data['ventaDetalle'] = $detalle_ventas->where('usuario_id', $id)->orderBy('id', 'DESC')->findAll();
                
            }
            echo view('front/header');
            echo view('front/navbar');
            echo view('backend/vista_ventas', $data);
            echo view('front/footer');
        }

    

public function comprar_carrito()
{
    $cart = \Config\Services::cart();
    $productos = $cart->contents();
    $request = \Config\Services::request();
    $montoTotal = 0;

    foreach ($productos as $producto) {
        $montoTotal += $producto["price"] * $producto["qty"];
    }

    $ventaCabecera = new Ventas_cabecera_model();
    $id_session=intval(session()->id);

    $fechaActual = date('Y-m-d'); // Obtener la fecha actual en el formato deseado

    $idcabecera = $ventaCabecera->insert([
        "total_venta" => $montoTotal,
        "usuario_id" => $id_session,
        "fecha" => $fechaActual // Agregar la fecha actual al array de datos
    ]);
    $ventaDetalle = new Ventas_detalle_model();
    $productModel = new productModel();

    foreach ($productos as $producto) {
        $ventaDetalle->insert([
            "venta_id" => $idcabecera,
            "producto_id" => $producto['id'],
            "cantidad" => $producto["qty"],
            "precio" => $producto["price"]
        ]);
        $productStock = $productModel->find($producto["id"]); // Obtener los detalles del producto


            $stock = $productStock["stock"]; // Obtener el stock del producto
            // Restar la cantidad del carrito al stock actual
            $newStock = $stock - $producto["qty"];

        $productModel->update($producto["id"], ['stock' => $newStock]);
    }
    $cart->destroy();
    return redirect()->back()->withInput('msg','Compra realizada');
}

}