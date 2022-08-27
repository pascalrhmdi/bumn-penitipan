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
    protected $allowedFields    = ['id_user', 'id_umkm', 'nama_barang', 'gambar_barang', 'harga_rb', 'harga_jual', 'quantity', 'nama_pemberi', 'telepon_pemberi', 'expired_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_user'       => 'required|numeric',
        'id_umkm'       => [
            'label' => "Nama UMKM",
            'rules' => 'required|numeric',
        ],
        'nama_barang'       => [
            'label' => "Nama Barang",
            'rules' => 'required',
        ],
        'quantity'       => [
            'label' => "Jumlah Barang",
            'rules' => 'required|numeric',
        ],
        'gambar_barang'       => [
            'label' => "Gambar Barang",
            'rules' =>
                'is_image[gambar_barang]'
                . '|mime_in[gambar_barang,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
        ],
        'harga_rb'          => [
            'label' => "Harga RB",
            'rules' => 'required|min_length[3]|alpha_numeric_punct',
        ],
        'harga_jual'        => [
            'label' => "Harga Jual di RB",
            'rules' => 'required|min_length[3]|alpha_numeric_punct',
        ],
        'nama_pemberi'      => [
            'label' => "Nama Pemberi",
            'rules' => 'required|alpha_space',
        ],
        'telepon_pemberi'   => [
            'label' => "Nomor Telepon Pemberi",
            'rules' => 'required|min_length[9]|max_length[20]|alpha_numeric_punct',
        ],
        'expired_at'      => [
            'label' => "Tanggal Kedaluwarsa",
            'rules' => 'required|valid_date',
        ],
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
