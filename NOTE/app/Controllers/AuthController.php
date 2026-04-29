<?php
namespace App\Controllers;
use App\Models\UserModel;
class AuthController extends BaseController{
    public function form()
    {
    return view('login');
    }

    public function login(){
        $model = new UserModel();
        $user = $this->request->getPost('user');
        $pwd = $this->request->getPost('pwd');
        // $user = $model->where('user', $user)->first();
        $user = $model->where('user', $user)->where('pwd', $pwd)->first();
        // if (!$user || !pwd_verify($pwd, $user['pwd'])) {
        if (!$user) {
        return view('login', [
            'erreur' => 'user ou mot de passe incorrect'
        ]);
        }
        // Stocker uniquement les données non sensibles en session
        session()->set('user', [
            'id'=> $user['id'],
            'user' => $user['user'],
            'id_type_user' => $user['id_type_user'],  // 'admin' | 'bibliothecaire' | 'lecteur'
        ]);
        // return view('/dashboard');
        return redirect()->to('/dashboard');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}