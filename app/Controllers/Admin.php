<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $umkmModel = model("UmkmModel");
        $itemModel = model("ItemModel");

        $data = array(
            'title' => "Dashboard",
            'umkms' => $umkmModel->countAll(),
            'items' => $itemModel->countAll(),
        );

        return view('dashboard', $data);
    }
}
