<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\ConsultaModel;

class consultaController extends Controller
{ 

    
    public function consultas(){
        helper(['form']);
        $consultaModel = new ConsultaModel();
    
        $data=[
            
            'consulta' => $consultaModel->paginate(10),
            'paginador' => $consultaModel->pager];

        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/consulta/consultas', $data);
        echo view('front/footer');

    }
    public function consultas_respuestas(){
        helper(['form']);
        $consultaModel = new ConsultaModel();
    
        $data=[
            
            'consulta' => $consultaModel->paginate(10),
            'paginador' => $consultaModel->pager];

        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/consulta/consultas_respuestas', $data);
        echo view('front/footer');

    }

    public function respuestas($id){

        $consultaModel = new ConsultaModel();
        $consulta = $consultaModel->find($id);
        $data['consulta']=$consulta;
        helper(['form']);
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/consulta/respuesta',$data);
        echo view('front/footer');

    }
    
public function buscar()
{
    $consultaModel = new ConsultaModel();
    $search = '';

  
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            $search = $_POST['search'];
         $paginateData = $consultaModel->select('*')
          ->orLike('id', $search)
          ->orLike('asunto', $search)
          ->orLike('mail', $search)
          ->orLike('fecha_consulta', $search)
          ->paginate(5);
        
    }  else {
            
        $paginateData = $consultaModel->paginate(10);
            
    }
    $data = [
        'consulta' => $paginateData,
        'paginador' => $consultaModel->pager,
        'search' => $consultaModel
     ];
     $vista= $this->request->getVar('vista');
    echo view('front/header');
    echo view('front/navbar');
    if($vista=='1'){
        echo view('backend/consulta/consultas_respuestas', $data);
    }else{
        echo view('backend/consulta/consultas', $data);
    }
    echo view('front/footer');
}

    public function store()
    {
        helper(['form']);
   
           
   
        // Validación de datos (puedes personalizar las reglas según tus necesidades)
        $rules = [
            'asunto'=>  'required|min_length[2]',
            'mail'=>  'required|min_length[2]',
            'mensaje' => 'required|min_length[2]',
        
        
        ];
    
        if ($this->validate($rules)) {
            // Crea una instancia del modelo de consulta
            $consultaModel = new ConsultaModel();
    
            // Define los datos de la consulta a guardar
            $data = [
                'asunto' =>  $this->request->getVar('asunto'),
                'mail' =>  $this->request->getVar('mail'),
                'descripcion' => $this->request->getVar('mensaje'),
                'fecha_consulta' => date('Y-m-d'),
            ];
    
            // Guarda la consulta en la base de datos
            $consultaModel->save($data);
    
            // Redirecciona a la página de éxito o muestra un mensaje de confirmación
            return redirect()->to(base_url('/contacto'));
        } else {
                session()->setFlashdata('msg', '¡Datos no válidos!');
                return redirect()->to(base_url('/contacto'));
            } 
    
            
        
    }


public function respuesta($id){
$email = \Config\Services::email();
$consultaModel = new ConsultaModel();
$consulta = $consultaModel->find($id);

if($this->request->getVar('test_mailtrap')){
    
//modo mailtrap
$data = [
    'destinatario' => $this->request->getVar('mail'),
    'asunto' => $this->request->getVar('asunto'),
    'pregunta' =>$this->request->getVar('descripcion'),
    'respuesta' => $this->request->getVar('respuesta'),
] ;
// Configurar los parámetros del correo

$email->setFrom('admin@hobbymania.com', 'Centro de ayuda de Hobbymania');
$email->setTo($data['destinatario']);
$email->setSubject($data['asunto']);
$email->setMessage( view('mail_detail.php',$data));

// Enviar el correo
if ($email->send()) {
    //guardar tiempo cuando se respondio
    $consultaModel->update($id, ['fecha_respuesta'=> date('Y-m-d H:i:s')]);
    $consultaModel->update($id, ['respuesta'=> $data['respuesta']]);
    session()->setFlashdata('msg', 'correo enviado');
    return redirect()->to(site_url('/consultas'));
} else {
    session()->setFlashdata('msg', 'correo no enviado');   
    return redirect()->to(site_url('/consultas'));

}
}else{
    $data = [
        'fecha' => date('Y-m-d H:i:s'),
        'respuesta' => $this->request->getVar('respuesta'),
    ] ;
//modo sin mailtrap
$consultaModel->update($id, ['fecha_respuesta'=> date('Y-m-d H:i:s')]);
$consultaModel->update($id, ['respuesta'=> $data['respuesta']]);
session()->setFlashdata('msg', 'correo enviado');
return redirect()->to(site_url('/consultas'));
}

}
}
