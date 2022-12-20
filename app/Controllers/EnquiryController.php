<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\EnquiryModel;

class EnquiryController extends BaseController
{
    public function index()
    {    
        $enquiryModel = new EnquiryModel(); 
        $data['enquiryData'] = $enquiryModel->findAll();
        //echo "<pre>"; print_r($data['enquiryData']); die;
        return view('backend/pages/enquiry_list', $data);
    }

    public function deleteEnquiry($id='')
    {
        $enquiryModel = new EnquiryModel();
        $deleteCategory = $enquiryModel->delete($id);
        if($deleteCategory){
            session()->setFlashdata('success', 'Enquiry deleted successfully!');
            return redirect()->to('/academic/enquiry');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/academic/enquiry');
        }
        
    }
}
