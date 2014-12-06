<?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 2/10/14
 * Time: 09:12 PM
 */


require('db.php');
require ('Grupo.php');
require ('header.php');
$grupo = new Grupo();
$idg = $_REQUEST['idg'];

$sql04 = "SELECT * FROM grupo WHERE Id = $idg";
$result04 = mysql_query($sql04)or die("No se ejecuta $sql04");
$existe = mysql_num_rows($result04);
if ($existe > 0) {

    $nombre =mysql_result($result04, 0, 'nombre');
    $nombre = utf8_decode($nombre);
    echo "<br>Grupo Seleccionado: <strong>".$nombre."</strong>";
}

echo "<div class=table-responsive>";
echo "<table class=\"table table-striped table-bordered\">";
echo "<tr><td colspan=2 align=center><strong>Materias del Grupo Asignadas</strong></td></tr>";
$sql01 = "SELECT * FROM grupo_materia where idg = $idg ";
$result01 = mysql_query($sql01)or die("Error $sql01");
while($field = mysql_fetch_array($result01)){
    $id = $field['idmat'];
    $idm = $field['idm'];

    $sql04 = "SELECT u.nombre as maestro,u.apellido_pat as app,m.Nombre as materia FROM usuario as u,materia as m WHERE u.id = $idm and m.Id=$id";
    $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
    $nombre = utf8_decode(mysql_result($result04,0,'maestro'));
    $app = utf8_decode(mysql_result($result04,0,'app'));
    $mat = utf8_decode(mysql_result($result04,0,'materia'));
    echo "<tr><td>$nombre $app - $mat</td><td><a href=testAsignarGrupo.php?accion=2&maestro=$idg&materia=$id>Eliminar</a></td></tr>";
}
echo "</table>";
echo "</div>";


$grupo->asignarMateriaGrupo($idg);

require ('footer.php');
?>