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

}
