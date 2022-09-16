<?php

namespace Myth\Auth\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
          'email'    => 'admin@rbdenpasar.com',
          'username' => 'Super Admin',
          'password_hash' => Password::hash('12345678'),
          'active' => 1,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ];


        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
