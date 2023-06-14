<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view('backend/User/signup', $data);
        echo view('front/footer');
        
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'nombre'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'nombre'     => $this->request->getVar('nombre'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                
            ];
            $userModel->save($data);
            session()->setFlashdata('msg', 'cuenta creada registrese ahora ');
            return redirect()->to('/');
            
        }else{
            $data['validation'] = $this->validator;
            session()->setFlashdata('msg', '¡Datos no válidos!');
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      
        }
          
    }
  
}