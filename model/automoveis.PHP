<?php

class automoveis{

    public function cadastraAutomovel($id,$modelo,$preco, $fk_alocacao_id){
        try{
            $sql = "insert into automoveis values(?,?,?,?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt -> bindValue(1, $id);
            $stmt -> bindValue(2, $modelo);
            $stmt -> bindValue(3, $preco);
            $stmt -> bindValue(4, $fk_alocacao_id);
            $stmt -> execute();

            return "Automovel cadastrado com sucesso!";
        }catch(PDOException $ex){
            if($ex->errorInfo[1] == 1062)
        {
            return 'Automovel já cadastrado';
        } else{
            return 'Erro ao cadastrar Automovel';
            }
        }
    }

    public function validaAutomovel($id,$modelo){
        try{
            $sql = "select * from automoveis where id=? and modelo=?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt -> bindValue(1, $id);
            $stmt -> bindValue(2, $modelo);
            $stmt -> execute();

            $result = $stmt->rowCount();

            return $result;
        }catch (Exception $ex){
            return false;
        }
    }
    public function removeAutomovel($id) 
    {
        try{
            $sql = "delete from automoveis where id=?";  
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id);   
            $stmt->execute();
                
            if($stmt->rowCount()>0){
            return 'Automovel Excluido';                 
            }else{
                return 'Nenhum Automovel excluido';
            }       
        }catch (Exception $ex) {
            return 'Erro ao excluir Automovel';
        }      
    }
}

?>