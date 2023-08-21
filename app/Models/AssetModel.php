<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_assets';
    protected $primaryKey       = 'asset_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_asset', 'nama_asset', 'lokasi_asset', 'pic', 'tanggal_delegasi', 'keterangan'];

    // Validation
    protected $validationRules      = [
        'kode_asset' => 'required|is_unique[tb_assets.kode_asset]',
        'nama_asset' => 'required|min_length[3]',
        'lokasi_asset' => 'required|min_length[3]',
        'pic' => 'required|min_length[3]',
        'tanggal_delegasi' => 'required',
    ];
    protected $validationMessages   = [
        'kode_asset' => [
            'required' => 'Kode asset harus diisi.',
            'is_unique' => 'Kode asset sudah dipakai.',
        ],
        'nama_asset' => [
            'required' => 'Nama asset harus diisi.',
            'min_length' => 'Minimal 3 karakter.',
        ],
        'lokasi_asset' => [
            'required' => 'Lokasi asset harus diisi.',
            'min_length' => 'Minimal 3 karakter,'
        ],
        'pic' => [
            'required' => 'PIC harus diisi.',
            'min_length' => 'Minimal 3 karakter,'
        ],
        'tanggal_delegasi' => [
            'required' => 'Tanggal harus diisi.',
        ],

    ];
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;

    function tampilData($katakunci = null, $start = 0, $length = 0)
    {
        $builder = $this->table('tb_assets');
        if ($katakunci) {
            $arr = explode(" ", $katakunci);
            for ($i=0; $i < count($arr); $i++) { 
                $builder->orlike('kode_asset', $arr[$i]);
                $builder->orlike('nama_asset', $arr[$i]);
                $builder->orlike('lokasi_asset', $arr[$i]);
                $builder->orlike('pic', $arr[$i]);
                $builder->orlike('tanggal_delegasi', $arr[$i]);
            }
        }

        if ($start != 0 or $length != 0) {
            $builder = $builder->limit($length, $start);
        }
        $builder->get()->getResult();
    }
}
