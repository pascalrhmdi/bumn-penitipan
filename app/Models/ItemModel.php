<?php

namespace App\Models;

use App\Entities\Item;
use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Item::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'id_umkm', 'nama_barang', 'harga_rb', 'harga_jual', 'nama_pemberi', 'telepon_pemberi', 'expired_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_user'       => 'required|numeric',
        'id_umkm'       => 'required|numeric',
        'nama_barang'       => 'required',
        'harga_rb'          => 'required|min_length[3]|numeric',
        'harga_jual'        => 'required|min_length[3]|numeric',
        'nama_pemberi'      => 'required|alpha_space',
        'telepon_pemberi'   => 'required|min_length[9]|max_length[20]|numeric',
        'expired_at'      => 'required|valid_date',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = FALSE;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllWithUmkms(string $id = null)
    {
        $items = $this
            ->select('*, items.id as item_id, items.created_at as item_created_at, umkms.id as umkm_id')
            ->join('umkms ', 'items.id_umkm = umkms.id')
            ->find($id);

        return $items;
    }

    public function countBy(string $column)
    {
        return $this->count($column)->findAll();
    }
}
