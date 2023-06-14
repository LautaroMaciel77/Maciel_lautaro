<?php

namespace App\Controllers;

use App\Models\FavoritoModel;
use CodeIgniter\Controller;
use App\Models\productModel;
use App\Models\UserModel;
use App\Models\FavoritosModel;

class FavoritosController extends Controller
{
    public function favoritos()
    {
        helper(['form','url','cart']);
        $session = session();
        $id=$session->get('id');
        $favoritoModel = new FavoritosModel();
        $favoritos = $favoritoModel->getFavoritosByUser($id);
        $data = [
            'favoritos' => $favoritos,
        ];

        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/favoritos', $data);
        echo view('front/footer');
    }

    public function crear($productoId)
{
    $favoritoModel = new FavoritosModel();
    $session = session();
    $usuarioId = $session->get('id');
    
    // Verifica si el producto ya es favorito antes de insertarlo
    if (!$favoritoModel->isFavorito($productoId, $usuarioId)) {
        $data = [
            'producto_id' => $productoId,
            'usuario_id' => $usuarioId,
        ];
        $favoritoModel->insert($data);
        return redirect()->back()->with('msg', 'Producto añadido a favoritos');
    } else {
        return redirect()->back()->with('msg', 'El producto ya está en favoritos');
    }
}
    public function borrar($productoId)
{
    $favoritoModel = new FavoritosModel();
    $session = session();
    $usuarioId = $session->get('id');
    
    // Verifica si el producto ya es favorito antes de borrarlo
    if ($favoritoModel->isFavorito($productoId, $usuarioId)) {
        $favoritoModel->where('producto_id', $productoId)
            ->where('usuario_id', $usuarioId)
            ->delete();
            return redirect()->back()->with('msg','producto borrado de favoritos');
    }else{
        
        return redirect()->back()->with('msg','producto no pudo ser borrado de favoritos');
    }
    }
    
   
}
