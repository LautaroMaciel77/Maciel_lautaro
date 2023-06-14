<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'email',
        'password',
        'perfil_id',
        'baja'
        
    ];
    public function buscarUsuarios($search)
    {
        return $this->like('nombre', $search)
                    ->orWhere('email', $search)
                    ->findAll();
    }
}