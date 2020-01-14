-- cria a base de dados smca
CREATE DATABASE smca;

-- DROP DATABASE smca;
-- usa a base de dados smca
USE smca;

-- cria as tabelas do banco smca
CREATE TABLE Funcionarios(
	idFuncionario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(40) NOT NULL,
    sobrenome VARCHAR(40) NOT NULL,
    idade INT NOT NULL,
    cpf VARCHAR(40) NOT NULL,
    datanascimento DATE NOT NULL,
    sexo VARCHAR(40) NOT NULL,
    celular VARCHAR(12) NOT NULL,
    endereco VARCHAR(40) NOT NULL,
    cidade VARCHAR(40) NOT NULL,
    estado VARCHAR(40) NOT NULL,
    usuarios_idUsuario INT NOT NULL
);

CREATE TABLE usuarios(
	idUsuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(40) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    perfil_idPerfil INT NOT NULL
);

CREATE TABLE alunos(
	idAluno INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(40) NOT NULL,
    sobrenome VARCHAR(40) NOT NULL,
    idade INT NOT NULL,
    matricula INT NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    datanascimento DATE NOT NULL,
    sexo VARCHAR(9) NOT NULL,
    celular VARCHAR(12) NOT NULL,
    endereco VARCHAR(40) NOT NULL,
    cidade VARCHAR(40) NOT NULL,
    estado VARCHAR(40) NOT NULL,
    imagem VARCHAR(50) NOT NULL,
    status VARCHAR(8) NOT NULL,
    perfil_idPerfil INT NOT NULL
);

CREATE TABLE historico(
	idHistorico INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(40) NOT NULL,
    sobrenome VARCHAR(40) NOT NULL,
    matricula INT NOT NULL,
    status VARCHAR(40) NOT NULL,
    hora VARCHAR(40) NOT NULL,
    data DATE NOT NULL,
    alunos_idAluno INT NOT NULL
);

CREATE TABLE perfil(
	idPerfil INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    perfil VARCHAR(15) NOT NULL
);
CREATE TABLE meses(
	idMes INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mes VARCHAR(15) NOT NULL
);


-- adiciona a chave estrangeira nas tabelas
ALTER TABLE funcionarios
	ADD CONSTRAINT fk_funcionario
    FOREIGN KEY (usuarios_idUsuario)
    REFERENCES usuarios(idUsuario);
    
ALTER TABLE usuarios
	ADD CONSTRAINT fk_perfil
    FOREIGN KEY (perfil_idPerfil)
    REFERENCES perfil(idPerfil);
    
ALTER TABLE alunos
	ADD CONSTRAINT fk_aluno
    FOREIGN KEY (perfil_idPerfil)
    REFERENCES perfil(idPerfil);
    
ALTER TABLE historico
	ADD CONSTRAINT fk_historico
    FOREIGN KEY (alunos_idAluno)
    REFERENCES alunos(idAluno);

-- inserindo dados adicionais
INSERT INTO perfil VALUES(1,'Administrador'),(2,'Funcionario'),(3,'Aluno');

INSERT INTO meses VALUES(1,'Janeiro'),(2,'Fevereiro'),(3,'Mar&ccedil;o'),(4,'Abril'),
(5,'Maio'),(6,'Junho'),(7,'Julho'),(8,'Agosto'),(9,'Setembro'),(10,'Outrubro'),
(11,'Novembro'),(12,'Dezembro');


