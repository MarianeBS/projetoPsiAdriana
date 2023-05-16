<?php
//import da classe banco
require_once("banco.php");

class Produtos {

    private $banco;

    //Cadastrar Compra
    private $id_prod;
    private $title;
    private $descr;
    private $valor;
    private $dt_lanc;
    private $num_pag;
    private $publico;
    private $img;
    private $link;


    //Método Construtor
    public function __construct(){
        $this->banco = new Banco();
    }


    //Metodos Set
    public function setId_prod($string){
        $this->id_prod = $string;
    }

    public function setTitle($string){
        $this->title = $string;
    }

    public function setDescr($string){
        $this->descr = $string;
    }

    public function setValor($string){
        $this->valor = $string;
    }

    public function setDt_Lanc($string){
        $this->dt_lanc = $string;
    }

    public function setNum_pag($string){
        $this->num_pag = $string;
    }

    public function setPublico($string){
        $this->publico = $string;
    }

    public function setImg($string){
        $this->img = $string;
    }

    public function setLink($string){
        $this->link = $string;
    }

    //Metodos Get
    //Finalizar compra
    public function getId_prod(){
        return $this->id_prod;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDescr(){
        return $this->descr;
    }

    public function getValor(){
        return $this->valor;
    }

    public function getDt_Lanc(){
        return $this->dt_lanc;
    }

    public function getNum_pag(){
        return $this->num_pag;
    }

    public function getPublico(){
        return $this->publico;
    }

    public function getImg(){
        return $this->img;
    }

    public function getLink(){
        return $this->link;
    }


    //Funções Gerais:
    public function setProduto(){
        return $this->banco->setProd($this->getTitle(),$this->getDescr(),$this->getValor(),$this->getDt_lanc(),$this->getNum_Pag(),$this->getPublico(),$this->getImg(),$this->getLink());
    }

    public function getProduto($id_prod){
        return $this->banco->getProduto($id_prod);
    }

    public function updateProduto(){
        return $this->banco->updateProd($this->getId_prod(),$this->getTitle(),$this->getDescr(),$this->getValor(),$this->getDt_lanc(),$this->getNum_Pag(),$this->getPublico(),$this->getImg(),$this->getLink());
    }

    public function deleteProduto(){
        return $this->banco->deleteProd($this->getId_prod());
    }
}
?>
