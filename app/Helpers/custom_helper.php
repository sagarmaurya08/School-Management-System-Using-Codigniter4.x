<?php
if(!function_exists('getAdminDetails')) {
    function getAdminDetails($id)
    {
        if (!session()->get('isLoggedIn'))
        {
            return redirect()->to('/login');
        }
        // Create a new class manually
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);
        return $user;
    }
}

