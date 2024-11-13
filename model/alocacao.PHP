<?php

class alocacao{

    public function cadastraAlocacao($id, $area, $automovel, $quantidade, $fk_concessionaria_id){

        try{
            $sql= "Insert into alocacao values (?,?,?,?,?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt -> bindValue(1,$id);
            $stmt -> bindValue(2,$area);
            $stmt -> bindValue(3,$automovel);
            $stmt -> bindValue(4,$quantidade);
            $stmt -> bindValue(5,$fk_concessionaria_id);
            $stmt -> execute();

            return "Alocação cadastrada com sucesso!";
            
        }catch(PDOException $ex){
            if($ex->errorInfo[1] == 1062)
            {
                return 'Alocação já cadastrada';
            } else{
                return 'Erro ao cadastrar Alocação';
            }
        }

    }

    public function validaAlocacao($id, $area){
        try{
            $sql= "select * from alocacao where id=? and area?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt -> bindValue(1, $id);
            $stmt -> bindValue(2, $area);
            $stmt -> execute();

            $result = $stmt->rowCount();

            return $result;

        } catch(Exception $ex){
            return false;

        }       
    }
    public function removeAlocacao($id) 
    {
        try{
            $sql = "delete from alocacao where id=?";  
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id);   
            $stmt->execute();
                
            if($stmt->rowCount()>0){
            return 'Alocacao Excluida';                 
            }else{
                return 'Nenhuma alocacao excluida';
            }       
        }catch (Exception $ex) {
            return 'Erro ao excluir alocacao';
        }      
    }
}

?>