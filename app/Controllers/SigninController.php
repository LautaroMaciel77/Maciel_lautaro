<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Filters\AuthFilter;
class SigninController extends Controller
{
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $data = $userModel->where('email', $email)->first();
        
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'nombre' => $data['nombre'],
                    'email' => $data['email'],
                    'perfil_id' => $data['perfil_id'],
                    'isLoggedIn' => TRUE
                ];
                session()->set($ses_data);
                session()->setFlashdata('msg', 'Inicio de secion correcto');
                return redirect()->to('/');
            
            }else{
                session()->setFlashdata('msg', 'Password is incorrect');
                return redirect()->to('/');
            }
        }else{
            session()->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
?>