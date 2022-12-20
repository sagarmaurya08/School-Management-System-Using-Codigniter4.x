<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AccountantModel;

class AccountantController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'custom_helper']);
        $this->accountantModel = new AccountantModel();
    }
    
    public function show()
    {
        $data['accountantData'] = $this->accountantModel->findAll();

        return view('backend/pages/accountant', $data);
    }

    public function showAccountantForm()
    {
      return view('backend/pages/add_accountant');  
    }

    public function insertAccountant()
    {
        
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[accountant.email]',
            'phone' => 'required|min_length[8]|max_length[13]',
            'birthday' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'qualification' => 'required',
            'password' => 'required|min_length[6]|max_length[10]',
            'file_name' => 'uploaded[file_name]|max_size[file_name,1024]|ext_in[file_name,png,jpg,jpeg,docx,pdf],'
        ];
        if($this->validate($rules)){
            $file = $this->request->getFile('file_name');
            $newName = $file->getRandomName();
            $file->move('../public/backend/uploads/accountant', $newName);
            $updateData = [
                'name'     => $this->request->getVar('name'),
                'accountant_number'=> $this->request->getVar('accountant_number'),
                'email' => $this->request->getVar('email'),
                'phone'   => $this->request->getVar('phone'),
                'birthday'   => $this->request->getVar('birthday'),
                'sex'   => $this->request->getVar('sex'),
                'address'  => $this->request->getVar('address'),
                'religion'=> $this->request->getVar('religion'),
                'blood_group'=> $this->request->getVar('blood_group'),
                'qualification'=> $this->request->getVar('qualification'),
                'marital_status'=> $this->request->getVar('marital_status'),
                'facebook'=> $this->request->getVar('facebook'),
                'twitter'=> $this->request->getVar('twitter'),
                'google_plus'=> $this->request->getVar('google_plus'),
                'linkedin'=> $this->request->getVar('linkedin'),
                'file_name'=> $newName,
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $insertData = $this->accountantModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Accountant saved successfully!');
                return redirect()->to('/employee/accountant');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/employee/accountant');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_accountant', $data);
        }
    }

    public function editAccountant($id='')
    {
        $data['editAccountantData'] = $this->accountantModel->find($id);
        return view('backend/pages/add_accountant', $data);
    }

    public function updateAccountant($id='')
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[accountant.email,accountant_id,'.$id.']',
            'phone' => 'required|min_length[8]|max_length[15]',
            'birthday' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'qualification' => 'required',
            'file_name' => 'uploaded[file_name]|max_size[file_name,1024]|ext_in[file_name,png,jpg,jpeg,docx,pdf],'
        ];
        if($this->validate($rules)){
            $file = $this->request->getFile('file_name');
            $newName = $file->getRandomName();
            $file->move('../public/backend/uploads/accountant', $newName);
            $editData = [
                'name'     => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone'   => $this->request->getVar('phone'),
                'birthday'   => $this->request->getVar('birthday'),
                'sex'   => $this->request->getVar('sex'),
                'address'  => $this->request->getVar('address'),
                'religion'=> $this->request->getVar('religion'),
                'blood_group'=> $this->request->getVar('blood_group'),
                'qualification'=> $this->request->getVar('qualification'),
                'marital_status'=> $this->request->getVar('marital_status'),
                'facebook'=> $this->request->getVar('facebook'),
                'twitter'=> $this->request->getVar('twitter'),
                'google_plus'=> $this->request->getVar('google_plus'),
                'linkedin'=> $this->request->getVar('linkedin'),
                'file_name'=> $newName,
            ];
            $dbImg = $this->accountantModel->find($id);
            if(file_exists('../public/backend/uploads/accountant/'.$dbImg['file_name'])){
                unlink('../public/backend/uploads/accountant/'.$dbImg['file_name']);
            }
            $updateData = $this->accountantModel->update($id, $editData);
            if($updateData){
                session()->setFlashdata('success', 'Accountant updated successfully!');
                return redirect()->to('/employee/accountant');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/employee/accountant');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editAccountantData'] = $this->accountantModel->find($id);
            return view('backend/pages/add_accountant', $data);
        }
    }

    public function deleteAccountant($id='')
    {
        $dbImg = $this->accountantModel->find($id);
        if(file_exists('../public/backend/uploads/accountant/'.$dbImg['file_name'])){
            unlink('../public/backend/uploads/accountant/'.$dbImg['file_name']);
        }
        $deleteParent = $this->accountantModel->delete($id);
        if($deleteParent){
            session()->setFlashdata('success', 'Accountant deleted successfully!');
            return redirect()->to('/employee/accountant');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/employee/accountant');
        }
    }
}
