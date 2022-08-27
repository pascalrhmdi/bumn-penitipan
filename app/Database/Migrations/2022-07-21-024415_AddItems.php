<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddItems extends Migration
{
    public function up()
    {
        $fields = [
            'gambar_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
        ];

        $this->forge->addColumn('items', $fields);
    }

    public function down()
    {
        //
    }
}
