<?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 19/09/14
 * Time: 06:42 PM
 */

class Grupo {
    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    public function create(){
        echo "<br><br><br>createGrupo";
    }

    public function readG(){
        echo "<br><br><br>readGGrupoa";
    }

    public function readEs(){
        echo "<br><br><br>readEGrupo";
    }

    public function update(){
        echo "<br><br><br>updateGrupo";
    }

    public function delete(){
        echo "<br><br><br>deteleGrupo";
    }

    public function readAlumnos(){
        echo "<div class='jumbotron table-responsive alert'>";
        echo "<form action=asignagrupo.php method=POST id=grupos>";
        echo "<table class=\"table table-striped table-bordered\">";
        echo"<tr><td colspan='5' align='center' class='alert-info'> Alumnos sin Grupo asignado</td></tr>";
        echo "<tr><td align='center'>Id</td><td align='center'>Apellido Paterno</td><td align='center'>Apellido Materno</td><td align='center'>Nombre</td><td align='center'>Opci&oacute;n</td></tr>";
        $sql01 = "SELECT * FROM usuario WHERE estatus = 1 and nivel=3 ORDER BY nombre ASC";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id_alumno = $field['id'];
            $nombre = $field['nombre'];
            $app = $field['apellido_pat'];
            $apm = $field['apellido_mat'];

            $sql03="SELECT * FROM alumno_grupo WHERE idal = $id_alumno ";
            $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
            $existe = mysql_num_rows($result03);
            if($existe > 0){

            }else{
                echo "<tr><td align='center'>$id_alumno</td><td align='center'>$app</td><td align='center'>$apm</td><td align='center'>$nombre</td><td align='center'><input type='checkbox' name='opcion[]' value=$id_alumno>  </td></tr>";
            }
        }
        echo "<tr><td colspan=5 align=center><strong>Asignar Alumnos a Grupo</strong></td></tr>";
        echo "<tr><td colspan='3' align=right>Grupos: </td><td colspan='2'><select id=grupo name=grupo>";
        $sql03="SELECT * FROM grupo WHERE estatus=1 order by nombre asc ";
        $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
        while($field = mysql_fetch_array($result03)){
            $idg = $field['Id'];
            $opcion = utf8_decode($field['Nombre']);
            echo "<option value=$idg>$opcion</option>";
        }
        echo "</select></td></tr>";
        echo "<input type=hidden id=alumno name=alumno value=$id_alumno>";
        echo "<tr><td colspan=5 align=center><input type=submit class='btn btn-success' id=submit value=Seleccionar></td></tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";

    }

    public function createAlumnoGrupo($id_alumno, $idg){
        //echo "<br> Materia: ".$materia_id;
        if ($id_alumno > 0){
            $insert01 = " INSERT INTO alumno_grupo (idal, idg)
                                 VALUES('$id_alumno','$idg')";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
            echo"<div class='\ alert alert-success' role='alert'>Alumno asignado exit&oacute;samente</div>";
        }
    }

    public function deleteAlumnoGrupo($id_alumno, $idg){
        if ($id_alumno> 0){
            $delete01 = "DELETE FROM alumno_grupo WHERE idal = $id_alumno AND idg = $idg";
            $delete01 = mysql_query($delete01) or die("Error  $delete01");
        }
    }

    public function seleccionaGrupo($grupo){
        echo "<div class=jumbotron table-responsive>";
        echo "<form action=auxi.php method=Post name=grupo id=grupo target='_self'>";
        echo "<table class=\"table table-striped table-bordered\">";
        echo "<tr><td>Grupo: </td><td><select name=idg>";
        $sql02 = "SELECT * FROM grupo WHERE estatus = 1 ORDER BY Nombre ASC";
        $result02 = mysql_query($sql02)or die("Error $sql02".mysql_error());
        if ($grupo != 0)
        {
            $sql04 = "SELECT * FROM grupo WHERE id = $grupo";
            $result04 = mysql_query($sql04)or die("Error $sql04");
            $nombre = mysql_result($result04,0,'Nombre');
            $nombre = utf8_decode($nombre);
            echo "<option value=$grupo>$nombre</option>";
        }
        while($field = mysql_fetch_array($result02))
        {
            $idg = utf8_decode($field['Id']);
            $opcion = utf8_decode($field['Nombre']);
            if ($grupo != $idg)
                echo "<option value=$idg>$opcion</option>";
        }
        echo "</select></td></tr>";
        echo "<tr><td colspan=2 align=center><input type=submit id=submit class='btn btn-success' value=Seleccionar></td></tr>";
        echo "</table>";
        echo "</form>";


}

    public function asignarMateriaGrupo($idgrupo){
        //include('asignar-materias.php');
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped table-bordered\">";
        echo "<form action=testAsignarGrupo.php method=POST id=groups>";
        echo "<tr><td colspan=2 align=center><strong>Asignar Nuevas Materias a grupo</strong></td></tr>";
        echo "<tr><td>Materia: </td><td><select id=materia name=materia>";
        $sql01 = "SELECT * FROM materia WHERE estatus = 1 ORDER BY nombre ASC";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id_materia = $field['Id'];
            $opcion = utf8_decode($field['Nombre']);

            $sql03="SELECT * FROM asignamat WHERE idm = $id_maestro AND idmat = $id_materia";
            $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
            $existe = mysql_num_rows($result03);
            if($existe > 0){
                //echo "<option value=0>No Disponible</option>";
            }else{
                echo "<option value=$id_materia>$opcion</option>";
            }
        }
        echo "</select></td></tr>";
        //echo "<a href=\"javascript: enviar()\">Search</a>";
        echo "<input type=hidden id=accion name=accion value=1>";
        echo "<input type=hidden id=maestro name=maestro value=$id_maestro>";
        echo "<tr><td colspan=2 align=center><input type=submit value=Agregar></td></tr>"; // onclick=window.location.href='TestMateria.php?accion=1&maestro=$id_maestro'

        echo "</form>";
        echo "</table>";
        echo "</div>";

    }
}
