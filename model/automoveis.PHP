<?php

class Automoveis {

public function cadastraAutomovel($id, $modelo, $preco, $fk_alocacao_id) {
    try {
        $sql = "INSERT INTO automoveis (id, modelo, preco, fk_alocacao_id) VALUES (?, ?, ?, ?)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $modelo);
        $stmt->bindValue(3, $preco);
        $stmt->bindValue(4, $fk_alocacao_id);
        $stmt->execute();

        return "Automóvel cadastrado com sucesso!";
    } catch (PDOException $ex) {
        return 'Erro ao cadastrar Automóvel: ' . $ex->getMessage();
    }
}

public function validaAutomovel($id, $modelo) {
    try {
        $sql = "SELECT * FROM automoveis WHERE id = ? AND modelo = ?";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $modelo);
        $stmt->execute();

        $result = $stmt->rowCount();
        return $result;
    } catch (Exception $ex) {
        return 'Erro ao validar Automóvel: ' . $ex->getMessage();
    }
}

public function removeAutomovel($id) {
    try {
        $sql = "DELETE FROM automoveis WHERE id = ?";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Automóvel excluído';
        } else {
            return 'Nenhum Automóvel excluído';
        }
    } catch (Exception $ex) {
        return 'Erro ao excluir Automóvel: ' . $ex->getMessage();
        }
    }
}
?>