<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Item extends Entity
{
    protected $attributes = [
        'id'                => null,
        'id_user'           => null,
        'id_umkm'           => null,
        'nama_barang'       => null,
        'harga_rb'          => null,
        'harga_jual'        => null,
        'nama_pemberi'      => null,
        'telepon_pemberi'   => null,
        'expired_at'   => null,
        'created_at'   => null,
        'updated_at'   => null,
        'deleted_at'   => null,
    ];
    
    protected $datamap = [];
    protected $dates   = [
        'item_created_at',
        'expired_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];

    public function getHargaJual(bool $isFormatted = false)
    {
        if ($isFormatted) {
            return $this->attributes['harga_jual'] =  "Rp" . number_format($this->attributes['harga_jual'], 2, ',', '.');
        } else {
            return $this->attributes['harga_jual'];
        }
    }

    public function getHargaRb(bool $isFormatted = false)
    {
        if ($isFormatted) {
            return $this->attributes['harga_rb'] = "Rp" . number_format($this->attributes['harga_rb'], 2, ',', '.');
        } else {
            return $this->attributes['harga_rb'];
        }
    }

    public function getTeleponPemberi(bool $isForm = false)
    {
        if ($isForm) {
            return $this->attributes['telepon_pemberi'] = substr(($this->attributes['telepon_pemberi']), 2);
        }
        
        return $this->attributes['telepon_pemberi'];
    }
    
    public function setTeleponPemberi(string $nomor)
    {
        // Cek apakah string kedua pertama tidak ada unsur "62
        if (substr($nomor, 0, 2) === "62") {
            $this->attributes['telepon_pemberi'] =  $nomor;
        } else {
            $this->attributes['telepon_pemberi'] =  "62" . $nomor;
        }

        return $this;
    }
}
