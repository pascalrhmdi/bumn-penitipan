<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('Myth\Auth\Database\Seeds\UserSeeder');
        $this->call('ItemSeeder');
        $this->call('UmkmSeeder');
    }
}
