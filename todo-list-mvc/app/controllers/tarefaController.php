<?php 
    require_once __DIR__ . '/../models/tarefa.php';

    class TarefaController {
        private $tarefaModel;

        public function __construct() {
            $this->tarefaModel = new Tarefa();
        }

        public function index() {
            $tarefas = $this->tarefaModel->listar();
            include __DIR__ .'/../views/listar.php';
    }        

        public function criar() {
            if (isset($_POST['descricao']) && !empty(($_POST['descricao']))) {
                $this->tarefaModel->criar($_POST['descricao']);
            }
            header('location: index.php');
    }

    public function excluir() {
        if (isset($_GET['delete'])) {
            $this->tarefaModel->excluir($_GET['delete']);
        }
        header('location: index.php');
    }
}
?>