<?php

require_once 'conexao.php';

class FuncionarioDAO {

    private $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function login($usuario, $senha) {
        try {
            $sql = "SELECT u.idUsuario,u.usuario,u.senha,p.perfil,f.idFuncionario "
                    . "FROM usuarios u INNER JOIN perfil p "
                    . "ON u.perfil_idPerfil = p.idPerfil INNER JOIN funcionarios f "
                    . "ON u.idUsuario = f.idFuncionario "
                    . "WHERE usuario = ? AND senha = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function salvar(FuncionarioDTO $funcionarioDTO, UsuarioDTO $usuarioDTO) {
        try {
            $sql = "INSERT INTO usuarios(usuario,senha,perfil_idPerfil)"
                    . " VALUES(?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->bindValue(3, $usuarioDTO->getPerfil());

            $stmt->execute();
            $idUsuario = $this->pdo->lastInsertId();

            $sql = "INSERT INTO funcionarios "
                    . "(nome,sobrenome,idade,cpf,datanascimento,sexo,celular,"
                    . "endereco,cidade,estado,usuarios_idUsuario)"
                    . " VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $funcionarioDTO->getNome());
            $stmt->bindValue(2, $funcionarioDTO->getSobrenome());
            $stmt->bindValue(3, $funcionarioDTO->getIdade());
            $stmt->bindValue(4, $funcionarioDTO->getCpf());
            $stmt->bindValue(5, $funcionarioDTO->getDatanascimento());
            $stmt->bindValue(6, $funcionarioDTO->getSexo());
            $stmt->bindValue(7, $funcionarioDTO->getCelular());
            $stmt->bindValue(8, $funcionarioDTO->getEndereco());
            $stmt->bindValue(9, $funcionarioDTO->getCidade());
            $stmt->bindValue(10, $funcionarioDTO->getEstado());
            $stmt->bindValue(11, $idUsuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT f.idFuncionario,f.nome,f.sobrenome,f.idade,f.cpf,"
                    . "f.datanascimento,f.sexo,f.celular,"
                    . "u.idUsuario,u.usuario,p.perfil "
                    . "FROM funcionarios f INNER JOIN usuarios u "
                    . "ON f.idFuncionario = u.idUsuario INNER JOIN perfil p "
                    . "ON p.idPerfil = u.perfil_idPerfil";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $funcionarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getById($idf, $idu) {
        try {
            $sql = "SELECT f.idFuncionario,f.nome,f.sobrenome,f.idade,f.cpf,"
                    . "f.datanascimento,f.sexo,f.celular,f.endereco,f.cidade,"
                    . "f.estado,u.idUsuario,u.usuario,u.senha,u.perfil_idPerfil "
                    . "FROM funcionarios f INNER JOIN usuarios u "
                    . "ON f.idFuncionario = u.idUsuario "
                    . "WHERE f.idFuncionario = ? AND u.idUsuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idf);
            $stmt->bindValue(2, $idu);
            $stmt->execute();
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $funcionario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarFuncionario(FuncionarioDTO $funcionarioDTO, UsuarioDTO $usuarioDTO) {
        try {
            $sql = "UPDATE usuarios SET usuario = ?, "
                    . "                 senha = ?, "
                    . "                 perfil_idPerfil = ? "
                    . "WHERE idUsuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->bindValue(3, $usuarioDTO->getPerfil());
            $stmt->bindValue(4, $usuarioDTO->getIdUsuario());
            $stmt->execute();

            $sql = "UPDATE funcionarios SET nome = ?,sobrenome = ?,"
                    . "cpf = ?,datanascimento = ?,sexo = ?,celular = ?,"
                    . "endereco = ?,cidade = ?,estado = ? "
                    . "WHERE idFuncionario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $funcionarioDTO->getNome());
            $stmt->bindValue(2, $funcionarioDTO->getSobrenome());
            $stmt->bindValue(3, $funcionarioDTO->getCpf());
            $stmt->bindValue(4, $funcionarioDTO->getDatanascimento());
            $stmt->bindValue(5, $funcionarioDTO->getSexo());
            $stmt->bindValue(6, $funcionarioDTO->getCelular());
            $stmt->bindValue(7, $funcionarioDTO->getEndereco());
            $stmt->bindValue(8, $funcionarioDTO->getCidade());
            $stmt->bindValue(9, $funcionarioDTO->getEstado());
            $stmt->bindValue(10, $funcionarioDTO->getIdFuncionario());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteById($idf, $idu) {
        try {
            $sql = "DELETE FROM funcionarios WHERE idFuncionario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idf);
            $stmt->execute();

            $sql = "DELETE FROM usuarios WHERE idUsuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idu);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function pesquisa($pesquisa) {
        try {
            $sql = "SELECT f.idFuncionario,f.nome,f.sobrenome,f.idade,f.cpf,"
                    . "f.datanascimento,f.sexo,f.celular,"
                    . "u.idUsuario,u.usuario,p.perfil "
                    . "FROM funcionarios f INNER JOIN usuarios u "
                    . "ON f.idFuncionario = u.idUsuario INNER JOIN perfil p "
                    . "ON p.idPerfil = u.perfil_idPerfil "
                    . "WHERE nome LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $pesquisa . "%");
            $stmt->execute();
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $funcionarios;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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

    public function getCpf($cpf) {
        try {
            $sql = "SELECT cpf FROM funcionarios WHERE cpf LIKE '%{$cpf}%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $cpf = $stmt->fetch(PDO::FETCH_ASSOC);
            return $cpf;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getUsuario($usuario) {
        try {
            $sql = "SELECT usuario FROM usuarios WHERE usuario LIKE '%{$usuario}%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
