<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ClubModel;

class ClubController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->clubModel = new ClubModel();
    }
    public function show()
    {
        $data['clubData'] = $this->clubModel->findAll();
        return view('backend/pages/club', $data);
    }

    public function insertClub()
    {
        $data['clubData'] = $this->clubModel->findAll();
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
            $insertData = $this->clubModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Club saved successfully!');
                return redirect()->to('/academic/club');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/academic/club');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/club', $data);
        }
    }

    public function editClub($id='')
    {
        $data['clubData'] = $this->clubModel->findAll();
        $data['editClubData'] =  $this->clubModel->find($id);
        return view('backend/pages/club', $data);
    }

    public function updateClub($id='')
    {
        $data['clubData'] = $this->clubModel->findAll();
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
            $insertData = $this->clubModel->update($id, $updateData);
            if($insertData){
                session()->setFlashdata('success', 'Club update successfully!');
                return redirect()->to('/academic/club');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/academic/club');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editClubData'] =  $this->clubModel->find($id);
            return view('backend/pages/club', $data);
        }
    }

    public function deleteClub($id='')
    {
        $deleteClub = $this->clubModel->delete($id);
        if($deleteClub){
            session()->setFlashdata('success', 'Club deleted successfully!');
            return redirect()->to('/academic/club');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/academic/club');
        }
    }
}
