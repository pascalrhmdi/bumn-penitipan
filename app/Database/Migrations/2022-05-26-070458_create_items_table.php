<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
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
            'gambar_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'harga_rb' => [
                'type'          => 'INT',
                'unsigned'      => true,
            ],
            'quantity' => [
                'type'          => 'INT',
                'unsigned'      => true,
            ],
            'harga_jual' => [
                'type'          => 'INT',
                'unsigned'      => true,
            ],
            'nama_pemberi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'telepon_pemberi' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'expired_at'       => ['type' => 'datetime'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_umkm', 'umkms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
