<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Umkm extends ResourceController
{

    protected $modelName = 'App\Models\UmkmModel';
    protected $format = 'json';
    private \App\Entities\Umkm $entity;

    public function __construct()
    {
        $this->entity = new \App\Entities\Umkm();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        $data = [
            'title' => 'UMKM',
            'umkms' => $this->model->findAll(),
        ];

        return view('umkm/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $itemModel = model("ItemModel");

        $data = [
            'title' => "Lihat",
            'umkm' => $this->model->find($id),
            'items' => $itemModel->where("id_umkm", $id)->findAll(),
        ];

        return view('umkm/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => "Tambah Data",
        ];

        return view('umkm/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate($this->model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Hapus dash pada string
        $data['nomor_telepon'] = str_replace("-","",$data['nomor_telepon']);

        $this->entity->fill($data);

        $this->model->save($this->entity);

        return redirect('admin/umkm')->with('message', "UMKM " . $data["nama_umkm"] . " Berhasil Dibuat");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit UMKM',
            'data' => $this->model->find($id),
        ];

        return view('umkm/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        
        if (!$this->validate($this->model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'id' => $id,
            'nama_umkm' => $this->request->getPost('nama_umkm'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        // Hapus dash pada string
        $data['nomor_telepon'] = str_replace("-","",$data['nomor_telepon']);

        $this->entity->fill($data);

        $this->model->save($this->entity);

        return redirect('admin/umkm')->with('message', "UMKM " . $data["nama_umkm"] . " Berhasil Diubah");
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);

        return redirect('admin/umkm')->with('message', "UMKM Berhasil Dihapus");
    }
}
