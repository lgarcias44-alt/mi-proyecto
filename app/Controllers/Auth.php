<o
?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function attemptRegister()
    {
        $userModel = new UserModel();

        $name     = $this->request->getPost('name');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($userModel->where('email', $email)->first()) {
            return redirect()->back()->withInput()->with('error', 'El correo ya está registrado.');
        }

        $token = bin2hex(random_bytes(16));

        $userModel->save([
            'name'             => $name,
            'email'            => $email,
            'password_hash'    => password_hash($password, PASSWORD_DEFAULT),
            'activation_token' => $token,
            'active'           => 0
        ]);

        $link = base_url("activate/$token");
        return redirect()->to('register')->with('success', "Registro exitoso. Para activar tu cuenta usa este enlace: <a href='$link'>$link</a>");
    }

    public function activate($token)
    {
        $userModel = new UserModel();
        $user = $userModel->where('activation_token', $token)->first();

        if ($user) {
            $userModel->update($user['id'], [
                'active'           => 1,
                'activation_token' => null
            ]);
            return redirect()->to('login')->with('success', '¡Cuenta activada con éxito! Ya puedes iniciar sesión.');
        }

        return redirect()->to('register')->with('error', 'El token de activación es inválido o ya fue utilizado.');
    }

    public function login()
    {
        return "Pantalla de Login";
    }
}
