<?php

namespace App\Models;

use App\Entities\Umkm;
use CodeIgniter\Model;

class UmkmModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'umkms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Umkm::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_umkm', 'nomor_telepon', 'alamat'];

    // Dates
    protected $useTimestamps = TRUE;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_umkm'     => [
            'label' => "Nama UMKM",
            'rules' => 'required|min_length[3]',
        ],
        'nomor_telepon' => [
            'label' => "Nomor Telepon UMKM",
            'rules' =>  'required|alpha_numeric_punct|min_length[9]',
        ],
        'alamat'        => [
            'label' => "Alamat",
            'rules' => 'required|string',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

}
