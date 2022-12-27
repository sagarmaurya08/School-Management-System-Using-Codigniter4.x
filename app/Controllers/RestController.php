<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\AlumniModel;

class RestController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->alumniModel = new AlumniModel();
    }

    public function index()
    {
        $alumni = $this->alumniModel->find();
        if($alumni) {
            return $this->respond($alumni, 200);
        }
        $description = 'Sorry! no alumni found';
        return $this->failNotFound($description, 400);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->alumniModel->find($id);
        if ($data) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Data find successfully',
                'data' => [$data]
            ];
        }
        else{
            $response = [
                'status' => 400,
                'error' => true,
                'message' => 'Data not find!',
                'data' => []
            ];
        }
        return $this->respondCreated($response);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[alumni.email]',
            'phone' => 'required|min_length[8]|max_length[13]',
            'address' => 'required',
            'sex' => 'required',
            'profession' => 'required',
            'g_year' => 'required',
            'marital_status' => 'required',
            'club' => 'required',
            'interest' => 'required',
        ];
        if($this->validate($rules)){
            $updateData = [
                'name'     => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone'   => $this->request->getVar('phone'),
                'sex'   => $this->request->getVar('sex'),
                'address'  => $this->request->getVar('address'),
                'profession'=> $this->request->getVar('profession'),
                'g_year'=> $this->request->getVar('g_year'),
                'club'=> $this->request->getVar('club'),
                'marital_status'=> $this->request->getVar('marital_status'),
                'interest'=> $this->request->getVar('interest'),
            ];
            $insertData = $this->alumniModel->insert($updateData);
            if($insertData){
                $response = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Data inserted successfully',
                    'data' => [$insertData]
                ];
            }
            else{
                $description = 'Sorry! alumni not inserted!';
                $response = [
                    'status' => 400,
                    'error' => true,
                    'message' => $description,
                    'data' => []
                ];
            }
        }
        else{
            $validation = $this->validator;
            $response = [
				'status' => 500,
				'error' => true,
				'message' => $this->validator->getErrors(),
				'data' => []
			];
        }
        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
