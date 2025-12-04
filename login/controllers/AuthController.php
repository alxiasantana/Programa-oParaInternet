<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        include __DIR__ . '/../views/login.php';
    }

    public function logar() {
        if (!empty($_POST['email']) && !empty($_POST['senha'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = $this->usuarioModel->buscarPorEmailSenha($email, $senha);

            if ($usuario) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: index.php?action=painel");
                exit;
            } else {
                $erro = "Email ou senha incorretos.";
                include __DIR__ . '/../views/erro.php';
            }
        } else {
            $erro = "Preencha todos os campos.";
            include __DIR__ . '/../views/erro.php';
        }
    }

    public function painel() {
        include __DIR__ . '/../views/painel.php';
    }
}
