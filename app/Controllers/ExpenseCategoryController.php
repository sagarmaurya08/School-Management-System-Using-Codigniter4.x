<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ExpenseCategoryModel;

class ExpenseCategoryController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->expenseCategoryModel = new ExpenseCategoryModel();
    }
    public function show()
    {
        $data['expCategoryData'] = $this->expenseCategoryModel->findAll();
        return view('backend/pages/expense_category', $data);
    }

    public function insertExpCategory()
    {
        $data['expCategoryData'] = $this->expenseCategoryModel->findAll();
        $rules = [
            'name' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'name'   => $this->request->getVar('name'),
            ];
            $insertData = $this->expenseCategoryModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Expense category saved successfully!');
                return redirect()->to('/expenses/category');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/expenses/category');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/expense_category', $data);
        }
    }

    public function editExpCategory($id='')
    {
        $data['expCategoryData'] = $this->expenseCategoryModel->findAll();
        $data['editExpCategoryData'] =  $this->expenseCategoryModel->find($id);
        return view('backend/pages/expense_category', $data);
    }

    public function updateExpCategory($id='')
    {
        $data['expCategoryData'] = $this->expenseCategoryModel->findAll();
        $rules = [
            'name' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'name'   => $this->request->getVar('name'),
            ];
            $insertData = $this->expenseCategoryModel->update($id, $updateData);
            if($insertData){
                session()->setFlashdata('success', 'Expense category update successfully!');
                return redirect()->to('/expenses/category');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/expenses/category');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editExpCategoryData'] =  $this->expenseCategoryModel->find($id);
            return view('backend/pages/expense_category', $data);
        }
    }

    public function deleteExpCategory($id='')
    {
        $deleteClub = $this->expenseCategoryModel->delete($id);
        if($deleteClub){
            session()->setFlashdata('success', 'Expense category deleted successfully!');
            return redirect()->to('/expenses/category');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/expenses/category');
        }
    }
}
