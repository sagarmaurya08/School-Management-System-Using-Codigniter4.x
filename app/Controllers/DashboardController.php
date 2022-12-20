<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        helper(['filesystem','custom_helper']);
    }

    public function index()
    {
        $data['page_name']= 'Dashboard';
        return view('backend/dashboard',$data);
    }

    public function profile()
    {
        $user_id = session()->get('id');
        $userModel = new UserModel;
        $data['page_name']= 'Manage Profile';
        $data['profileData'] = $userModel->where('id', $user_id)->first();
        $current_pic = $data['profileData']['profile_pic'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $rules = [
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'phone' => 'required|min_length[10]|max_length[13]',
                'profile_pic' => 'uploaded[profile_pic]|max_size[profile_pic,1024]|ext_in[profile_pic,png,jpg,jpeg,docx,pdf],'
            ];
            if($this->validate($rules)){
                $file = $this->request->getFile('profile_pic');
                $newName = $file->getRandomName();
                if(file_exists('../public/backend/uploads/profile/'.$current_pic)){
                    unlink('../public/backend/uploads/profile/'.$current_pic);
                }
                //delete_files($current_pic, true);
                $file->move('../public/backend/uploads/profile', $newName);
                $updateData = [
                    'name'   => $this->request->getVar('name'),
                    'email'  => $this->request->getVar('email'),
                    'phone'  => $this->request->getVar('phone'),
                    'status' => $this->request->getVar('status'),
                    'profile_pic'  => $newName,
                ];
                $updateddata = $userModel->update($user_id, $updateData);
                if($updateddata){
                    session()->setFlashdata('success', 'Profile updated successfully!');
                    return redirect()->to('/admin-profile');
                }
                else{
                    session()->setFlashdata('error', 'Somrething went wrongs!');
                    return redirect()->to('/admin-profile');
                }
            }
            else{
                $data['validation'] = $this->validator;
                return view('backend/pages/profile', $data);
            }
        }
        return view('backend/pages/profile',$data);
    }
}
