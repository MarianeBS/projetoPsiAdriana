<?php
//import da classe banco
require_once("banco.php");

class Admins extends Banco {

    private $banco;

    //Cadastrar Compra
    private $id_admin;
    private $user;
    private $senha;

    //Método Construtor
    public function __construct(){
        $this->banco = new Banco();
    }

    //Metodos Set
    public function setId_admin($string){
        $this->id_admin = $string;
    }
    public function setUser($string){
        $this->user = $string;
    }
    public function setSenha($string){
        $this->senha = $string;
    }

    //Metodos Get
    public function getId_admin(){
        return $this->id_admin;
    }
    public function getUser(){
        return $this->user;
    }
    public function getSenha(){
        return $this->senha;
    }


    //Funções Gerais:
    public function loginAdm(){
        return $this->banco->loginAdmin($this->getUser(), $this->getSenha());
    }
}
?>
