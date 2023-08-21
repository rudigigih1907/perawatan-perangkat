<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Assets extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'asset_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_asset' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'nama_asset' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lokasi_asset' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pic' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tanggal_delegasi' => [
                'type' => 'DATE',
                'null' => true
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('asset_id');
        $this->forge->createTable('tb_assets');
    }

    public function down()
    {
        //
    }
}
