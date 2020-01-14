<?php

class UsuarioDTO{
    private $idUsuario;
    private $usuario;
    private $senha;
    private $perfil;
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }


}
