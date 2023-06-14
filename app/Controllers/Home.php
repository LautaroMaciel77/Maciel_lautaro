<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\productModel;
use App\Models\categoria_model;
use App\Models\BannerModel;
class Home extends BaseController
{
    public function index()
    {
        $BannerModel = new BannerModel();
        $banners = $BannerModel->getBanner();
    
        $data['banners'] = $banners;
        helper(['form','url','cart']);
        $categoriasmodel=new categoria_model();
        $data['categorias']=$categoriasmodel->getCategorias();
        $session=session();
        $productModel = new productModel();

        $data['producto'] = $productModel->orderBy('id', 'DESC')->findAll(); // Recupera todos los productos desde el modelo
        echo view('front/header');
        echo view('front/navbar');
        echo view('front/proyecto',$data);
        echo view('front/footer');
    }
  
    
    
    public function terminos()
    {
        $data['titulo']="terminos";
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('front/preguntas');
        echo view('front/terminos');
        echo view('front/footer');
    }
    public function contacto()
    {
        $data['titulo']="contacto";
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('front/contacto');
        echo view('front/footer');
    }
    public function registro()
    {
        $data['titulo']="registro";
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('front/signup');
        echo view('front/footer');
    }
    public function nosotros()
    {
        $data['titulo']="nosotros";
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('front/nosotros');
        echo view('front/footer');
    }
    public function signup()
    {
        $data['titulo']="signup";
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('front/signup');
        echo view('front/footer');
    }
  
    
    
}
