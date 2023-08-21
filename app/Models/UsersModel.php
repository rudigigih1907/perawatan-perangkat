<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_user','jabatan'];

    // Validation
    protected $validationRules      = [
        'nama_user' => 'required|min_length[3]',
        'jabatan' => 'required|min_length[3]',
    ];
    protected $validationMessages   = [
        'nama_user' => [
            'required' => 'Nama user harus diisi.',
            'min_length' => 'Minimal 3 karakter.'
        ],
        'jabatan' => [
            'required' => 'Jabatan harus diisi.',
            'min_length' => 'Minimal 3 karakter.'
        ]
    ];
    protected $cleanValidationRules = true;
}
