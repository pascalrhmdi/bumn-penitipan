<?php

namespace App\Controllers;

use App\Models\ItemModel;
use CodeIgniter\RESTful\ResourceController;
use Myth\Auth\Entities\User as EntitiesUser;

class User extends ResourceController
{
    protected $modelName = 'Myth\Auth\Models\UserModel';
    protected $format = 'json';
    private \Myth\Auth\Entities\User $entity;

    
    public function __construct()
    {
        $this->entity = new \Myth\Auth\Entities\User();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $users = $this->model->findAll();

        // // menyingkirkan daftar akun dirinya sendiri
        // foreach ($users as $index => $user) {
        //     if($user->id === user_id()) array_splice($users, $index, 1);
        // }

        $data = [
            'title' => 'Kelola User',
            'users' => $users,
        ];

        return view('user/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $itemModel = model(ItemModel::class);
        $data = [
            'title' => "Lihat Pengguna",
            'user' => $this->model->find($id),
            'items' => $itemModel->where("id_user", $id)->findAll(),
        ];

        return view('user/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        // 
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // 
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // Jika $id berisi maka bukan mengedit untuk dirinya sendiri
        // Jika $id == null maka mengedit untuk dirinya sendiri
        $user = $id ? $this->model->find($id) : user();

        $data = [
            'title' => 'Edit user',
            'user' =>  $user,
        ];

        return view('user/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate($this->model->getValidationRules(['only' => ['username']]))) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            "id" => $id,
            "username" => $this->request->getPost("username"),
        ];
        
        $user = new EntitiesUser();
        $user->fill($data);
        
        // Jika menghendaki user 
        $isActive = $this->request->getPost("active");
        $isActive ? $user->activate() : $user->deactivate();

        $this->model->save($user);

        return redirect()->back()->with('message', "Akun Berhasil Diubah");
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $user = $this->model->find($id);
        $this->model->delete($id);

        return redirect('admin/user')->with('message', "User $user->username Berhasil Dihapus");
    }
}
