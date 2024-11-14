<?php

class Venda {

    public function cadastraVenda($fk_concessionaria_id, $fk_automoveis_id, $fk_clientes_id) {
        try {
            $sql = "INSERT INTO venda (fk_concessionaria_id, fk_automoveis_id, fk_clientes_id) VALUES (?, ?, ?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $fk_concessionaria_id);
            $stmt->bindValue(2, $fk_automoveis_id);
            $stmt->bindValue(3, $fk_clientes_id);

            $stmt->execute();

            return "Venda cadastrada com sucesso!";
        } catch (PDOException $ex) {
            if ($ex->errorInfo[1] == 1062) {
                return 'Venda já cadastrada';
            } else {
                return 'Erro ao cadastrar venda: ' . $ex->getMessage();
            }
        }
    }

    public function validaVenda($fk_concessionaria_id, $fk_automoveis_id, $fk_clientes_id) {
        try {
            $sql = "SELECT * FROM venda WHERE fk_concessionaria_id = ? AND fk_automoveis_id = ? AND fk_clientes_id = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $fk_concessionaria_id);
            $stmt->bindValue(2, $fk_automoveis_id);
            $stmt->bindValue(3, $fk_clientes_id);
            $stmt->execute();

            $result = $stmt->rowCount();

            return $result;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function removeVenda($fk_concessionaria_id, $fk_automoveis_id, $fk_clientes_id) {
        try {
            $sql = "DELETE FROM venda WHERE fk_concessionaria_id = ? AND fk_automoveis_id = ? AND fk_clientes_id = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $fk_concessionaria_id);
            $stmt->bindValue(2, $fk_automoveis_id);
            $stmt->bindValue(3, $fk_clientes_id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Venda excluída';
            } else {
                return 'Nenhuma venda excluída';
            }
        } catch (Exception $ex) {
            return 'Erro ao excluir venda: ' . $ex->getMessage();
        }
    }
}

?>