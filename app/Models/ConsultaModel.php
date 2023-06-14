<?php
namespace App\Models;

use CodeIgniter\Model;
class ConsultaModel extends Model{
    protected $table ="consultas";
    protected $primaryKey ="id";
    protected $allowedFields =['asunto','mail','descripcion','fecha_consulta','fecha_respuesta','respuesta'];

    public function getConsulta(){
        return $this->findAll();
    }

}