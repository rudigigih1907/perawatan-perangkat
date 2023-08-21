<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        $userModel = new UsersModel();
        $data['title'] = "Data Users";
        $data['users'] = $userModel->orderBy('id_user', 'ASC')->findAll();
        return view('users/v_index', $data);
    }
}
