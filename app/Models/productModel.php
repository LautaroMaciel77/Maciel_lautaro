<?php 
namespace App\Models;  

use CodeIgniter\Model;
class ProductModel extends Model{
    protected $table = 'producto';
    protected $primaryKey = 'id';
    protected $allowedFields = [

        'nombre_pro',
        'img',
        'descripcion',
        'precio',
        'precio_lista',
        'stock',
        'stock_min',
        'fecha_modificacion',
        'elimininado',
        'categoria_id',
    ];

}
