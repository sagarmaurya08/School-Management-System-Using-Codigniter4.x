<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DepartmentModel;
use App\Models\DesignationModel;

class DepartmentController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->departmentModel = new DepartmentModel();
        $this->designationModel = new DesignationModel();
    }
    public function show()
    {
        $data['departmentData'] = $this->departmentModel->findAll();
        $data['designationData'] = $this->designationModel->findAll();
        return view('backend/pages/department', $data);
    }

    public function insertDepartment()
    {
        $data['departmentData'] = $this->departmentModel->findAll();
        $designation = $this->request->getVar('designation');
        $rules = [
            'name' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'name'   => $this->request->getVar('name'),
                'department_code'  => substr(md5(rand(10000000, 200000000)), 0, 15),
            ];
            $insertData = $this->departmentModel->insert($updateData);
            $insertID = $this->departmentModel->getInsertID();
            if($insertID){
                $insertValue = array();
                foreach($designation as $designation){
                   if(!empty($designation)):
                    $insertValue['name'] = $designation;
                    $insertValue['department_id'] = $insertID;
                    $this->designationModel->insert($insertValue);
                   endif;
                }
                 
                session()->setFlashdata('success', 'Department saved successfully!');
                return redirect()->to('/hr/department');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/hr/department');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/department', $data);
        }
    }

    public function editDepartment($id='')
    {   $findDepartment = $this->departmentModel->editModelFunction($id);
        //$data['departmentData'] = $this->departmentModel->findAll();
        // $data['expenseData'] = $this->departmentModel->join('designation', 'designation.designation_id = '.$id)->findAll();
        //$data['editDepartmentData'] =  $this->departmentModel->find($id);
        echo "<pre>"; print_r($findDepartment); die;
        return view('backend/pages/department', $data);
    }

    public function updateDepartment($id='')
    {
        $data['departmentData'] = $this->departmentModel->findAll();
        $rules = [
            'club_name' => 'required',
            'description' => 'required|min_length[3]',
            'date' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'club_name'   => $this->request->getVar('club_name'),
                'description'  => $this->request->getVar('description'),
                'date'  => $this->request->getVar('date'),
            ];
            $insertData = $this->departmentModel->update($id, $updateData);
            if($insertData){
                session()->setFlashdata('success', 'Department update successfully!');
                return redirect()->to('/hr/department');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/hr/department');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editDepartmentData'] =  $this->departmentModel->find($id);
            return view('backend/pages/department', $data);
        }
    }

    public function deleteDepartment($id='')
    {
        $deleteDepartment = $this->departmentModel->delete($id);
        if($deleteDepartment){
            session()->setFlashdata('success', 'Department deleted successfully!');
            return redirect()->to('/hr/department');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/hr/department');
        }
    }

    public function get_designation($department_id=null)
    {
        $designation = $this->designationModel->where('department_id', $department_id)->find();
        foreach($designation as $row){
            echo '<option value="'.$row['designation_id'].'">'.$row['name'].'</option>';
        }
    }
}
