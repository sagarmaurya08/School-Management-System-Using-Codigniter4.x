<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TeacherModel;

class TeacherController extends BaseController
{
    public function __construct()
    {
        $this->teacherModel = new TeacherModel();
        helper('form');
    }

    public function show()
    {
        $data['teacherData'] = $this->teacherModel->findAll();

        return view('backend/pages/teacher', $data);
    }

    public function showTeacherForm()
    {
      return view('backend/pages/add_teacher');  
    }

    public function insertTeacher()
    {
        
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[teacher.email]',
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
            $file->move('../public/backend/uploads/teacher', $newName);
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
            $insertData = $this->teacherModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Teacher saved successfully!');
                return redirect()->to('/hr/teacher');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/hr/teacher');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_teacher', $data);
        }
    }

    public function editTeacher($id='')
    {
        $data['editTeacherData'] = $this->teacherModel->find($id);
        return view('backend/pages/add_teacher', $data);
    }

    public function updateTeacher($id='')
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[teacher.email,teacher_id,'.$id.']',
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
            $file->move('../public/backend/uploads/teacher', $newName);
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
            $dbImg = $this->teacherModel->find($id);
            if(file_exists('../public/backend/uploads/teacher/'.$dbImg['file_name'])){
                unlink('../public/backend/uploads/teacher/'.$dbImg['file_name']);
            }
            $updateData = $this->teacherModel->update($id, $editData);
            if($updateData){
                session()->setFlashdata('success', 'Hostel updated successfully!');
                return redirect()->to('/hr/teacher');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/hr/teacher');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editTeacherData'] = $this->teacherModel->find($id);
            return view('backend/pages/add_teacher', $data);
        }
    }

    public function deleteTeacher($id='')
    {
        $dbImg = $this->teacherModel->find($id);
        if(file_exists('../public/backend/uploads/teacher/'.$dbImg['file_name'])){
            unlink('../public/backend/uploads/teacher/'.$dbImg['file_name']);
        }
        $deleteTeacher = $this->teacherModel->delete($id);
        if($deleteTeacher){
            session()->setFlashdata('success', 'Teacher deleted successfully!');
            return redirect()->to('/hr/teacher');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/hr/teacher');
        }
    }
}
