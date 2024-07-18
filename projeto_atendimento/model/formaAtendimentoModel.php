<?php
require_once 'conexao.php';

class FormaAtendimento extends Conexao {
    private $idFormaAtendimento;
    private $nomeAtendimento;
    private $tabela = 'formaatendimento';

    
    public function __construct() {
        parent::__construct();
    }

    
    public function getIdFormaAtendimento() {
        return $this->idFormaAtendimento;
    }

    public function setIdFormaAtendimento($idFormaAtendimento) {
        $this->idFormaAtendimento = $idFormaAtendimento;
    }

    public function getNomeAtendimento() {
        return $this->nomeAtendimento;
    }

    public function setNomeAtendimento($nomeAtendimento) {
        $this->nomeAtendimento = $nomeAtendimento;
    }

    
    public function consulta() {
        $sql = "SELECT idFormaAtendimento, nomeAtendimento FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>