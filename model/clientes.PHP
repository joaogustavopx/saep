<?php

class Clientes{
    public function cadastraCliente($id,$nome){
        try{
            $sql = "INSERT INTO clientes values (?,?)";
            $stmt= Conexao::getConexao()->prepare($sql);
            $stmt -> bindValue(1,$id);
            $stmt -> bindValue(2,$nome);
            $stmt -> execute();


        return "Cliente Cadastrado com sucesso";
        }catch (PDOException $ex) {
        if($ex->errorInfo[1] == 1062)
        {
            return 'Cliente já cadastrado';
        } else{
            return 'Erro ao cadastrar Cliente';
        }

        }
    }

    public function validaCliente($id,$nome){
        try{
        $sql = "SELECT * FROM clientes where id=? and nome=?";
        $stmt= Conexao::getConexao()->prepare($sql);
        $stmt -> bindValue(1,$id);
        $stmt -> bindValue(2,$nome);
        $stmt -> execute();
        $result = $stmt->rowCount();

            return $result;
        }catch (Exception $ex){
            return false;
        }
    }
    public function removeCliente($id) 
    {
        try{
            $sql = "DELETE FROM clientes where id=?";  
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id);   
            $stmt->execute();
                
            if($stmt->rowCount()>0){
            return 'Cliente Excluido';                 
            }else{
                return 'Nenhum Cliente excluido';
            }       
        }catch (Exception $ex) {
            return 'Erro ao excluir Cliente';
        }      
    }
}

?>