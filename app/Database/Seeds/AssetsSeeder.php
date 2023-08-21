<?php

namespace App\Database\Seeds;

use App\Models\AssetModel;
use CodeIgniter\Database\Seeder;

class AssetsSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/assets.json");
        $assets = json_decode($json);

        foreach ($assets as $asset) {
            $object = new AssetModel;
            $object->insert([
                "kode_asset" => $asset->kode_asset,
                "nama_asset" => $asset->nama_asset,
                "lokasi_asset" => $asset->lokasi_asset,
                "pic" => $asset->pic,
                "tanggal_delegasi" => $asset->tanggal_delegasi,
            ]);
        }
    }
}
