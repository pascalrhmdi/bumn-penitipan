<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUmkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_umkm'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
            ],
            'alamat' => [
                'type' => 'text',
            ],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('umkms');
    }
    
    public function down()
    {
        $this->forge->dropTable('umkms');
    }
}
