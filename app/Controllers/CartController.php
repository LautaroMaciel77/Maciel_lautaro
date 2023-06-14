<?php
namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\productModel;


class CartController extends BaseController
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


    public function add(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $productId = $request->getPost('id');
        $cartItems = $cart->contents();
        
        // Verificar si el producto ya está en el carrito
        foreach ($cartItems as $item) {
            if ($item['id'] == $productId) {
                // Producto ya está en el carrito, puedes mostrar un mensaje de error o redireccionar a otra página
                return redirect()->back()->with('msg', 'El producto ya está en el carrito.');
            }
        }
        
        
        $cart->insert([
            'id' => $productId,
            'qty' => 1,
            'name' => $request->getPost('nombre_pro'),
            'price' => $request->getPost('precio'),
            'stock' => $request->getPost('stock'),
            'stock_min' => $request->getPost('stock_min')
        ]);
    
        return redirect()->back()->withInput();
    }
    
public function actualiza_carrito(){
    $cart = \Config\Services::cart();
    $request = \Config\Services::request();
    $cart ->update(array(
    'id' =>$request->getPost('id'),
    'qty' =>1,
    'price' =>$request->getPost('precio'),
    'name' =>$request->getPost('nombre_prod'),
    'stock'=>$request->getPost('stock'),
    'stock_min' => $request->getPost('stock_min')
    ));


    return redirect()->back()->withinput();
}


public function remove($rowid){
    $cart = \Config\Services::cart();

    if ($rowid =='all'){
        $cart->destroy();

    }
    else{
        $cart->remove($rowid);
    }
    return redirect()->back()->withInput();
}
public function borrar_carrito()
{
    $cart = \Config\Services::cart();//para que incluya el $cart
    $cart->destroy();
    return redirect()->back()->withInput();

}


public function muestra(){
    helper(['form','url','cart']);
 
    $cart =\Config\Services::cart();
    $cart->contents();
 

    echo view('front/header');
    echo view('front/navbar');
    echo view('backend/cart/carrito_vista');
    echo view('front/footer');
    
}

public function comprar_carrito(){
    $cart =\Config\Services::cart();
    $productos=$cart->contents();
    $request=\Config\Services::request();
    $montoTotal=0;
    foreach($producto as $producto){
        $montoTotal+=$producto["price"]*$producto["qty"];
    }
    $ventaCabecera = new Ventas_cabecera_model();
    $idcabecera=$ventaCabecera->insert(["total_venta" => $montoTotal,"usuario_id"=>session()->id]);
    $ventaDetalle = new Ventas_detalle_model();
    $productmodel= new productModel();
    foreach($producto as $producto){
        $ventaDEtalle->insert(["venta_id" =>$idcabecera,"producto_id"=>$producto[id],
        "stock"=>$product["qty"],"precio"=>$producto["price"]]);
        $productomodel->update($producto["id"],["stock"=>$producto["stock"]- $producto["qty"]]);
    }
    return redirect()->back()->withInput('msg','Gracias por Comprar en HobbyMania');
}

public function restar_carrito(){
           $cart = \Config\Services::cart();
            $productos = $cart->contents();
             $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        
        if($cantidad > 1){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad-1
            ));
        }
        return redirect()->back()->withInput();
       // return redirect()->route('panel_carrito');
    }

   public function sumar_carrito(){
        $cart = \Config\Services::cart();

        $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        $stock_min = $cart->getItem($this->request->getGet("id"))["stock_min"];
        $stock=$cart->getItem($this->request->getGet("id"))["stock"];
        $stockDisponible=$stock-$stock_min;
        if($cantidad < $stockDisponible){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad+1
            ));
        }
        return redirect()->back()->withInput();
       // return redirect()->route('panel_carrito');
    }

}




