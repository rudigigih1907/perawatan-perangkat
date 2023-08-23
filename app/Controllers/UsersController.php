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

    public function store()
    {
        $usersModel = new UsersModel();
        $save = $usersModel->save($this->request->getPost());
        if ($save) {
            return redirect()->to(site_url('users'))->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->to(site_url('users'))->with('validation', $usersModel->errors());
        }
    }

    public function update($id = null)
    {
        $userModel = new UsersModel();
        $data = $this->request->getPost();
        $userModel->where('id_user', $id)->set($data)->update();
        return redirect()->to(site_url('users'))->with('success', 'Data berhasil diupdate....!');
    }
}
