<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TeacherModel;
use App\Models\DepartmentModel;
use App\Models\DesignationModel;
use App\Models\BankModel;

class TeacherController extends BaseController
{
    public function __construct()
    {
        $this->teacherModel = new TeacherModel();
        $this->departmentModel = new DepartmentModel();
        $this->designationModel = new DesignationModel();
        $this->bankModel = new BankModel();
        helper('form');
    }

    public function show()
    {
        $data['teacherData'] = $this->teacherModel->findAll();
        $data['departmentData'] = $this->departmentModel->findAll();
        //$data['designationData'] = $this->designationModel->findAll();

        return view('backend/pages/teacher', $data);
    }

    public function showTeacherForm()
    {
        $data['departmentData'] = $this->departmentModel->findAll();
        //$data['designationData'] = $this->designationModel->findAll();
        return view('backend/pages/add_teacher', $data);  
    }

    public function insertTeacher()
    {   
        //echo "<pre>"; print_r($this->request->getVar()); die;
        $rules = [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|valid_email|is_unique[teacher.email]',
            'phone' => 'required|min_length[8]|max_length[13]',
            'birthday' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'qualification' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
            'date_of_join' => 'required',
            'joining_salary' => 'required',
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'password' => 'required|min_length[6]|max_length[10]',
            //'file_name' => 'uploaded[file_name]|max_size[file_name,1024]|ext_in[file_name,png,jpg,jpeg,docx,pdf],'
        ];
        $file = $this->request->getFile('file_name');
        $fileName = $file->getName();
        if(isset($fileName) && !empty($fileName)){    
            $rules = [
                'file_name' => 'uploaded[file_name]|is_image[file_name]|mime_in[file_name,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_name,100]|max_dims[file_name,1024,768],'
            ];
            $newName = $file->getRandomName();
            $file->move('../public/backend/uploads/teacher', $newName);
        }else{
            $newName = '';
        }
        if($this->validate($rules)){  
  
            $bank['account_holder_name']= $this->request->getVar('account_holder_name');
            $bank['account_number']= $this->request->getVar('account_number');
            $bank['bank_name']= $this->request->getVar('bank_name');
            $bank['branch']= $this->request->getVar('branch');
            $insertBankData = $this->bankModel->insert($bank);
            $bankID = $this->bankModel->getInsertID();
            if($bankID){
                $updateData = [
                    'name'     => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'role' => $this->request->getVar('role'),
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
                    'department_id'=> $this->request->getVar('department_id'),
                    'designation_id'=> $this->request->getVar('designation_id'),
                    'date_of_join'=> $this->request->getVar('date_of_join'),
                    'joining_salary'=> $this->request->getVar('joining_salary'),
                    'teacher_number'=> $this->request->getVar('teacher_number'),
                    'file_name'=> $newName,
                    'bank_id'=> $bankID,
                    'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                ];
                $insertData = $this->teacherModel->insert($updateData);
                if($insertData){
                    session()->setFlashdata('success', 'Teacher saved successfully!');
                    return redirect()->to('/hr/teacher');
                }
                else{
                    if(!empty($newName) && file_exists('../public/backend/uploads/teacher/'.$newName)){
                        unlink('../public/backend/uploads/teacher/'.$newName);
                    }
                    session()->setFlashdata('error', 'Something went wrongs!');
                    return redirect()->to('/hr/teacher');
                }
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/hr/teacher');
            }
        }
        else{
            if(!empty($newName) && file_exists('../public/backend/uploads/teacher/'.$newName)){
                unlink('../public/backend/uploads/teacher/'.$newName);
            }
            $data['validation'] = $this->validator;
            return view('backend/pages/add_teacher', $data);
        }
    }

    public function editTeacher($id='')
    {
        $data['editTeacherData'] = $this->teacherModel->find($id);
        $data['departmentData'] = $this->departmentModel->findAll();
        $data['designationData'] = $this->designationModel->find($data['editTeacherData']['designation_id']);
        $data['bankData'] = $this->bankModel->find($data['editTeacherData']['bank_id']);
        //echo "<pre>"; print_r($data['departmentData']); die;
        return view('backend/pages/add_teacher', $data);
    }

    public function updateTeacher($id='')
    {
        $rules = [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|valid_email|is_unique[teacher.email,teacher_id,'.$id.']',
            'phone' => 'required|min_length[8]|max_length[13]',
            'birthday' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'qualification' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
            'date_of_join' => 'required',
            'joining_salary' => 'required',
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'file_name' => 'uploaded[file_name]|max_size[file_name,1024]|ext_in[file_name,png,jpg,jpeg,docx,pdf],'
        ];
        $file = $this->request->getFile('file_name');
        // $fileName = $file->getName();
        // if(!empty($fileName)){
        //     // $rules= [
        //     //     'file_name' => 'uploaded[file_name]|max_size[file_name,1024]|ext_in[file_name,png,jpg,jpeg,docx,pdf]'
        //     // ];
        //     $newName = $file->getRandomName();
        //     $file->move('../public/backend/uploads/teacher', $newName);
        // }else{
        //     $newName = '';
        // }
        if($this->validate($rules)){
            $dbImg = $this->teacherModel->find($id);
            if(!empty($dbImg['file_name']) && file_exists('../public/backend/uploads/teacher/'.$dbImg['file_name'])){
                unlink('../public/backend/uploads/teacher/'.$dbImg['file_name']);
            }
            $bank['account_holder_name']= $this->request->getVar('account_holder_name');
            $bank['account_number']= $this->request->getVar('account_number');
            $bank['bank_name']= $this->request->getVar('bank_name');
            $bank['branch']= $this->request->getVar('branch');
            $bankID = $this->bankModel->update($dbImg['bank_id'], $bank);
            if($bankID){
                $updateData = [
                    'name'     => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'role' => $this->request->getVar('role'),
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
                    'department_id'=> $this->request->getVar('department_id'),
                    'designation_id'=> $this->request->getVar('designation_id'),
                    'date_of_join'=> $this->request->getVar('date_of_join'),
                    'joining_salary'=> $this->request->getVar('joining_salary'),
                    'teacher_number'=> $this->request->getVar('teacher_number'),
                    'file_name'=> $newName,
                    'bank_id'=> $bankID,
                ];
                $updateValue = $this->teacherModel->update($id, $updateData);
                if($updateValue){
                    session()->setFlashdata('success', 'Teacher updated successfully!');
                    return redirect()->to('/hr/teacher');
                }
                else{
                    if(!empty($newName) && file_exists('../public/backend/uploads/teacher/'.$newName)){
                        unlink('../public/backend/uploads/teacher/'.$newName);
                    }
                    session()->setFlashdata('error', 'Something went wrongs!');
                    return redirect()->to('/hr/teacher');
                }
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
        if(!empty($dbImg['file_name']) && file_exists('../public/backend/uploads/teacher/'.$dbImg['file_name'])){
            unlink('../public/backend/uploads/teacher/'.$dbImg['file_name']);
        }
        $deleteTeacher = $this->teacherModel->delete($id);
        if($deleteTeacher){
            $this->bankModel->delete($dbImg['bank_id']);
            session()->setFlashdata('success', 'Teacher deleted successfully!');
            return redirect()->to('/hr/teacher');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/hr/teacher');
        }
    }
}
