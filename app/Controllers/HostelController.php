<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\HostelModel;

class HostelController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'custom_helper']);
        $this->hostelModel = new HostelModel();
    }
    
    public function show()
    {
        $data['hostelData'] = $this->hostelModel->findAll();

        return view('backend/pages/hostel', $data);
    }

    public function showHostelForm()
    {
      return view('backend/pages/add_hostel');  
    }

    public function insertHostel()
    {
        
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[hostel.email]',
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
            $file->move('../public/backend/uploads/hostel', $newName);
            $updateData = [
                'name'     => $this->request->getVar('name'),
                'hostel_number'=> $this->request->getVar('hostel_number'),
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
            $insertData = $this->hostelModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Hostel saved successfully!');
                return redirect()->to('/employee/hostel');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/employee/hostel');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_hostel', $data);
        }
    }

    public function editHostel($id='')
    {
        $data['editHostelData'] = $this->hostelModel->find($id);
        return view('backend/pages/add_hostel', $data);
    }

    public function updateHostel($id='')
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[hostel.email,hostel_id,'.$id.']',
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
            $file->move('../public/backend/uploads/hostel', $newName);
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
            $dbImg = $this->hostelModel->find($id);
            if(file_exists('../public/backend/uploads/hostel/'.$dbImg['file_name'])){
                unlink('../public/backend/uploads/hostel/'.$dbImg['file_name']);
            }
            $updateData = $this->hostelModel->update($id, $editData);
            if($updateData){
                session()->setFlashdata('success', 'Hostel updated successfully!');
                return redirect()->to('/employee/hostel');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/employee/hostel');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editHostelData'] = $this->hostelModel->find($id);
            return view('backend/pages/add_hostel', $data);
        }
    }

    public function deleteHostel($id='')
    {
        $dbImg = $this->hostelModel->find($id);
        if(file_exists('../public/backend/uploads/hostel/'.$dbImg['file_name'])){
            unlink('../public/backend/uploads/hostel/'.$dbImg['file_name']);
        }
        $deleteHostel = $this->hostelModel->delete($id);
        if($deleteHostel){
            session()->setFlashdata('success', 'Hostel deleted successfully!');
            return redirect()->to('/employee/hostel');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/employee/hostel');
        }
    }
}
