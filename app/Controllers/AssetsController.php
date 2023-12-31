<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetModel;

class AssetsController extends BaseController
{
    public function index()
    {
        $assetsModel = new AssetModel();
        $data['title'] = "Data Assets";
        $data['assets'] = $assetsModel->orderBy('asset_id', 'DESC')->findAll();
        return view('assets/v_index', $data);
    }

    public function store()
    {
        $assetsModel = new AssetModel();
        $save = $assetsModel->save($this->request->getPost());
        if ($save) {
            return redirect()->to(site_url('assets'))->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->to(site_url('assets'))->with('validation', $assetsModel->errors());
        }
    }

    public function update($id = null)
    {
        $assetsModel = new AssetModel();
        $data = $this->request->getPost();
        // print_r($data);
        $assetsModel->where('asset_id', $id)->set($data)->update();
        return redirect()->to(site_url('assets'))->with('success', 'Data berhasil diupdate....!');
    }
}
