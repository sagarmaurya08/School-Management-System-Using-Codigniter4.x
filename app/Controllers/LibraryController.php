<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LibraryModel;

class LibraryController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'custom_helper']);
        $this->libraryModel = new LibraryModel();
    }
    
    public function show()
    {
        $data['librarianData'] = $this->libraryModel->findAll();

        return view('backend/pages/librarian', $data);
    }

    public function showLibrarianForm()
    {
      return view('backend/pages/add_librarian');  
    }

    public function insertLibrarian()
    {
        
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[librarian.email]',
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
            $file->move('../public/backend/uploads/librarian', $newName);
            $updateData = [
                'name'     => $this->request->getVar('name'),
                'librarian_number'=> $this->request->getVar('librarian_number'),
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
            $insertData = $this->libraryModel->insert($updateData);
            if($insertData){
                session()->setFlashdata('success', 'Librarian saved successfully!');
                return redirect()->to('/employee/librarian');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/employee/librarian');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('backend/pages/add_librarian', $data);
        }
    }

    public function editLibrarian($id='')
    {
        $data['editLibrarianData'] = $this->libraryModel->find($id);
        return view('backend/pages/add_librarian', $data);
    }

    public function updateLibrarian($id='')
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[librarian.email,librarian_id,'.$id.']',
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
            $file->move('../public/backend/uploads/librarian', $newName);
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
            $dbImg = $this->libraryModel->find($id);
            if(file_exists('../public/backend/uploads/librarian/'.$dbImg['file_name'])){
                unlink('../public/backend/uploads/librarian/'.$dbImg['file_name']);
            }
            $updateData = $this->libraryModel->update($id, $editData);
            if($updateData){
                session()->setFlashdata('success', 'Librarian updated successfully!');
                return redirect()->to('/employee/librarian');
            }
            else{
                session()->setFlashdata('error', 'Something went wrongs!');
                return redirect()->to('/employee/librarian');
            }
        }
        else{
            $data['validation'] = $this->validator;
            $data['editLibrarianData'] = $this->libraryModel->find($id);
            return view('backend/pages/add_librarian', $data);
        }
    }

    public function deleteLibrarian($id='')
    {
        $dbImg = $this->libraryModel->find($id);
        if(file_exists('../public/backend/uploads/librarian/'.$dbImg['file_name'])){
            unlink('../public/backend/uploads/librarian/'.$dbImg['file_name']);
        }
        $deleteParent = $this->libraryModel->delete($id);
        if($deleteParent){
            session()->setFlashdata('success', 'Librarian deleted successfully!');
            return redirect()->to('/employee/librarian');
        }
        else{
            session()->setFlashdata('error', 'Something went wrongs!');
            return redirect()->to('/employee/librarian');
        }
    }
}
