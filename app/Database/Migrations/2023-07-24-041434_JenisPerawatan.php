<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisPerawatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perawatan' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'jenis_perawatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id_perawatan');
        $this->forge->createTable('tb_jenis_perawatan');
    }

    public function down()
    {
        //
    }
}
