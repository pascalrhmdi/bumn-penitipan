<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Umkm extends Entity
{
    protected $attributes = [
        'id' => null,
        'nama_umkm' => null,
        'nomor_telepon' => null,
        'alamat' => null,
        'created_at'   => null,
        'updated_at'   => null,
        'deleted_at'   => null,
    ];

    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];


    public function setNomorTelepon(string $nomor)
    {
        // Cek apakah string kedua pertama tidak ada unsur "62
        if (substr($nomor, 0, 2) === "62") {
            $this->attributes['nomor_telepon'] =  $nomor;
        } else {
            $this->attributes['nomor_telepon'] =  "62" . $nomor;
        }

        return $this;
    }

    public function getNomorTelepon(bool $isForm = false)
    {
        if ($isForm) {
            return $this->attributes['nomor_telepon'] = substr(($this->attributes['nomor_telepon']), 2);
        }
        
        return $this->attributes['nomor_telepon'];
    }
}
