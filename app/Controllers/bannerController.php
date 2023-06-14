<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\productModel;
use App\Models\BannerModel;

class BannerController extends Controller{
    

    public function banner(){
        helper(['form']);
        $bannerModel = new BannerModel();

        $data=[
            
            'banners' => $bannerModel->paginate(10),
            'paginador' => $bannerModel->pager];
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/banner/banner',$data);
        echo view('front/footer');
    }

    public function banner_eliminados(){
        helper(['form']);
        $bannerModel = new BannerModel();

        $data=[
            
            'banners' => $bannerModel->paginate(10),
            'paginador' => $bannerModel->pager];
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/banner/banner_eliminados',$data);
        echo view('front/footer');
    }
        public function alta_banner(){
      
            echo view('front/header');
            echo view('front/navbar');
            echo view('backend/banner/alta_banner');
            echo view('front/footer');
        }
        public function editar_banner($id){
            $bannerModel = new BannerModel();
            $banner = $bannerModel->find($id);
             // Pasa los datos del banner a la vista correspondiente
            $data['banner'] = $banner;
        
            echo view('front/header');
            echo view('front/navbar');
            echo view('backend/banner/editar_banner',  $data);
            echo view('front/footer');
        }
    
        public function changeBaja($id)
        {
            // Lógica para cambiar el valor de "baja" a "SI" en
            $this->bannerModel = new BannerModel();
            $product = $this->bannerModel->find($id);
            
        

            if ($product) {
                $baja = $product['baja'];
                if($baja =='NO'){
                    $this->bannerModel->update($id, ['baja' => 'SI']);
                } else if ($baja =='SI') {
                    // Realiza acciones cuando es igual a '2'
                    $this->bannerModel->update($id, ['baja' => 'NO']);
                } else {
                    // Realiza acciones por defecto cuando no coincide con '1' ni '2'
                    $this->bannerModel->update($id, ['baja' => 'NO']);
                }
                
                // Guardar los cambios en la base de datos
        
            }
            session()->setFlashdata('msg', 'Banner Actualizado');
          return redirect()->back();
        }

        public function buscar()
        {
        
            $bannerModel = new BannerModel();
            $search = '';
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                $search = $_POST['search'];
             $paginateData = $bannerModel->select('*')
              ->orLike('nombre', $search)
              ->orLike('id', $search)
              ->paginate(5);
            } else {
                
                $paginateData = $bannerModel->paginate(10);
                    
            }
            
            $data = [
                'banners' => $paginateData,
                'paginador' => $bannerModel->pager,
                'search' => $search
             ];
        
            $vista= $this->request->getVar('vista');
            echo view('front/header');
            echo view('front/navbar');
            if($vista=='1'){
                echo view('backend/banner/banner_eliminados', $data);
            }else{
                echo view('backend/banner/banner', $data);
            }
            echo view('front/footer');
          
        }

    public function store(){
        helper(['form']);
        $bannerModel = new BannerModel();
       
    $validationRules = [
        'imagen' => 'is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png,image/webp,image/ico]',
        'nombre'=> 'required'
    ];

    if (!$this->validate($validationRules)) {
        session()->setFlashdata('msg', '¡Datos no válidos!');
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
        else {

            if (!$this->request->getFile('imagen')->isValid()) {
                // El usuario no ha seleccionado un archivo de imagen válido
                session()->setFlashdata('msg', '¡Imagen no valida!');
                return redirect()->to(base_url('/alta_banner'));
            }

            $img=$this->request->getFile('imagen');
            $random_name = $img->getRandomName();
            $img->move(ROOTPATH.'asset/uploads/banner', $random_name);

            $data=[
                'img'       =>   $random_name,
                'nombre' => $this->request->getVar('nombre'),
                ];
            $bannerModel->insert($data);
            session()->setFlashdata('msg', 'banner ingresado');
            return redirect()->to(site_url('alta_banner'));
        }
        
    }

public function editar($id)
    {
        $bannerModel = new BannerModel();
        $banner = $bannerModel->find($id);
        $imagenActual = $banner['img'];
        $img_flag=false;

        $validationRules = [
            'nombre' => 'required|min_length[2]'
        ];


        if (!$this->validate($validationRules)) {
            session()->setFlashdata('msg', '¡Datos no válidos!');
            return redirect()->to(base_url('/banner'));
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
            $img->move(ROOTPATH.'asset/uploads/banner', $randomName);
    
            // Actualizar el campo 'img' en el array $data
            $data['img'] = $randomName;
          
            $bannerModel->update($id, ['img' =>$randomName]);
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
            'nombre' => $this->request->getVar('nombre'),];
        $bannerModel->update($id,$data);
        session()->setFlashdata('msg', '¡Datos Actualizados!');
        return redirect()->to(base_url('/banner'));
    
    }
    
    
    
    }
        
     