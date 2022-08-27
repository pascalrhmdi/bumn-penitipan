<?php

namespace App\Controllers;

use App\Models\UmkmModel;
use CodeIgniter\RESTful\ResourceController;

class Item extends ResourceController
{

    protected $modelName = 'App\Models\ItemModel';
    protected $format = 'json';
    private \App\Entities\Item $entity;

    public function __construct()
    {
        $this->entity = new \App\Entities\Item();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Barang',
            'items' => $this->model->getAllWithUmkms(),
        ];

        return view('item/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'title' => "Lihat Barang",
            'item' => $this->model->getAllWithUmkms($id),
        ];

        return view('item/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $umkmModel = model("UmkmModel");

        $data = [
            'title' => "Tambah Barang",
            'umkms' => $umkmModel->findAll(),
        ];

        return view('item/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate($this->model->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil Semua Data
        $data = $this->request->getPost();
        $img = $this->request->getFile('gambar_barang');

        // Hapus Rupiah dan titik pada string
        $data['harga_rb'] = str_replace([".", "Rp"], "", $data['harga_rb']);
        $data['harga_jual'] = str_replace([".", "Rp"], "", $data['harga_jual']);
        $data['telepon_pemberi'] = str_replace("-", "", $data['telepon_pemberi']);

        if ($img->isValid() && !$img->hasMoved()) {
            // Penamaan File: Random
            $file_name = $data['gambar_barang'] = $img->getRandomName();

            
            $this->entity->fill($data);
            $this->model->save($this->entity);
            
            // Library Image Manipulation
            // Move ke file Public/uploads
            $image = \Config\Services::image();
            $image
                ->withFile($img)
                ->resize(720, 540, TRUE)
                ->save(FCPATH . "uploads/$file_name");
        } else {
            // Jika Tidak Mengirimkan File Pake Placeholder Image
            $data['gambar_barang'] = "image-placeholder.png";
            $this->entity->fill($data);
            $this->model->save($this->entity);
        }

        return redirect('admin/item')->with('message', "Barang Berhasil Ditambahbahkan");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $umkmModel = model('UmkmModel');

        $data = [
            'title' => 'Edit item',
            'item' => $this->model->getAllWithUmkms($id),
            'umkms' => $umkmModel->findAll(),
        ];

        return view('item/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate($this->model->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = array_merge(
            ["id" => $id],
            $this->request->getPost()
        );

        // Hapus Rupiah dan titik pada string
        $data['harga_rb'] = str_replace([".", "Rp"], "", $data['harga_rb']);
        $data['harga_jual'] = str_replace([".", "Rp"], "", $data['harga_jual']);
        $data['telepon_pemberi'] = str_replace("-", "", $data['telepon_pemberi']);

        $img = $this->request->getFile('gambar_barang');

        // Jika File kosong maka tidak diubah
        if ($img->isValid() && !$img->hasMoved()) {
            // Penamaan File: Random
            $file_name = $data['gambar_barang'] = $img->getRandomName();

            $this->entity->fill($data);
            $this->model->save($this->entity);

            // Library Image Manipulation
            // Move ke file Public/uploads
            $image = \Config\Services::image();
            $image
                ->withFile($img)
                ->resize(720, 540, TRUE)
                ->save(FCPATH . "uploads/$file_name");
        } else {
            // Jika File tidak ada yang di upload, telah di pindah, dll.
            $this->entity->fill($data);
            $this->model->save($this->entity);
        }

        return redirect('admin/item')->with('message', "Barang Berhasil Diubah");
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $item = $this->model->find($id);

        if ($item->gambar_barang !== "image-placeholder.png") {
            unlink("uploads/" . $item->gambar_barang);
        }

        $this->model->delete($id);

        return redirect('admin/item');
    }
}
