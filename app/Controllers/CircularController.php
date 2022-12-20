<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CircularModel;

class CircularController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->circularModel = new CircularModel();
    }

    public function show()
    {
        $data['circularData'] = $this->circularModel->findAll();
        return view('backend/pages/circular', $data);
    }

    public function showCircularForm()
    {
      return view('backend/pages/add_circular');  
    }

    public function insertCircular()
    {
        $rules = [
            'title' => 'required',
            'reference' => 'required|min_length[3]',
            'content' => 'required',
            'date' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'title'     => $this->request->getVar('title'),
                'reference' => $this->request->getVar('reference'),
                'content'   => $this->request->getVar('content'),
                'date'      => $this->request->getVar('date'),
            ];
            $insertData = $this->circularModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Circular saved successfully!');
                return redirect()->to('/academic/circular');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/academic/circular');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_circular', $data);
        }
    }

    public function editCircular($id='')
    {
        $data['editCircularData'] = $this->circularModel->find($id);
        return view('backend/pages/add_circular', $data);
    }

    public function updateCircular($id='')
    {
        $rules = [
            'title' => 'required',
            'reference' => 'required|min_length[3]',
            'content' => 'required',
            'date' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'title'     => $this->request->getVar('title'),
                'reference' => $this->request->getVar('reference'),
                'content'   => $this->request->getVar('content'),
                'date'      => $this->request->getVar('date'),
            ];
            $updateData = $this->circularModel->update($id, $updateData);
            if($updateData){
                session()->setFlashdata('success', 'Circular updated successfully!');
                return redirect()->to('/academic/circular');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/academic/circular');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editCircularData'] = $this->circularModel->find($id);
            return view('backend/pages/add_circular', $data);
        }
    }

    public function deleteCircular($id='')
    {
        $deleteClub = $this->circularModel->delete($id);
        if($deleteClub){
            session()->setFlashdata('success', 'Circular deleted successfully!');
            return redirect()->to('/academic/circular');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/academic/circular');
        }
    }
}
