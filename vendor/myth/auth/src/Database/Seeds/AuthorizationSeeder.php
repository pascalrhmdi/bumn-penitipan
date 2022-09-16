<?php

namespace Myth\Auth\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthorizationSeeder extends Seeder
{
  public function run()
  {
    // Auth_group Table
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

    foreach ($group_data as $data) {
      $this->db->table('auth_groups')->insert($data);
    }


    // Auth_Permission Table
    $permissions_data = [
      'name'    => 'Registering Permission',
      'description' => 'Hanya boleh Pemimpin/Ketua/Penanggungjawab Sistem',
    ];

    $this->db->table('auth_permissions')->insert($permissions_data);


    // Auth_group_permissions Table
    $permission_group_data = [
        'group_id'    => 1,
        'permission_id' => 1,
    ];

    $this->db->table('auth_groups_permissions')->insert($permission_group_data);


    // Auth_Group_users Table
    $user_permission_group_data = [
        'group_id'    => 1,
        'user_id' => 1,
    ];

    $this->db->table('auth_groups_users')->insert($user_permission_group_data);
  }
}
