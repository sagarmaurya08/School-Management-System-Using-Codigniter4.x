<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ExpenseModel;

use App\Models\ExpenseCategoryModel;

class ExpenseController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->expenseModel = new ExpenseModel();
        $this->expenseCategoryModel = new ExpenseCategoryModel();
    }
    
    public function show()
    {
        $data['expenseData'] = $this->expenseModel->join('expense_category', 'expense_category.expense_category_id = payment.expense_category_id')->findAll();
        return view('backend/pages/expense', $data);
    }

    public function showExpenseForm()
    {
        $data['expCategoryData'] = $this->expenseCategoryModel->findAll();
        //echo "<pre>"; print_r($data['expCategoryData']); die;
        return view('backend/pages/add_expense',$data);  
    }

    public function insertExpense()
    {
        
        $rules = [
            'title' => 'required',
            'expense_category_id' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'method' => 'required',
            'year' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'title'     => $this->request->getVar('title'),
                'expense_category_id'=> $this->request->getVar('expense_category_id'),
                'description' => $this->request->getVar('description'),
                'amount'   => $this->request->getVar('amount'),
                'payment_type' => 'expense',
                'method'   => $this->request->getVar('method'),
                //'timestamp'   => $this->request->getVar('timestamp'),
                'year'   => $this->request->getVar('year'),
            ];
            $insertData = $this->expenseModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Expense saved successfully!');
                return redirect()->to('/expenses/expense');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/expenses/expense');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_expense', $data);
        }
    }

    public function editExpense($id='')
    {
        $data['expCategoryData'] = $this->expenseCategoryModel->findAll();
        $data['editExpenseData'] = $this->expenseModel->find($id);
        return view('backend/pages/add_expense', $data);
    }

    public function updateExpense($id='')
    {
        $rules = [
            'title' => 'required',
            'expense_category_id' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'method' => 'required',
            'year' => 'required',
        ];
        if($this->validate($rules)){
            $editData = [
                'title'     => $this->request->getVar('title'),
                'expense_category_id'=> $this->request->getVar('expense_category_id'),
                'description' => $this->request->getVar('description'),
                'payment_type' => 'expense',
                'amount'   => $this->request->getVar('amount'),
                'method'   => $this->request->getVar('method'),
                //'timestamp'   => $this->request->getVar('timestamp'),
                'year'   => $this->request->getVar('year'),
            ];
            $updateData = $this->expenseModel->update($id, $editData);
            if($updateData){
                session()->setFlashdata('success', 'Expense updated successfully!');
                return redirect()->to('/expenses/expense');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/expenses/expense');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editExpenseData'] = $this->expenseModel->find($id);
            return view('backend/pages/add_expense', $data);
        }
    }

    public function deleteExpense($id='')
    {
        $deleteExpense = $this->expenseModel->delete($id);
        if($deleteExpense){
            session()->setFlashdata('success', 'Expense deleted successfully!');
            return redirect()->to('/expenses/expense');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/expenses/expense');
        }
    }
}
