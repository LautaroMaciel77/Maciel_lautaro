<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class FavoritosModel extends Model
{
    protected $table = 'favoritos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'producto_id',
        'usuario_id',
    
    ];

   

    public function getFavoritosByUser($userId)
    {
        return $this->select('favoritos.*, producto.*')
            ->join('producto', 'producto.id = favoritos.producto_id')
            ->where('favoritos.usuario_id', $userId)
            ->findAll();
    }

    public function getFavoritosCountByUser($userId)
    {
        return $this->where('usuario_id', $userId)->countAllResults();
    }

    public function isFavorito($productoId, $usuarioId)
    {
        return $this->where('producto_id', $productoId)
            ->where('usuario_id', $usuarioId)
            ->countAllResults() > 0;
    }
}