<?php

namespace App\Controllers;

use App\Models\UserModel;

class Usuarios extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        $order = $this->request->getGet('order');
        if ($order === 'older') {
            $builder->orderBy('id', 'ASC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        $query = $builder->get();
        $data['usuarios'] = $query->getResultArray();

        return view('usuarios_view', $data);
    }

    public function ver($id = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id);
        $user = $builder->get()->getRowArray();

        if (!$user) {
            return redirect()->to(site_url('usuarios'));
        }

        $data['user'] = $user;

        return view('usuarios/ver', $data);
    }

    public function editar($id = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id);
        $user = $builder->get()->getRowArray();

        if (!$user) {
            return redirect()->to(site_url('usuarios'));
        }

        $data['user'] = $user;

        return view('usuarios/editar', $data);
    }

    public function actualizar($id = null)
    {
        $db = \Config\Database::connect();

        $name = $this->request->getPost('name') ?? $this->request->getPost('nombre');
        $email = $this->request->getPost('email') ?? $this->request->getPost('correo');
        $password = $this->request->getPost('password');

        $updateData = [
            'name'  => $name,
            'email' => $email
        ];

        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $db->table('users')->where('id', $id)->update($updateData);

        return redirect()->to(site_url('usuarios'));
    }
}
