<?php
class Materia {

    public $maestro;
    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    public function createMateria(){
        echo "<br>Create Materia";
    }
    public function readMateriaG(){
        echo "<br>Read Materia G";
    }
    public function readMateriaS(){
        echo "<br>Read Materia S";
    }
    public function deleteMateria(){
        echo "<br>Delete Materia";
    }
    public function updateMateria(){
        echo "<br>Update Materia";
    }



    public function seleccionaMaestro($maestro){
        echo "<div class=jumbotron table-responsive>";
        echo "<form action=ajax.php method=Post name=maestro id=maestro target='_self'>";
        echo "<table class=\"table table-striped table-bordered\">";
        echo "<tr><td>Maestro: </td><td><select name=idm>";
        $sql02 = "SELECT * FROM usuario WHERE estatus = 1 AND nivel = 2 ORDER BY apellido_pat ASC";
        $result02 = mysql_query($sql02)or die("Error $sql02".mysql_error());
        if ($maestro != 0)
            {
                $sql04 = "SELECT * FROM usuario WHERE id = $maestro";
                $result04 = mysql_query($sql04)or die("Error $sql04");
                $nombre = mysql_result($result04,0,'nombre');
                $nombre .= " ".mysql_result($result04,0,'apellido_pat');
                $nombre = utf8_decode($nombre);
                echo "<option value=$maestro>$nombre</option>";
            }
        while($field = mysql_fetch_array($result02))
            {
                $id_maestro = utf8_decode($field['id']);
                $opcion = utf8_decode($field['apellido_pat']." ".$field['apellido_mat']." ".$field['nombre']);
                if ($maestro != $id_maestro)
                    echo "<option value=$id_maestro>$opcion</option>";
            }
        echo "</select></td></tr>";
        echo "<tr><td colspan=2 align=center><input type=submit id=submit class='btn btn-success' value=Seleccionar></td></tr>";
        echo "</table>";
        echo "</form>";

        /**<div id='ajax' ></div>
<script type='text/javascript'>
            $(function (e) {
                $('#maestro').submit(function (e) {
                    e.preventDefault()
		        $('#ajax').load('ajax.php?' + $('#maestro').serialize())
	                })
})
</script>**/
	echo"</div>";

    }

    public function deleteMaestroMateria($maestro_id, $materia_id){
        if ($materia_id > 0){
            $delete01 = "DELETE FROM asignamat WHERE idm = $maestro_id AND idmat = $materia_id";
            $delete01 = mysql_query($delete01) or die("Error  $delete01");
        }
    }


    public function asignarMateriaMaestro($id_maestro){
        //include('asignar-materias.php');
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped table-bordered\">";
        echo "<form action=testMateria.php method=POST id=materias>";
        echo "<tr><td colspan=2 align=center><strong>Asignar Nuevas Materias</strong></td></tr>";
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

    public function createMaestroMateria($maestro_id, $materia_id){
        //echo "<br> Materia: ".$materia_id;
        if ($materia_id > 0){
            $insert01 = " INSERT INTO asignamat (idm, idmat)
                                 VALUES('$maestro_id','$materia_id')";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
        }
    }

    public function readMateria($idm){
        //echo "<br><br><br>Leer General<br>";
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped table-bordered\">";
        echo "<tr><td colspan=2 align=center><strong>Materias Asignadas</strong></td></tr>";
        $sql01 = "SELECT * FROM grupo_materia WHERE idm = $idm GROUP BY idmat";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id = $field['idmat'];
            $idg = $field['idg'];
            $sql04 = "SELECT * FROM materia WHERE id = $id";
            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
            $nombre = utf8_decode(mysql_result($result04,0,'nombre'));
            $sql05 ="Select * from grupo where Id =$idg";
            $result05= mysql_query($sql05)or die(mysql_error());
            $grupo = utf8_decode(mysql_result($result05,0,'Nombre'));
            echo "<tr><td>$nombre</td><td>$grupo</td></tr>";
        }
        echo "</table>";
        echo "</div>";

    }
}
