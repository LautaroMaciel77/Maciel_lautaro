<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\productModel;
use App\Models\categoria_model;
class SliderController extends Controller
{
    public function index()
    {
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
  
    
    
}