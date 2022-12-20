<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SystemModel;

class SystemController extends BaseController
{
    public function index()
    {
        $system_model = new SystemModel();
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $pdata = $this->request->getvar();
            foreach($pdata as $key => $val) {
                $system_model->where('type', $key)->set('description', $val)->update();
            }
            session()->setFlashdata('success', 'System settings updated successfully!');
        } 
        $data['system_data'] = $system_model->findAll();
        $data['page_name'] = 'System Settings';
        return view('backend/pages/system_setting', $data);
    }
}
