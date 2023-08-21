<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CheckPerangkat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_check_perangkat' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'waktu_pengecekan' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'id_asset' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ],
            'perawatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kondisi' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'pelaksana' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'mengetahui' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],   
        ]);
        $this->forge->addPrimaryKey('id_check_perangkat');
        $this->forge->addForeignKey('id_asset', 'tb_assets', 'asset_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pelaksana', 'tb_users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('mengetahui', 'tb_users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_perawatan');
    }

    public function down()
    {
        //
    }
}
