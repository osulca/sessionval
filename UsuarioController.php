<?php
require_once "Usuario.php";
class UsuarioController
{
    public function login(int $codigo, string $clave): bool{
        if($this->existe($codigo)){
            $resultados = $this->traerDatos($codigo);
            foreach ($resultados as $usuario){
                $contraseña = $usuario["contraseña"];
                $newUsuario = $usuario["nombres"]." ".$usuario["apellidos"];
                $tipo = $usuario["tipo"];
            }
            if(password_verify($clave, $contraseña)){
                session_start();
                $_SESSION["codigo"] = $codigo;
                $_SESSION["usuario"] = $newUsuario;
                $_SESSION["tipo"] = $tipo;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function existe(int $codigo){
        $usuario = new Usuario();
        $usuario->setCodigo($codigo);
        $coincidencias = $usuario->existe();
        if($coincidencias==1){
            return true;
        }else{
            return false;
        }
    }

    public function traerDatos(int $codigo){
        $usuario = new Usuario();
        $usuario->setCodigo($codigo);
        return $usuario->traerDatosPorCod();
    }

    public function guardar(int $codigo, string $contraseña, string $nombres, string $apellidos, string $tipo): string{
        $usuario = new Usuario();
        $usuario->setCodigo($codigo);
        $usuario->setContraseña(password_hash($contraseña, PASSWORD_DEFAULT));
        $usuario->setNombres($nombres);
        $usuario->setApellidos($apellidos);
        $usuario->setTipo($tipo);
        $resultado = $usuario->guardar();
        if($resultado==1){
            return "guardado";
        }else{
            return "error, no se guardó";
        }
    }

}