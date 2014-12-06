<?php
require('db.php');
require ('Grupo.php');
require ('header.php');
$grupo = new Grupo();
$gr = $_REQUEST['grupo'];
$sql03="SELECT Nombre FROM grupo WHERE Id=$gr ";
$result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
$grup=mysql_result($result03,0,'Nombre');

echo "<div class=table-responsive>";
echo "<table class=\"table table-striped table-bordered\">";
echo "<tr><td colspan=5 align=center><strong>Alumnos asignados al grupo: $grup</strong></td></tr>";
echo "<tr><td align='center'>Id</td><td align='center'>Apellido Paterno</td><td align='center'>Apellido Materno</td><td align='center'>Nombre</td><td align='center'>Opci&oacute;n</td></tr>";

foreach($_REQUEST['opcion'] as $id_alumno){
    $sql04="Select * from usuario where id=$id_alumno";
    $result04 = mysql_query($sql04)or die(mysql_error());

    $app=mysql_result($result04,0,'apellido_pat');
    $apm=mysql_result($result04,0,'apellido_mat');
    $nombre=mysql_result($result04,0,'nombre');

    $grupo->createAlumnoGrupo($id_alumno,$gr);

echo "<tr><td align='center'>$id_alumno</td><td align='center'>$app</td><td align='center'>$apm</td><td align='center'>$nombre</td><td align='center'><a href=testGrupo.php?accion=2&grupo=$gr&alumno=$id_alumno>Eliminar</a></td></tr>";
}
echo "</table>";
echo "</div>";

require ('footer.php');
?>



