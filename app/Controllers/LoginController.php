<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn'))
        {
            return redirect()->to('/admin/dashboard');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]'
            ];
            if($this->validate($rules)){
                $userModel = new UserModel();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
               
                $data = $userModel->where('email', $email)->first();
                
                if($data){
                    $pass = $data['password'];
                    $authenticatePassword = password_verify($password, $pass);
                    if($authenticatePassword){
                        $ses_data = [
                            'id' => $data['id'],
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'isLoggedIn' => TRUE
                        ];
                        session()->set($ses_data);
                        session()->setFlashdata('success', 'You are loged in!');
                        return redirect()->to('/admin/dashboard');
                    
                    }else{
                        session()->setFlashdata('error', 'Password is incorrect.');
                        return view('login');
                    }
                }else{
                    session()->setFlashdata('error', 'Email does not exist.');
                    return view('login');
                }
            }else{
                $data['validation'] = $this->validator;
                return view('login', $data);
            }
        }
        return view('login');
    }

    public function logout()
    {
       if(session()->get('isLoggedIn')){
        $ses_data = [
            'id' => '',
            'name' => '',
            'email' => '',
            'isLoggedIn' => false
        ];
        session()->set($ses_data);
        return redirect()->to('/login');
       } 
    }
}
