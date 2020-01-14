<?php

require_once 'conexao.php';

class AlunoDAO {

    private $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function cadastrarAluno(AlunoDTO $alunoDTO) {
        try {
            $sql = "INSERT INTO alunos "
                    . "(nome,sobrenome,idade,matricula,cpf,datanascimento,sexo,"
                    . "celular,endereco,cidade,estado,imagem,status,perfil_idPerfil)"
                    . " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alunoDTO->getNome());
            $stmt->bindValue(2, $alunoDTO->getSobrenome());
            $stmt->bindValue(3, $alunoDTO->getIdade());
            $stmt->bindValue(4, $alunoDTO->getMatricula());
            $stmt->bindValue(5, $alunoDTO->getCpf());
            $stmt->bindValue(6, $alunoDTO->getDatanascimento());
            $stmt->bindValue(7, $alunoDTO->getSexo());
            $stmt->bindValue(8, $alunoDTO->getCelular());
            $stmt->bindValue(9, $alunoDTO->getEndereco());
            $stmt->bindValue(10, $alunoDTO->getCidade());
            $stmt->bindValue(11, $alunoDTO->getEstado());
            $stmt->bindValue(12, $alunoDTO->getImagem());
            $stmt->bindValue(13, $alunoDTO->getStatus());
            $stmt->bindValue(14, $alunoDTO->getPerfil());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT idAluno,nome,sobrenome,idade,matricula,cpf,datanascimento,"
                    . "sexo,celular,endereco,status "
                    . "FROM alunos a INNER JOIN perfil p ON "
                    . "a.perfil_idPerfil = p.idPerfil";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getById($ida) {
        try {
            $sql = "SELECT idAluno,nome,sobrenome,idade,matricula,cpf,datanascimento,"
                    . "sexo,celular,endereco,cidade,estado,imagem,status,perfil_idPerfil "
                    . "FROM alunos  WHERE idALuno = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $ida);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterar(AlunoDTO $alunoDTO) {
        try {
            $sql = "UPDATE alunos SET nome = ?,sobrenome = ?,"
                    . "matricula = ?,cpf = ?,datanascimento = ?,sexo = ?,"
                    . "celular = ?,endereco = ?,cidade = ?,estado = ?,"
                    . "imagem = ?,status = ?,perfil_idPerfil = ? "
                    . "WHERE idAluno = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alunoDTO->getNome());
            $stmt->bindValue(2, $alunoDTO->getSobrenome());
            $stmt->bindValue(3, $alunoDTO->getMatricula());
            $stmt->bindValue(4, $alunoDTO->getCpf());
            $stmt->bindValue(5, $alunoDTO->getDatanascimento());
            $stmt->bindValue(6, $alunoDTO->getSexo());
            $stmt->bindValue(7, $alunoDTO->getCelular());
            $stmt->bindValue(8, $alunoDTO->getEndereco());
            $stmt->bindValue(9, $alunoDTO->getCidade());
            $stmt->bindValue(10, $alunoDTO->getEstado());
            $stmt->bindValue(11, $alunoDTO->getImagem());
            $stmt->bindValue(12, $alunoDTO->getStatus());
            $stmt->bindValue(13, $alunoDTO->getPerfil());
            $stmt->bindValue(14, $alunoDTO->getIdAluno());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteById($ida) {
        try {
            $sql = "DELETE FROM alunos WHERE idAluno = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $ida);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteByHistorico($ida) {
        try {
            $sql = "DELETE FROM historico WHERE alunos_idAluno = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $ida);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function pesquisa($pesquisa) {
        try {
            $sql = "SELECT idAluno,nome,sobrenome,idade,matricula,cpf,datanascimento,"
                    . "sexo,celular,status "
                    . "FROM alunos a INNER JOIN perfil p ON "
                    . "a.perfil_idPerfil = p.idPerfil "
                    . "WHERE nome LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $pesquisa . "%");
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarMatricula($pesquisa) {
        try {
            $sql = "SELECT idAluno,nome,sobrenome,matricula,sexo,imagem,status FROM "
                    . "alunos WHERE matricula = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $pesquisa);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function historico(AlunoDTO $alunoDTO) {
        try {
            $sql = "INSERT INTO historico(nome,sobrenome,matricula,status,hora,data,alunos_idAluno) "
                    . "VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alunoDTO->getNome());
            $stmt->bindValue(2, $alunoDTO->getSobrenome());
            $stmt->bindValue(3, $alunoDTO->getMatricula());
            $stmt->bindValue(4, $alunoDTO->getStatus());
            $stmt->bindValue(5, $alunoDTO->getHora());
            $stmt->bindValue(6, $alunoDTO->getData());
            $stmt->bindValue(7, $alunoDTO->getIdAluno());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listaHistorico() {
        try {
            $sql = "SELECT nome,sobrenome,matricula,status,hora,data FROM historico ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $aluno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function mes() {
        try {
            $stmt = $this->pdo->prepare("SELECT idMes,mes FROM meses");
            $stmt->execute();
            $mes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $mes;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deletaHistorico() {
        try {

            $stmt = $this->pdo->prepare("DELETE FROM historico");
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function pesquisaHistorico($pesquisa) {
        try {
            $sql = "SELECT nome,sobrenome,matricula,status,hora,data FROM historico "
                    . "WHERE matricula = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $pesquisa);
            $stmt->execute();
            $aluno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getMatricula($matricula) {
        try {
            $sql = "SELECT matricula FROM alunos WHERE matricula LIKE '%{$matricula}%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $matricula = $stmt->fetch(PDO::FETCH_ASSOC);
            return $matricula;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getCpf($cpf) {
        try {
            $sql = "SELECT cpf FROM alunos WHERE cpf LIKE '%{$cpf}%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $cpf = $stmt->fetch(PDO::FETCH_ASSOC);
            return $cpf;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
