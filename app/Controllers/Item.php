<?php

namespace App\Controllers;

use App\Models\UmkmModel;
use CodeIgniter\RESTful\ResourceController;

class Item extends ResourceController
{
    
    protected $modelName = 'App\Models\ItemModel';
    protected $format = 'json';
    private \App\Entities\Item $entity;

    public function __construct(){
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

        // dd($data);

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
        if(!$this->validate($this->model->validationRules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Hapus Rupiah dan titik pada string
        $data['harga_rb'] = str_replace([".", "Rp"],"",$data['harga_rb']); 
        $data['harga_jual'] = str_replace([".", "Rp"],"",$data['harga_jual']); 
        $data['telepon_pemberi'] = str_replace("-","",$data['telepon_pemberi']); 

        // Grab POST value to Item Entities
        $this->entity->fill($data);

        $this->model->save($this->entity);

        return redirect('admin/item');
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

        $data = array_merge(
            ["id" => $id],
            $this->request->getPost()
        );

        // Hapus Rupiah dan titik pada string
        $data['harga_rb'] = str_replace([".", "Rp"],"",$data['harga_rb']); 
        $data['harga_jual'] = str_replace([".", "Rp"],"",$data['harga_jual']); 
        $data['telepon_pemberi'] = str_replace("-","",$data['telepon_pemberi']); 

        // dd($data);
        
        $this->entity->fill($data);

        $this->model->save($this->entity);

        return redirect('admin/item');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);

        return redirect('admin/item');
    }
}
