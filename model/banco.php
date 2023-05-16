<?php
//timezone

date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados

define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','psi_db');
    
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
        $this->mysqli->query("SET NAMES 'utf8'");
        $this->mysqli->query('SET character_set_connection=utf8');
        $this->mysqli->query('SET character_set_client=utf8');
        $this->mysqli->query('SET character_set_results=utf8');
    }


    //INICIO FUNÇÕES DE ADMINISTRADOR
    public function loginAdmin($user, $senha){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_admin WHERE user = '" . $user . "' AND senha = '" . $senha . "';");

            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            
            foreach ($lista as $l) {
                $id_admin = $l['id_adm'];
            }

            if( $total > 0){
                session_start();
                $_SESSION['id_admin'] = $id_admin;
                return $id_admin;
            }else{
                return 0;
            }
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar seu login!" . $e;
        }
    }
    //FIM FUNÇÕES DE ADMINISTRADOR

    //INICIO FUNÇÕES DE COMENTÁRIOS
    public function setCommit($id_prod,$user,$message){
        $stmt = $this->mysqli->prepare("INSERT INTO tbl_commit (`id_prod`,`user`, `message`) VALUES (?,?,?);");
        $stmt->bind_param("sss",$id_prod,$user,$message);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }

    public function getCommit($id){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_coments WHERE id = '" . $id . "';");

            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;

            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['id_prod'] = $l['id_prod'];
                $f_lista[$i]['user'] = $l['user'];
                $f_lista[$i]['messsage'] = $l['message'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar todos os comentários do produto." . $e;
        }
    }

    public function deleteCommit($id){
        $stmt = $this->mysqli->query("DELETE FROM tbl_coments WHERE `id_commit` =  '" . $id . "';");

        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }
    //FIM FUNÇÕES DE COMENTÁRIOS

    //INICIO FUNÇÕES DE PRODUTOS
    public function setProd($title,$descr,$valor,$dt_lanc,$num_pag,$publico,$img,$link){
        $stmt = $this->mysqli->query("SELECT * FROM tbl_produto WHERE `title` = '" . $title . "';");
        $repeat = mysqli_num_rows($stmt); 

        if($repeat > 0){
            return 2;
        }else{
            $stmt = $this->mysqli->prepare("INSERT INTO tbl_produto (`title`,`descr`, `valor`, `dt_lanc`, `num_pag`, `publico`, `img`, `link`) VALUES (?,?,?,?,?,?,?,?);");
            $stmt->bind_param("ssssssss",$title,$descr,$valor,$dt_lanc,$num_pag,$publico,$img,$link);
            
            if( $stmt->execute() == TRUE){
                return true ;
            }else{
                return false;
            }
        }
    }

    public function getProduto($id_prod){
        try {
            if ($id_prod > 0) {
                $stmt = $this->mysqli->query("SELECT * FROM tbl_produto WHERE `id_prod` = '" . $id_prod . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM tbl_produto;");
            }
            
            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id_prod'] = $l['id_prod'];
                $f_lista[$i]['title'] = $l['title'];
                $f_lista[$i]['descr'] = $l['descr'];
                $f_lista[$i]['valor'] = $l['valor'];
                $f_lista[$i]['dt_lanc'] = $l['dt_lanc'];
                $f_lista[$i]['num_pag'] = $l['num_pag'];
                $f_lista[$i]['publico'] = $l['publico'];
                $f_lista[$i]['img'] = $l['img'];
                $f_lista[$i]['link'] = $l['link'];
                $i++;
            }

            if($total > 0){
                return $f_lista;
            }else{
                return 0;
            }

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar os prudutos!" . $e;
        }
    }

    public function getImg($ext){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_produto;");

            $total = mysqli_num_rows($stmt) + 1; 

            $stmt1 = $this->mysqli->query("SELECT * FROM tbl_produto WHERE `img` = '" . $total . $ext . "';");

            $repeat = mysqli_num_rows($stmt1); 

            if($repeat > 0){
                return $total+10;
            }else{
                return $total;
            } 
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar os prudutos!" . $e;
        }
    }

    public function updateProd($id,$title,$descr,$valor,$dt_lanc,$num_pag,$publico,$img,$link){
        if($img == 0){
            $stmt = $this->mysqli->query("UPDATE  tbl_produto  SET `title` = '" . $title . "', `descr` = '" . $descr . "', `valor` = '" . $valor . "', `dt_lanc` = '" . $dt_lanc . "', `num_pag` = '" . $num_pag . "', `publico` = '" . $publico . "', `link` = '" . $link . "' WHERE `tbl_produto`.`id_prod` = " . $id . ";");
        }else{
            $stmt = $this->mysqli->query("UPDATE  tbl_produto  SET `title` = '" . $title . "', `descr` = '" . $descr . "', `valor` = '" . $valor . "', `dt_lanc` = '" . $dt_lanc . "', `num_pag` = '" . $num_pag . "', `publico` = '" . $publico . "', `img` = '" . $img . "', `link` = '" . $link . "' WHERE `tbl_produto`.`id_prod` = " . $id . ";");
        }
        
        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteProd($id){
        $stmt = $this->mysqli->query("DELETE FROM tbl_produto WHERE `id_prod` =  '" . $id . "';");

        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }
    //FIM FUNÇÕES DE PRODUTOS

}    
?>
