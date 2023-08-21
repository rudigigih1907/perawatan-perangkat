<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_perawatan';
    protected $primaryKey       = 'id_check_perangkat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['waktu_pengecekan', 'id_asset', 'perawatan', 'kondisi', 'pelaksana', 'mengetahui'];

    // Validation
    protected $validationRules      = [
        'waktu_pengecekan' => 'required',
        'id_asset' => 'required',
        'perawatan' => 'required',
        'kondisi' => 'required',
        'pelaksana' => 'required',
        'mengetahui' => 'required'
    ];
    protected $validationMessages   = [
        'waktu_pengecekan' => [
            'required' => 'Harus diisi.',
        ],
        'id_asset' => [
            'required' => "Harus diisi"
        ],
        'perawatan' => [
            'required' => 'Harus diisi.'
        ],
        'kondisi' => [
            'required' => 'Harus diisi.'
        ],
        'pelaksana' => [
            'required' => 'Harus diisi.'
        ],
        'mengetahui' => [
            'required' => 'Harus diisi.'
        ],
    ];
    protected $cleanValidationRules = true;
}
