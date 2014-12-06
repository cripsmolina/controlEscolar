<?php

require("header.php");
require("Usuario.php");
require("db.php");



echo"<br><br><br>
        <div>
            <form name='materia' action=AsignarMateria.php method=POST>
                <table align=center border=black>
                    <tr> <td>Maestro: </td><td>";
                    echo "<select name='maestro'>";
                    $sql = "SELECT * from usuario where nivel=2 and estatus=1";
                    $consulta2=mysql_query($sql2)or die("Query error2");
                    $cuantos2=mysql_num_rows($consulta2);
                    for($y=0;$y<$cuantos2;$y++)
                    {
                        $idc2=mysql_result($consulta2,$y,'id');
                        $nombre2=mysql_result($consulta2,$y,'nombre');
                        echo"<option value='$idc2'>nombre2</option>";
                    }
                    echo"</select>";
                    echo"</select>";
                    echo"</td></tr>";
                    echo"<tr> <td colspan='2' align=center><input type=submit name=submit value=Seleccionar> </td></tr>
                 </table>
            </form>
        </div>
    ";

require ("footer.php");