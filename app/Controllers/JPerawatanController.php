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

    public function store()
    {
        $jPerawatanModel = new JPerawatanModel();
        $save = $jPerawatanModel->save($this->request->getPost());
        if ($save) {
            return redirect()->to(site_url('jenis-perawatan'))->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->to(site_url('jenis-perawatan'))->with('validation', $jPerawatanModel->errors());
        }
    }

    public function update($id = null)
    {
        $jPerawatan = new JPerawatanModel();
        $data = $this->request->getPost();
        $jPerawatan->where('id_perawatan', $id)->set($data)->update();
        return redirect()->to(site_url('jenis-perawatan'))->with('success', 'Data berhasil diupdate....!');
    }
}
