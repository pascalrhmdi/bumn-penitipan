<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user'       => [
                'type'       => 'INT',
                'unsigned'       => true,
            ],
            'id_umkm' => [
                'type' => 'INT',
                'unsigned'       => true,
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_pemberi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'telepon_pemberi' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'harga_rb' => [
                'type' => 'INT',
            ],
            'harga_jual' => [
                'type' => 'INT',
            ],
            'tanggal_masuk' => [
                'type' => 'DATE',
            ],
        ]);
        
        $this->forge->addPrimaryKey('item_id');
        $this->forge->createTable('items');
    }
    
    public function down()
    {
        $this->forge->dropTable('items');
    }
}
