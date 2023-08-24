<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PerawatanModel;

class PerawatanController extends BaseController
{
    public function index()
    {
        $perawatanModel = new PerawatanModel();
        $data['title'] = "Perawatan Perangkat";
        $data['perawatans'] = $perawatanModel->orderBy('id_check_perangkat', 'DESC')->findAll();
        return view('perawatan_perangkat/v_index',$data);
    }
}
