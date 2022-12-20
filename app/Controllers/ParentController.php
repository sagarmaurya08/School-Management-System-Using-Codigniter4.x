<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ParentModel;

class ParentController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->parentModel = new ParentModel();
    }
    
    public function show()
    {
        $data['parentData'] = $this->parentModel->findAll();
        return view('backend/pages/parent', $data);
    }

    public function showParentForm()
    {
      return view('backend/pages/add_parent');  
    }

    public function insertParent()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[8]|max_length[13]',
            'address' => 'required',
            'profession' => 'required',
            'password' => 'required|min_length[6]|max_length[10]',
        ];
        if($this->validate($rules)){
            $updateData = [
                'name'     => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone'   => $this->request->getVar('phone'),
                'address'      => $this->request->getVar('address'),
                'profession'=> $this->request->getVar('profession'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $insertData = $this->parentModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Parent saved successfully!');
                return redirect()->to('/parent');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/parent');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_parent', $data);
        }
    }

    public function editParent($id='')
    {
        $data['editParentData'] = $this->parentModel->find($id);
        return view('backend/pages/add_parent', $data);
    }

    public function updateParent($id='')
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[8]|max_length[13]',
            'address' => 'required',
            'profession' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'name'     => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone'   => $this->request->getVar('phone'),
                'address'      => $this->request->getVar('address'),
                'profession'=> $this->request->getVar('profession'),
            ];
            $updateData = $this->parentModel->update($id, $updateData);
            if($updateData){
                session()->setFlashdata('success', 'Parent updated successfully!');
                return redirect()->to('/parent');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/parent');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editParentData'] = $this->parentModel->find($id);
            return view('backend/pages/add_parent', $data);
        }
    }

    public function deleteParent($id='')
    {
        $deleteParent = $this->parentModel->delete($id);
        if($deleteParent){
            session()->setFlashdata('success', 'Parent deleted successfully!');
            return redirect()->to('/parent');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/parent');
        }
    }
}
