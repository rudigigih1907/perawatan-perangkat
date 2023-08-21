<?php

namespace App\Models;

use CodeIgniter\Model;

class JPerawatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_jenis_perawatan';
    protected $primaryKey       = 'id_perawatan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jenis_perawatan'];

    // Validation
    protected $validationRules      = [
        'jenis_perawatan' => 'required'
    ];
    protected $validationMessages   = [
        'jenis_perawatan' => [
            'required' => 'Jenis perawatan harus diisi.'
        ]
    ];
    protected $cleanValidationRules = true;

}
