<?php
require_once __DIR__ . '/../config/database.php';

class Usuario {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function buscarPorEmailSenha($email, $senha) {
        $email = $this->conn->real_escape_string($email);
        $senha = $this->conn->real_escape_string($senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $resultado = $this->conn->query($sql);

        if ($resultado->num_rows === 1) {
            return $resultado->fetch_assoc();
        }

        return null;
    }
}
