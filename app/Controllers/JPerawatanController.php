<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JPerawatanModel;

class JPerawatanController extends BaseController
{
    public function index()
    {
        $jPerawatanModel = new JPerawatanModel();
        $data['title'] = "Jenis Perawatan";
        $data['jPerawatans'] = $jPerawatanModel->orderBy('id_perawatan', 'DESC')->findAll();
        return view('jenis_perawatan/v_index', $data);
    }
}
