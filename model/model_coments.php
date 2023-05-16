<?php
//import da classe banco
require_once("banco.php");

class Coments extends Banco {

    private $banco;

    //Cadastrar Compra
    private $id_prod;
    private $user;
    private $message;

    //Método Construtor
    public function __construct(){
        $this->banco = new Banco();
    }

    //Metodos Set
    public function setId_prod($string){
        $this->id_prod = $string;
    }
    public function setUser($string){
        $this->user = $string;
    }
    public function setMessage($string){
        $this->message = $string;
    }

    //Metodos Get
    //Finalizar compra
    public function getId_prod(){
        return $this->id_prod;
    }
    public function getUser(){
        return $this->user;
    }
    public function getMessage(){
        return $this->message;
    }


    //Funções Gerais:
    public function setComent(){
        return $this->banco->setCommit($this->getId_prod(),$this->getUser(), $this->getMessage());
    }

    public function getComent($id_prod){
        return $this->banco->getCommit($id_prod);
    }

    public function deleteComent($id_prod){
        return $this->banco->deleteCommit($id_prod);
    }
}
?>
