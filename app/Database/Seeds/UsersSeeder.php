<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_user' => 'Muhammad',
                'jabatan' => 'Kabag Technical Support & Networking'
            ],
            [
                'nama_user' => 'Dzil',
                'jabatan' => 'Kabag Software Development'
            ],
            [
                'nama_user' => 'Rudi',
                'jabatan' => 'IT Staff'
            ],
            [
                'nama_user' => 'Galih',
                'jabatan' => 'IT Staff'
            ],
            [
                'nama_user' => 'Vitro',
                'jabatan' => 'IT Staff'
            ],
            [
                'nama_user' => 'Jamius',
                'jabatan' => 'IT Staff'
            ],
            [
                'nama_user' => 'Irwan',
                'jabatan' => 'IT Staff'
            ]
        ];
        $this->db->table('tb_users')->insertBatch($data);
    }
}
