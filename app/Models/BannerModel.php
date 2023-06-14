<?php
namespace App\Models;

use CodeIgniter\Model;
class BannerModel extends Model{
    protected $table ="banner";
    protected $primaryKey ="id";
    protected $allowedFields =['img','baja','nombre'];

    public function getBanner(){
        return $this->findAll();
    }


}

 
