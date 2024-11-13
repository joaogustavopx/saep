<?php

class Venda{
    
    public function cadastraVenda($fk_concessionaria_id, $fk_automoveis_id, $fk_clientes_id){
        try{
            $sql="Insert into venda values(?,?,?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt ->bindValue(1, $fk_concessionaria_id);
            $stmt ->bindValue(2, $fk_automoveis_id);
            $stmt ->bindvalue(3, $fk_clientes_id);

        } catch(PDOException $ex){
            if($ex->errorInfo[1] == 1062)
            {
                return 'venda já cadastrada';
            } else{
                return 'Erro ao cadastrar venda';
            }
        }
    }

    public function validaVenda($fk_concessionaria_id,$fk_automoveis_id,$fk_clientes_id){
        try{
            $sql= "select * from venda where fk_concessionaria_id=? and fk_automoveis_id=? and fk_clientes_id=?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt ->bindValue(1, $fk_concessionaria_id);
            $stmt ->bindValue(2, $fk_automoveis_id);
            $stmt ->bindvalue(3, $fk_clientes_id);
            $stmt -> execute();

            $result = $stmt->rowCount();

            return $result;

        } catch(Exception $ex){

            return false;
        }
    }

    public function removeVenda($fk_concessionaria_id,$fk_automoveis_id,$fk_clientes_id){
        try{
            $sql = "delete from venda where where fk_concessionaria_id=? and fk_automoveis_id=? and fk_clientes_id=?";  
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt ->bindValue(1, $fk_concessionaria_id);
            $stmt ->bindValue(2, $fk_automoveis_id);
            $stmt ->bindvalue(3, $fk_clientes_id);
            $stmt->execute();
                
            if($stmt->rowCount()>0){
            return 'Venda Excluida';                 
            }else{
                return 'Nenhuma venda excluida';
            }       
        }catch (Exception $ex) {
            return 'Erro ao excluir venda';
        }
    }
}

?>