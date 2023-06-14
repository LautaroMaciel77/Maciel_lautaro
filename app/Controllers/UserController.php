<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;


class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data=[
            
            'users' => $userModel->paginate(10),
            'paginador' => $userModel->pager];

        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/User/usarios', $data);
        echo view('front/footer');
    }
    public function baja()
    {
        $userModel = new UserModel();
      $data=[
            
            'users' => $userModel->paginate(10),
            'paginador' => $userModel->pager];
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/User/usuario_eliminados', $data);
        echo view('front/footer');
    }

    public function changeBaja($id)
{
    // Lógica para cambiar el valor de "baja" a "SI" en la base de datos para el usuario con el ID especificado
    $this->userModel = new UserModel();
    $user = $this->userModel->find($id);
    
 
    // Verificar si el usuario existe
    if ($user) {
        $baja = $user['baja'];
        if($baja =='NO'){
            $this->userModel->update($id, ['baja' => 'SI']);
        } else if ($baja =='SI') {
            // Realiza acciones cuando $perfil_id es igual a '2'
            $this->userModel->update($id, ['baja' => 'NO']);
        } else {
            // Realiza acciones por defecto cuando $perfil_id no coincide con '1' ni '2'
            $this->userModel->update($id, ['baja' => 'NO']);
        }
        
        // Guardar los cambios en la base de datos

    }
    
    session()->setFlashdata('msg', 'baja cambiada');
    return redirect()->to('/usarios');
}
public function change_id($id)
{
    // Lógica para cambiar el valor de "baja" a "SI" en la base de datos para el usuario con el ID especificado
    $this->userModel = new UserModel();
    $user = $this->userModel->find($id);

    if ($user) {
        // Realiza las acciones necesarias con los datos del usuario encontrado
        $perfil_id = $user['perfil_id'];
        
        if ($perfil_id == '1') {
            // Realiza acciones cuando $perfil_id es igual a '1'
            $this->userModel->update($id, ['perfil_id' => '2']);
        } else if ($perfil_id == '2') {
            // Realiza acciones cuando $perfil_id es igual a '2'
            $this->userModel->update($id, ['perfil_id' => '1']);
        } else {
            // Realiza acciones por defecto cuando $perfil_id no coincide con '1' ni '2'
            $this->userModel->update($id, ['perfil_id' => '2']);
        }
    }
    session()->setFlashdata('msg', 'perfil_id cambiado');
    return redirect()->to('/usarios');
}

public function buscar()
{
    $userModel = new UserModel();
    $search = '';

  
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            $search = $_POST['search'];
         $paginateData = $userModel->select('*')
          ->orLike('nombre', $search)
          ->orLike('id', $search)
          ->paginate(5);
        

    }  else {
            
        $paginateData = $userModel->paginate(10);
            
    }
    $data = [
        'users' => $paginateData,
        'paginador' => $userModel->pager,
        'search' => $search
     ];
     $vista= $this->request->getVar('vista');

    echo view('front/header');
    echo view('front/navbar');
    if($vista=='1'){
        echo view('backend/User/usuario_eliminados', $data);
    }else{
        echo view('backend/User/usarios', $data);
    }
  
    echo view('front/footer');
}
public function editar_usuario($id){
        $userModel = new UserModel();
        $user = $userModel->find($id);

        $data['user'] = $user;
    
        echo view('front/header');
        echo view('front/navbar');
        echo view('backend/User/editar_usuarios',  $data);
        echo view('front/footer');
    }

    public function editar($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        $email = $this->request->getVar('email');
        $existingEmail = $user['email'];
    
        $validationRules = [
            'nombre' => 'required|min_length[2]|max_length[50]',
        ];
    
        if ($email !== $existingEmail) {
            $validationRules['email'] = 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]';
        }
    
        // Verifica si se proporcionó una nueva contraseña
        $newPassword = $this->request->getVar('new_password');
        if (!empty($newPassword)) {
            $validationRules['new_password'] = 'required|min_length[4]|max_length[50]';
            $validationRules['confirm_password'] = 'matches[new_password]';
    
            // Verifica la contraseña actual
            $currentPassword = $this->request->getVar('current_password');
            if (!password_verify($currentPassword, $user['password'])) {
                session()->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to(base_url('/usarios'));
            }
        }
    
        if (!$this->validate($validationRules)) {
            session()->setFlashdata('msg', '¡Datos no válidos!');
            return redirect()->to(base_url('/usarios'));
        }
    
        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'email' => $email,
        ];
    
        // Actualiza la contraseña solo si se proporcionó una nueva
        if (!empty($newPassword)) {
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }
    
        $userModel->update($id, $data);
        session()->setFlashdata('msg', 'Cuenta actualizada');
        if( $user['perfil_id']==1){
        return redirect()->to('/usarios');
    }
    return redirect()->to('/');

}
    

public function mostrar_todo(){
 
    return $this->index();
}}

