<script src="jquery.min.js"></script>

<?php
require('db.php');
require ('Materia.php');
require ('header.php');
$materia = new Materia();
$id_maestro = $_REQUEST['idm'];
$sql04 = "SELECT * FROM usuario WHERE id = $id_maestro";
$result04 = mysql_query($sql04)or die("No se ejecuta $sql04");
$existe = mysql_num_rows($result04);
if ($existe > 0) {

    $nombre = mysql_result($result04, 0, 'apellido_pat');
    $nombre .= " " . mysql_result($result04, 0, 'apellido_mat');
    $nombre .= " " . mysql_result($result04, 0, 'nombre');
    $nombre = utf8_decode($nombre);
    echo "<br>Maestro Seleccionado: <strong>".$nombre."</strong>";
}

echo "<div class=table-responsive>";
echo "<table class=\"table table-striped table-bordered\">";
echo "<tr><td colspan=2 align=center><strong>Materias Asignadas</strong></td></tr>";
$sql01 = "SELECT * FROM asignamat WHERE idm = $id_maestro GROUP BY idmat";
$result01 = mysql_query($sql01)or die("Error $sql01");
while($field = mysql_fetch_array($result01)){
    $id = $field['idmat'];
    $sql04 = "SELECT * FROM materia WHERE id = $id";
    $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
    $nombre = utf8_decode(mysql_result($result04,0,'nombre'));
    echo "<tr><td>$nombre</td><td><a href=TestMateria.php?accion=2&maestro=$id_maestro&materia=$id>Eliminar</a></td></tr>";
}
echo "</table>";
echo "</div>";


$materia->asignarMateriaMaestro($id_maestro);

require ('footer.php');
?>



