<?php

namespace Myth\Auth\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthorizationSeeder extends Seeder
{
  public function run()
  {
    $group_data = [
      [
        'name'    => 'superadmin',
        'description' => 'Pemimpin/Ketua/Penanggungjawab Sistem',
      ],
      [
        'name'    => 'admin',
        'description' => 'Pengelola Sistem',
      ],
    ];

    // Using Query Builder
    foreach ($group_data as $data) {
      $this->db->table('auth_groups')->insert($data);
    }

    $permissions_data = [
      'name'    => 'Registering Permission',
      'description' => 'Hanya boleh Pemimpin/Ketua/Penanggungjawab Sistem',
    ];

    // Using Query Builder
    $this->db->table('auth_permissions')->insert($permissions_data);

    $permission_group_data = [
        'group_id'    => 1,
        'permission_id' => 1,
    ];

    // Using Query Builder
    $this->db->table('auth_groups_permissions')->insert($permission_group_data);

    $user_permission_group_data = [
        'group_id'    => 1,
        'user_id' => 1,
    ];

    // Using Query Builder
    $this->db->table('auth_groups_users')->insert($user_permission_group_data);
  }
}
