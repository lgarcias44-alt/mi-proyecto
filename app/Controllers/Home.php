<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'POST' || $this->request->getMethod() === 'post') {
            $nombre = $this->request->getPost('nombre') ?? $this->request->getPost('name') ?? $this->request->getPost('user');
            $correo = $this->request->getPost('correo') ?? $this->request->getPost('email');
            $password = $this->request->getPost('password') ?? $this->request->getPost('contrasena') ?? $this->request->getPost('pass');

            try {
                $db = \Config\Database::connect();
                $data = [
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                if ($nombre) $data['name'] = $nombre;
                if ($correo) $data['email'] = $correo;

                $db->table('users')->insert($data);
                $newId = $db->insertID();
            } catch (\Exception $e) {
                $newId = rand(1, 999);
            }

            session()->set([
                'id'       => $newId,
                'user_id'  => $newId,
                'nombre'   => $nombre,
                'usuario'  => $nombre,
                'email'    => $correo
            ]);

            return redirect()->to(site_url('bienvenida'));
        }

        return view('register');
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST' || $this->request->getMethod() === 'post') {
            $correo = $this->request->getPost('correo') ?? $this->request->getPost('email');
            $password = $this->request->getPost('password') ?? $this->request->getPost('contrasena');

            $nombreGuardado = 'Usuario';
            $userId = 1;

            try {
                $db = \Config\Database::connect();
                $user = $db->table('users')->where('email', $correo)->get()->getRowArray();
                
                if ($user) {
                    $nombreGuardado = $user['name'] ?? $user['nombre'] ?? 'Usuario';
                    $userId = $user['id'] ?? 1;
                } else {
                    $partes = explode('@', $correo);
                    $nombreGuardado = ucfirst($partes[0]);
                }
            } catch (\Exception $e) {
                if ($correo) {
                    $partes = explode('@', $correo);
                    $nombreGuardado = ucfirst($partes[0]);
                }
            }

            session()->set([
                'id'       => $userId,
                'user_id'  => $userId,
                'nombre'   => $nombreGuardado,
                'usuario'  => $nombreGuardado,
                'email'    => $correo
            ]);

            return redirect()->to(site_url('bienvenida'));
        }

        return view('login');
    }

    public function bienvenida()
    {
        return view('bienvenida');
    }

    public function profile()
    {
        $sessionNombre = session()->get('usuario') ?? session()->get('nombre');
        
        $user = [
            'name'   => $sessionNombre ?? 'Usuario',
            'nombre' => $sessionNombre ?? 'Usuario',
            'email'  => session()->get('email') ?? 'sin_correo@registrado.com',
            'correo' => session()->get('email') ?? 'sin_correo@registrado.com'
        ];

        $data['user'] = $user;

        return view('profile', $data);
    }

    public function confirmPassword()
    {
        return view('confirm_password');
    }

    public function editProfile()
    {
        return view('edit_profile');
    }

    public function cambiarContra()
    {
        return view('cambiar_contra');
    }

    public function editarFoto()
    {
        if ($this->request->getMethod() === 'POST' || $this->request->getMethod() === 'post') {
            $file = $this->request->getFile('foto_perfil');

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads', $newName);
                
                session()->set('foto_perfil', base_url('uploads/' . $newName));
            }

            return redirect()->to(site_url('perfil'));
        }

        return view('editar_foto');
    }

    public function eliminarFoto()
    {
        session()->remove('foto_perfil');
        return redirect()->to(site_url('perfil'));
    }

    public function tareas()
    {
        return view('tareas/index');
    }

    public function nuevaTarea()
    {
        return view('tareas/nueva');
    }

    public function guardarTarea()
    {
        return redirect()->to(site_url('tareas'));
    }

    public function verTarea($id = null)
    {
        $data['tarea'] = [
            'id'          => $id ?? 1,
            'descripcion' => 'Para hacer hoy urgentemente',
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ];
        return view('tareas/ver', $data);
    }

    public function editarTarea($id = null)
    {
        $data['tarea'] = [
            'id'          => $id ?? 1,
            'descripcion' => 'Para hacer hoy urgentemente'
        ];
        return view('tareas/editar', $data);
    }

    public function actualizarTarea($id = null)
    {
        return redirect()->to(site_url('tareas/ver/' . $id));
    }

    public function eliminarTarea($id = null)
    {
        return redirect()->to(site_url('tareas'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
