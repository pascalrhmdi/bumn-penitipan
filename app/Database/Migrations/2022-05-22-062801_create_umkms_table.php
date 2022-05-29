<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUmkm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'umkm_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_umkm'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'telepon_umkm' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
            ],
        ]);
        
        $this->forge->addPrimaryKey('umkm_id');
        $this->forge->createTable('umkms');
    }
    
    public function down()
    {
        $this->forge->dropTable('umkms');
    }
}
