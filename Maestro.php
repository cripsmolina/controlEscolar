<?php
require('Usuario.php');

class Maestro extends Usuario{

    private $materia;

    public function showGroups($id_maestro){
        $sql04 = "SELECT * FROM usuario WHERE id = $id_maestro";
        $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
        $existe = mysql_num_rows($result04);
        if ($existe > 0) {
            $nombre = $id_maestro . " ) ";
            $nombre .= mysql_result($result04, 0, 'apellido_pat');
            $nombre .= " " . mysql_result($result04, 0, 'apellido_mat');
            $nombre .= " " . mysql_result($result04, 0, 'nombre');
            $nombre = utf8_decode($nombre);
            echo "<br>Maestro Seleccionado: <strong>".$nombre."</strong>";
        }

        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped\">";
        echo "<tr><td  align=center><strong>Materias Asignadas</strong></td></tr>";
        $sql01 = "SELECT * FROM asignamat WHERE idm = $id_maestro GROUP BY idmat";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id = $field['idas'];
            $sql04 = "SELECT * FROM materia WHERE Id = $id";
            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
            $nombre = utf8_decode(mysql_result($result04,0,'Nombre'));
            echo "<tr><td>$nombre</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    }
}


?>