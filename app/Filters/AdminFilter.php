<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si el usuario ha iniciado sesión y su perfil_id es igual a 1
        if (session()->get('perfil_id') != 1) {
            return redirect()->to('\ ')->with('error', 'Acceso no autorizado.');
        }
        
        // Continuar con la solicitud si el usuario es un administrador
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita realizar ninguna acción después de la solicitud
    }
}