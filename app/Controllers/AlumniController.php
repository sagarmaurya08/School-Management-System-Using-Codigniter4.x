<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AlumniModel;

class AlumniController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'custom_helper']);
        $this->alumniModel = new AlumniModel();
    }
    
    public function show()
    {
        $data['alumniData'] = $this->alumniModel->findAll();

        return view('backend/pages/alumni', $data);
    }

    public function showAlumniForm()
    {
      return view('backend/pages/add_alumni');  
    }

    public function insertAlumni()
    {
        
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[alumni.email]',
            'phone' => 'required|min_length[8]|max_length[13]',
            'address' => 'required',
            'sex' => 'required',
            'profession' => 'required',
            'g_year' => 'required',
            'marital_status' => 'required',
            'club' => 'required',
            'interest' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'name'     => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone'   => $this->request->getVar('phone'),
                'sex'   => $this->request->getVar('sex'),
                'address'  => $this->request->getVar('address'),
                'profession'=> $this->request->getVar('profession'),
                'g_year'=> $this->request->getVar('g_year'),
                'club'=> $this->request->getVar('club'),
                'marital_status'=> $this->request->getVar('marital_status'),
                'interest'=> $this->request->getVar('interest'),
            ];
            $insertData = $this->alumniModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Alumni saved successfully!');
                return redirect()->to('/alumni');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/alumni');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_alumni', $data);
        }
    }

    public function editAlumni($id='')
    {
        $data['editAlumniData'] = $this->alumniModel->find($id);
        return view('backend/pages/add_alumni', $data);
    }

    public function updateAlumni($id='')
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[alumni.email,alumni_id,'.$id.']',
            'phone' => 'required|min_length[8]|max_length[13]',
            'address' => 'required',
            'sex' => 'required',
            'profession' => 'required',
            'g_year' => 'required',
            'marital_status' => 'required',
            'club' => 'required',
            'interest' => 'required',
        ];
        if($this->validate($rules)){
            $editData = [
                'name'     => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone'   => $this->request->getVar('phone'),
                'sex'   => $this->request->getVar('sex'),
                'address'  => $this->request->getVar('address'),
                'profession'=> $this->request->getVar('profession'),
                'g_year'=> $this->request->getVar('g_year'),
                'club'=> $this->request->getVar('club'),
                'marital_status'=> $this->request->getVar('marital_status'),
                'interest'=> $this->request->getVar('interest'),
            ];
            $updateData = $this->alumniModel->update($id, $editData);
            if($updateData){
                session()->setFlashdata('success', 'Alumni updated successfully!');
                return redirect()->to('/alumni');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/alumni');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editAlumniData'] = $this->alumniModel->find($id);
            return view('backend/pages/add_alumni', $data);
        }
    }

    public function deleteAlumni($id='')
    {
        $deleteAlumni = $this->alumniModel->delete($id);
        if($deleteAlumni){
            session()->setFlashdata('success', 'Alumni deleted successfully!');
            return redirect()->to('/alumni');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/alumni');
        }
    }
}
