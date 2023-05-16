<?php
//IMPORTANDO OS ARQUIVOS MODEL E BANCO
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/projetos/psiAdriana/model/model_produtos.php");
require_once("$root/projetos/psiAdriana/model/model_admins.php");
require_once("$root/projetos/psiAdriana/model/model_coments.php");
require_once("$root/projetos/psiAdriana/model/banco.php");

class controller{

    //CRIANDO VARIAVEIS PARA OS OBJETOS
    private $admin;
    private $produto;
    private $coment;
    private $banco;

    public function __construct(){
        //INSTANCIANDO OBJETOS
        $this->admin = new Admins();
        $this->produto = new Produtos();
        $this->coment = new Coments();
        $this->banco = new Banco();

        //IF PARA VER QUAL FUNÇÃO ESTÁ SENDO REQUESITADA 
        if(isset($_GET['funcao']) && $_GET['funcao'] == "setProd"){
            $this->setProduto();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "updateProd"){
            $this->updateProduto($_GET['id_prod']);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "getProd"){
            $this->getProduto();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "deleteProd"){
            $this->deleteProduto($_GET['id_prod']);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "setComent"){
            $this->setComent();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "getComent"){
            $this->getComent($_GET['id_prod']);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "deleteComent"){
            $this->deleteComent($_GET['id_coment']);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "loginAdmin"){
            $this->loginAdmin();
        }
    }

    //INICIO FUNÇÕES DE PRODUTOS
    //ADICIONAR PRODUTO
    private function setProduto(){
        $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
        $num_img = $this->banco->getImg($ext);
        $new_name = $num_img . $ext; //Definindo um novo nome para o arquivo
        $dir = '../img/'; //Diretório para uploads 
        move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        $img = 'img/' . $new_name;

        $this->produto->setTitle($_POST['txtTitle']);
        $this->produto->setDescr($_POST['txtDescr']);
        $this->produto->setValor($_POST['txtValor']);
        $this->produto->setDt_lanc($_POST['txtDt_lanc']);
        $this->produto->setNum_pag($_POST['txtNum_pags']);
        $this->produto->setPublico($_POST['txtPublico']);
        $this->produto->setImg($img);
        $this->produto->setLink($_POST['txtLink']);
        $result = $this->produto->setProduto();
        
        if($result == 1){
            echo "<script>alert('Cadastro do produto realizado com sucesso!');document.location='../produtos_adm.php'</script>";
        }else if($result == 2){
            echo "<script>alert('Já existe um produto com este nome! Tente usar outro...');document.location='../adicionarprod.php'</script>";
        }else{
            echo "<script>alert('Erro ao cadastrar o produto! Cheque as informações!');document.location='../adicionarprod.php'</script>";
        } 
    }

    //MOSTRAR PRODUTOS
    public function getProduto($id_prod){
        $result = $this->produto->getProduto($id_prod);
        if($result >= 1){
            return $result;
        }else{
            echo "<script>alert('Não conseguimos buscar as informações do produto...');document.location='materials.php';</script>";
        }
    }

    //ATUALIZAR PRODUTO
    private function updateProduto($id_prod){
        if($_FILES['pic']['error'] == 4){
            $img = 0;
        }else{
            $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
            $new_name = $id_prod . $ext; //Definindo um novo nome para o arquivo
            $dir = '../img/'; //Diretório para uploads 
            move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            $img = 'img/' . $new_name;
        }
        
        $this->produto->setId_prod($id_prod);
        $this->produto->setTitle($_POST['txtTitle']);
        $this->produto->setDescr($_POST['txtDescr']);
        $this->produto->setValor($_POST['txtValor']);
        $this->produto->setDt_lanc($_POST['txtDt_lanc']);
        $this->produto->setNum_pag($_POST['txtNum_pags']);
        $this->produto->setPublico($_POST['txtPublico']);
        $this->produto->setImg($img);
        $this->produto->setLink($_POST['txtLink']);
        $result = $this->produto->updateProduto();
        if($result == 1){
            echo "<script>alert('Produto atualizado com sucesso!');document.location='../produtos_adm.php'</script>";
        }else if($result == 2){
            echo "<script>alert('Já existe um produto com este nome!');document.location='../produtos_adm.php'</script>";
        }else{
            echo "<script>alert('Erro ao editar o produto! Cheque as informações!');document.location='../produtos_adm.php'</script>";
        }
    }

    //DELETAR PRODUTO
    public function deleteProduto($id){
        $this->produto->setId_prod($id);
        $result = $this->produto->deleteProduto();
        if($result >= 1){
            echo "<script>alert('Produto excluido com sucesso!');document.location='../produtos_adm.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o produto!');document.location='../produtos_adm.php'</script>";
        }
    }
    //FIM FUNÇÕES DE PRODUTOS

    //INICIO FUNÇÕES DE COMENTÁRIOS
    //ADICIONAR COMENTÁRIO
    private function setComent(){
        $this->coment->setId_prod($_POST['txtId_prod']);
        $this->coment->setUser($_POST['txtUser']);
        $this->coment->setMessage($_POST['txtMessage']);
        $result = $this->coment->setComent();
        
        if($result == 1){
            echo "<script>alert('Mensagem enviada com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao enviar mensagem! Cheque as informações!');document.location='../index.php'</script>";
        } 
    }

    //MOSTRAR COMENTÁRIOS
    public function getComent($id_prod){
        $result = $this->coment->getComent($id_prod);
        if($result >= 1){
            return $result;
        }else{
            echo "<script>alert('Não conseguimos buscar as informações do produto...');document.location='produtos.php';</script>";
        }
    }

    //ATUALIZAR COMENTÁRIO
    private function updateComent($id_prod){
        $this->produto->setId_prod($id_prod);
        $this->produto->setTitle($_POST['txtTitle']);
        $this->produto->setDescr($_POST['txtDescr']);
        $this->produto->setValor($_POST['txtValor']);
        $result = $this->produto->updateProduto();
        if($result == 1){
            echo "<script>alert('Produto atualizado com sucesso!');document.location='../index.php'</script>";
        }else if($result == 2){
            echo "<script>alert('Já existe um produto com este nome!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao editar o produto! Cheque as informações!');document.location='../index.php'</script>";
        }
    }

    //DELETAR COMENTÁRIO
    public function deleteComent($id){
        $result = $this->produto->deleteProduto($id);
        if($result >= 1){
            echo "<script>alert('Produto excluido com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o produto!');document.location='../index.php'</script>";
        }
    }
    //FIM FUNÇÕES DE COMENTÁRIOS

    //INICIO FUNÇÕES DE ADMINISTRADORES
    //FAZER LOGIN
    private function loginAdmin(){
        $this->admin->setUser($_POST['txtUser']);
        $this->admin->setSenha($_POST['txtSenha']);
        $result = $this->admin->loginAdm();
        if($result >= 1){
            echo "<script>alert('Login Efetuado com sucesso!');document.location='../produtos_adm.php'</script>";
        }else{
            echo "<script>alert('Usuário e/ou senha incorretos! Tente Novamente!');document.location='../login.php'</script>";
        }
    }
    //FIM FUNÇÕES DE ADMINISTRADORES
    

    //public function pesquisar($pesquisa, $var){
    //    $result = $this->produto->pesquisar($pesquisa, $var);
    //    if($result >= 1){
    //        return $result;
    //    }else{
    //        echo "<script>alert('Que pena...Não temos produtos com esse nome...');document.location='produtos.php';</script>";
    //    }
        
    //}
}
new controller();
?>
