<?php
session_start();

class AuthController {
    private $validCredentials = [
        'kevin@gmail.com' => '1234'
    ];

    public function login($username, $password) {
        if (array_key_exists($username, $this->validCredentials) && $this->validCredentials[$username] === $password) {
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $username;
            header('Location: ../home.html');
            exit();
        } else {
            echo "¡Credenciales inválidas!";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $authController = new AuthController();
        $authController->login($username, $password);
    } else {
        echo "campos incompletos.";
    }
} else {
    echo "solicitud no valida.";
}
?>
