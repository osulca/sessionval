<?php
require_once "Conexion.php";

class Usuario
{
    private $id;
    private $codigo;
    private $contraseña;
    private $nombres;
    private $apellidos;
    private $tipo;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function setContraseña($contraseña): void
    {
        $this->contraseña = $contraseña;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }



    public function existe()
    {
        try {
            $conn = new Conexion();
            $sql = "SELECT codigo FROM usuarios WHERE codigo = '$this->codigo' ";
            $resultados = $conn->conectar->query($sql);
            $conn->desconectar();
            return $resultados->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function traerDatosPorCod()
    {
        try {
            $conn = new Conexion();
            $sql = "SELECT contraseña, nombres, apellidos, tipo FROM usuarios WHERE codigo = '$this->codigo' ";
            $resultados = $conn->conectar->query($sql);
            $conn->desconectar();
            return $resultados;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function guardar()
    {
        try {
            $conn = new Conexion();
            $sql = "INSERT INTO usuarios(codigo, contraseña, nombres, apellidos, tipo) VALUES('$this->codigo','$this->contraseña','$this->nombres','$this->apellidos','$this->tipo')";
            $resultados = $conn->conectar->exec($sql);
            $conn->desconectar();
            return $resultados;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}