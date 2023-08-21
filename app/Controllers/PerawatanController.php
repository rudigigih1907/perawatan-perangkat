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
        $data['perawatans'] = $perawatanModel->orderBy('id_perawatan', 'DESC')->findAll();
        return view('jenis_perawatan/v_index',$data);
    }
}
