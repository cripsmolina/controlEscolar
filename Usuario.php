<?php

class Usuario {
    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $telefono;
    private $calle;
    private $numExterior;
    private $NumInterior;
    private $colonia;
    private $municipio;
    private $estado;
    private $cp;
    private $correo;
    private $usuario;
    private $password;
    private $nivel;
    private $estatus;

    public function createUsuario($nombre,$app,$apm,$nivel){
        //echo "<br><br><br>createUsuario";
        $insert01 = "INSERT INTO usuario (nombre,apellido_pat,apellido_mat,nivel,estatus)
                      VALUES ('$nombre','$app','$apm','$nivel',1)";
        $consulta01 = mysql_query($insert01) or die ("Error $insert01");

    }

    public function readUserG(){
        //echo "<br><br><br>Leer General<br>";
        $sql02 = "select * from usuario  where estatus=1 ORDER BY apellido_pat ASC";
        $consulta02 = mysql_query($sql02) or die (mysql_error());
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped table-bordered\">";
        echo "<tr><td colspan='5' align=center><strongs>Lista de usuarios</strongs></td></tr>";
        echo "<tr><th>Id</th><th>Nombre</th><th>Apellido P</th><th>Apellido M</th><th>Nivel</th></tr>";
        while($field = mysql_fetch_array($consulta02)){
            $this->id = $field["id"];
            $this->nombre = utf8_decode($field['nombre']);
            $this->apellidoPaterno = utf8_decode($field['apellido_pat']);
            $this->apellidoMaterno = utf8_decode($field['apellido_mat']);
            $this->nivel = $field["nivel"];
            switch($this->nivel){
                case 1:
                      $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
            }

            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td><td>$this->apellidoMaterno</td><td>$type</td></tr>";

        }
        echo "</table>";
        echo "</div>";
    }


    public function readEspecifico($id){
        //echo "<br><br><br>Leer Especifico<br>";
        $sql03 = "select * from usuario where estatus = 1 and id = $id ORDER BY apellido_pat ASC";
        $result03 = mysql_query($sql03) or die (mysql_error());
        echo "<div class=table-responsive >";
        echo "<table class=\"table table-bordered table-bordered\">";
        echo "<tr><td colspan='5' align=center><strongs>Lista de usuarios</strongs></td></tr>";
        echo "<tr><th>Id</th><th>Nombre</th><th>Apellido P</th><th>Apellido M</th><th>Nivel</th></tr>";
        while($field = mysql_fetch_array($result03)){
            $this->id = $field["id"];
            $this->nombre = utf8_decode($field['nombre']);
            $this->apellidop = utf8_decode($field['apellido_pat']);
            $this->apellidoMaterno = utf8_decode($field['apellido_mat']);
            $this->nivel = $field["nivel"];
            switch($this->nivel){
                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
            }

            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellidoPaterno</td><td>$this->apellidoMaterno</td><td>$type</td></tr>";

        }
        echo "</table>";
        echo "</div>";
    }


    public function updateUser($id,$nombre,$app,$apm,$nivel){
        //echo "<br><br><br>Update";
        $sql04 = "UPDATE usuario SET nombre='$nombre', apellido_pat='$app', apellido_mat='$apm', nivel='$nivel'
            where id=$id";
        $execute04 = mysql_query($sql04) or die ("Error $sql04".mysql_error());

    }

    public function delete($id){
        //echo "<br><br><br>Delete";
        $sql10="select * from asignamat where idm=$id";
        $consulta10=mysql_query($sql10)or die(mysql_error());
        $ida=mysql_result($consulta10,0,'idm');
        if($ida == 0){
        $sql05 = "DELETE FROM usuario where id=$id" ;
        $execute = mysql_query($sql05) or die ("Error $sql05".mysql_error());
            echo"<div class=\"alert alert-danger\" role=alert>";
            echo "El Usuario se elimino correctamente</div>";
        }
        else{
            $sql05 = "update  usuario set estatus=0 where id=$id" ;
            $execute = mysql_query($sql05) or die ("Error $sql05".mysql_error());
            echo"<div class=\"alert alert-danger\" role=alert>";
            echo "El Usuario se desactivo correctamente</div>";
        }
    }

}

