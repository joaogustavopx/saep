<?php

class Concessionaria{

    public function cadastraConcessionaria($id,$concessionaria){
        try{
            $sql= "INSERT INTO concessionaria values (?,?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt -> bindvalue(1,$id);
            $stmt -> bindvalue(2,$concessionaria);
            $stmt->execute();

            return "Concessionaria Cadastrada com sucesso";
        }catch (PDOException $ex) {
        if($ex->errorInfo[1] == 1062)
        {
            return 'Concessionaria já cadastrado';
        } else{
            return 'Erro ao cadastrar Concessionaria';
        }

        }
    }

    public function validaConcessionaria($id,$concessionaria){
        try{
            $sql = 'SELECT * FROM concessionaria where id=? and concessionaria=?';
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt -> bindvalue(1,$id);
            $stmt -> bindvalue(2,$concessionaria);
            $stmt->execute();

            $result = $stmt->rowCount();

            return $result;
        }catch (Exception $ex){
            return false;
        }
    }
    public function removeConcessionaria($id) 
    {
        try{
            $sql = "DELETE FROM concessionaria where id=?";  
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id);   
            $stmt->execute();
                
            if($stmt->rowCount()>0){
            return 'Concessionaria Excluida';                 
            }else{
                return 'Nenhuma concessionaria excluida';
            }       
        }catch (Exception $ex) {
            return 'Erro ao excluir concessionaria';
        }      
    }
}

?>