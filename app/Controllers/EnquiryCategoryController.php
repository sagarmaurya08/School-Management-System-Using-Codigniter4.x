<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\EnquiryCategoryModel;

class EnquiryCategoryController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->enquiryModel = new EnquiryCategoryModel(); 
    }
    public function show()
    {     
        $data['enquiryData'] = $this->enquiryModel->findAll();
        return view('backend/pages/enquiry_category', $data);
    }

    public function showCategoryForm()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $rules = [
                'category' => 'required',
                'purpose' => 'required|min_length[3]',
                'whom' => 'required',
            ];
            if($this->validate($rules)){
                $updateData = [
                    'category'   => $this->request->getVar('category'),
                    'purpose'  => $this->request->getVar('purpose'),
                    'whom'  => $this->request->getVar('whom'),
                ];
                $updatedData = $this->enquiryModel->insert($updateData);
                if($updatedData){
                    session()->setFlashdata('success', 'Category saved successfully!');
                    return redirect()->to('/academic/inqCategory');
                }
                else{
                    session()->setFlashdata('error', 'Something went wrongs!');
                    return redirect()->to('/academic/inqCategory');
                }
            }
            else{
                $data['validation'] = $this->validator;
                return view('backend/pages/add_category', $data);
            }
        }
        return view('backend/pages/add_category');
    }

    public function singleCategory($id='')
    {
        $data['editCategoryData'] =  $this->enquiryModel->find($id);
        return view('backend/pages/add_category',$data);
    }

    public function updateCategory()
    {
        $enquiry_category_id = $this->request->getVar('enquiry_category_id');
        $rules = [
            'category' => 'required',
            'purpose' => 'required|min_length[3]',
            'whom' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'category'   => $this->request->getVar('category'),
                'purpose'  => $this->request->getVar('purpose'),
                'whom'  => $this->request->getVar('whom'),
            ];
            $updatedData = $this->enquiryModel->update($enquiry_category_id, $updateData);
            if($updatedData){
                session()->setFlashdata('success', 'Category updated successfully!');
                return redirect()->to('/academic/inqCategory');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/academic/inqCategory');
            }
        }
        else{
            $data['editCategoryData'] =  $this->enquiryModel->find($enquiry_category_id);
            $data['validation'] = $this->validator;
            return view('backend/pages/add_category', $data);
        }
    }

    public function deleteCategory($id='')
    {
        $deleteCategory = $this->enquiryModel->delete($id);
        if($deleteCategory){
            session()->setFlashdata('success', 'Category deleted successfully!');
            return redirect()->to('/academic/inqCategory');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/academic/inqCategory');
        }
        
    }
}
