<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Pager\Pager;
use CodeIgniter\Pager\PagerRenderer;
use App\Models\productModel;
use App\Models\categoria_model;

class ProductoController extends Controller{

    public function index(){
        helper(['form']);
        $productoModel = new ProductModel();
        $categoriasmodel= new categoria_model();
        $data['categorias']=$categoriasmodel->getCategorias();

 

    // Configurar la paginación

        $data=[
            
            'producto' => $productoModel->paginate(10),
            'paginador' => $productoModel->pager];
     
    $dato['titulo']='Crud Producto';

        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/producto/productos', $data);
        echo view('front/footer');
    }

    public function alta_producto(){
        $productoModel =new ProductModel();
        $categoriasmodel= new categoria_model();
        $data['categorias']=$categoriasmodel->getCategorias();
        $data['producto'] = $productoModel ->orderBy('id','DESC')->findall();

        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/producto/alta_producto', $data);
        echo view('front/footer');
    }
    public function baja()
    {
        helper(['form']);
        $productoModel = new ProductModel();
        $data['producto'] = $productoModel->orderBy('id','DESC')->findall();
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/producto/producto_eliminado', $data);
        echo view('front/footer');
    }
    public function editar_producto($id){
        $productoModel = new ProductModel();
        $producto = $productoModel->find($id);
         // Pasa los datos del producto a la vista correspondiente
        $data['producto'] = $producto;
    
        // Carga la vista y muestra el producto
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/producto/editar_productos', $data);
        echo view('front/footer');
    }
  


    public function changeBaja($id)
    {
        // Lógica para cambiar el valor de "baja" a "SI" en la base de datos para el usuario con el ID especificado
        $this->productModel = new ProductModel();
        $product = $this->productModel->find($id);
        
    
        // Verificar si el usuario existe
        if ($product) {
            $baja = $product['elimininado'];
            if($baja =='NO'){
                $this->productModel->update($id, ['elimininado' => 'SI']);
            } else if ($baja =='SI') {
                // Realiza acciones cuando $perfil_id es igual a '2'
                $this->productModel->update($id, ['elimininado' => 'NO']);
            } else {
                // Realiza acciones por defecto cuando $perfil_id no coincide con '1' ni '2'
                $this->productModel->update($id, ['elimininado' => 'NO']);
            }
            
            // Guardar los cambios en la base de datos
    
        }
      return redirect()->back();
    }
    public function store(){
        helper(['form']);
        $productoModel = new ProductModel();
       
    $validationRules = [
        'nombre_pro' => 'required|min_length[2]',
        'categoria_id' =>'is_not_unique[categoria.id]',
        'precio' => 'required',
        'precio_lista' => 'required',
        'stock' => 'required',
        'stock_min' => 'required',
        'imagen' => 'is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png,image/webp,image/ico]',

    ];

    if (!$this->validate($validationRules)) {
        session()->setFlashdata('msg', '¡Datos no válidos!');
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
        else {

            if (!$this->request->getFile('imagen')->isValid()) {
                // El usuario no ha seleccionado un archivo de imagen válido
                session()->setFlashdata('msg', '¡Imagen no valida!');
                return redirect()->to(base_url('/alta_productos'));
            }

            $img=$this->request->getFile('imagen');
            $random_name = $img->getRandomName();
            $img->move(ROOTPATH.'asset/uploads', $random_name);

            $data=[
                'nombre_pro'=>$this->request->getVar('nombre_pro'),
                'categoria_id'=>$this->request->getVar('categoria_id'),
                'img'       =>   $random_name,
                'descripcion'=>$this->request->getVar('descripcion'),
                'precio'=>$this->request->getVar('precio'),
                'precio_lista'=>$this->request->getVar('precio_lista'),
                'stock'=>$this->request->getVar('stock'),
                'stock_min'=>$this->request->getVar('stock_min'),

            ];
            $productoModel->insert($data);
            return redirect()->to(site_url('alta_productos'));
        }
    }
   
    public function buscar()
    {
    
        $productModel = new productModel();
        $search = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            $search = $_POST['search'];
         $paginateData = $productModel->select('*')
          ->orLike('nombre_pro', $search)
          ->orLike('id', $search)
          ->paginate(5);
        } else {
            
            $paginateData = $productModel->paginate(10);
                
        }
        
        $data = [
            'producto' => $paginateData,
            'paginador' => $productModel->pager,
            'search' => $search
         ];
    
        $vista= $this->request->getVar('vista');
        echo view('front/header');
        echo view('front/navbar');
        if($vista=='1'){
            echo view('backend/producto/producto_eliminado', $data);
        }else{
            echo view('backend/producto/productos', $data);
        }
        echo view('front/footer');
      
    }
    public function editar($id)
    {
        $productModel = new productModel();
        $producto = $productModel->find($id);
        $imagenActual = $producto['img'];
        $img_flag=false;
        $validationRules = [
            'nombre_pro' => 'required|min_length[2]',
            'categoria_id' =>'is_not_unique[categoria.id]',
            'precio' => 'required',
            'precio_lista' => 'required',
            'stock' => 'required',
            'stock_min' => 'required',
        ];
        
     

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('warning', '¡Datos no válidos!');
            return redirect()->to(base_url('/productos'));
        } 

