<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null){
        $session = session();
        $user = $session->get('user');
        // $arguments contient le(s) rôle(s) autorisé(s)
        // ex: ['admin'] ou ['admin', 'bibliothecaire']
        if (!$user) {
            return redirect()->to('/login')->with('erreur', 'Veuillez vous connecter');
        }
        
        $role = $user['role'] ?? null;
        $typeId = $user['id_type_user'] ?? null;

        // L'admin a accès à tout
        if ($role === 'admin' || (string) $typeId === '1') {
            return;
        }

        $allowed = $arguments ?? [];
        $hasAccess = in_array($role, $allowed, true) || in_array((string) $typeId, $allowed, true);

        if (!$hasAccess) {
            return redirect()->to('/')->with('erreur', 'Accès refusé : droits insuffisants');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        // Rien à faire après
    }
}