        // Verificar si se ha proporcionado una nueva imagen
        if ($this->request->getFile('imagen')->isValid()) {
            // Agregar reglas de validación específicas para la imagen
            $validationRules['imagen'] = 'is_image[imagen]|mime_in[imagen,image/jpeg,image/png,image/webp,image/x-icon]';

            if (!$this->validate($validationRules)) {
                // El usuario ha seleccionado un archivo de imagen, pero no es válido
                session()->setFlashdata('msg', '¡Imagen no válida!');
                return redirect()->to(base_url('/productos'));
            }else{
               
                    // Cargar y mover la nueva imagen
            $img = $this->request->getFile('imagen');
            $randomName = $img->getRandomName();
            $img->move(ROOTPATH.'asset/uploads', $randomName);
    
            // Actualizar el campo 'img' en el array $data
            $data['img'] = $randomName;
          
            $productModel->update($id, ['img' =>$randomName]);
            // Eliminar la imagen antigua
            if ($imagenActual) {
                $rutaImagenAntigua = ROOTPATH.'asset/uploads/'.$imagenActual;
                if (file_exists($rutaImagenAntigua)) {
                    unlink($rutaImagenAntigua);
                }
            }
            }
        }
        
    
        $data = [
            'nombre_pro' => $this->request->getVar('nombre_pro'),
            'categoria_id' => $this->request->getVar('categoria_id'),
            'descripcion' => $this->request->getVar('descripcion'),
            'precio' => $this->request->getVar('precio'),
            'precio_lista' => $this->request->getVar('precio_lista'),
            'stock' => $this->request->getVar('stock'),
            'stock_min' => $this->request->getVar('stock_min'),
            'fecha_modificacion' => date('Y-m-d H:i:s'),
        ];
  
        

       $productModel->update($id,$data);
         return redirect()->to(base_url('/productos'));
    }
    public function catalogo()
    {
        helper(['form','url','cart']);
        $categoriasmodel= new categoria_model();
     
        $session=session();
        $productModel = new productModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoria_id'])) {
            $search = $_POST['categoria_id'];
            
         $paginateData = $productModel->select('*')
          ->orLike('categoria_id', $search)
          ->paginate(5);
          $data = [
            'producto' => $paginateData,
            'paginador' => $productModel->pager,
            'search' => $search, // Agregar el campo 'search' al array $data con el valor recibido
        ];
        } else {            
            $paginateData = $productModel->paginate(10);
            $data = [
                'producto' => $paginateData,
                'paginador' => $productModel->pager,
                
             ];
        }
  
       
        // Recupera todos los productos desde el modelo
        $data['categorias']=$categoriasmodel->getCategorias();
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/catalogo', $data);
        echo view('front/footer');
    } 

public function buscar_catalogo()
    {
        helper(['form','url','cart']);
        $categoriasmodel= new categoria_model();
        $productModel = new productModel();
        $session=session();
        $search = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            $search = $_POST['search'];
         $paginateData = $productModel->select('*')
          ->orLike('nombre_pro', $search)
          ->orLike('id', $search)
          ->paginate(5);
        } else {
            
            $paginateData = $productModel->paginate(10);
                
        }
        
        $data = [
            'producto' => $paginateData,
            'paginador' => $productModel->pager,
            'search' => $search
         ];

    $data['categorias']=$categoriasmodel->getCategorias();
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/catalogo', $data);
        echo view('front/footer');
    } 
}
