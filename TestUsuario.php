<?php
    require("Usuario.php");
    require("db.php");
    require("header.php");



    $usuario = new Usuario();

    if (isset($_POST['submit']))
    {
        switch($_POST['submit'])
        {
            case "Alta":
                echo "<div class=\"alert alert-danger\" role=alert>";
                echo "<br>Bot&oacute;n: " . $_POST['submit'];
                echo "</div>";
                $usuario->createUsuario("$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]",$_POST['nivel']);
                break;
            case "Borrar":
                echo "<div class=\"alert alert-danger\" role=alert>";
                echo"<br>Bot&oacute;n " . $_POST['submit'];
                $usuario->delete($_POST['idb']);
                echo "</div>";
                break;
            case "Modificar":
                echo "<div class=\"alert alert-danger\" role=alert>";
                echo"<br>Bot&oacute;n " . $_POST['submit'];
                $usuario->updateUser($_POST['idm'],"$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]",$_POST['nivel']);
                echo "</div>";
                break;
            case "Buscar":
                echo "<div class=\"alert alert-danger\" role=alert>";
                echo"<br>Bot&oacute;n " . $_POST['submit'];
                echo"</div>";
                if($_POST['idbuscar']==""){
                    $usuario->readUserG();
                    break;
                }
                else{
                    $usuario->readEspecifico($_POST['idbuscar']);
                    break;
                }
        }
    }


    echo"
        <div class=jumbotron table-responsive >
            <form name='alumno' action=TestUsuario.php method=POST>
                <table class=\"table table-bordered table-striped\">
                    <tr> <td>Nombre (s):</td><td><input type=text name='nombre'></td></tr>
                    <tr> <td>Apellido Paterno</td><td><input type=text name='apellidop' </td></tr>
                    <tr> <td>Apellido Materno</td><td><input type=text name='apellidom' </td></tr>
                    <tr> <td>Nivel</td><td><select name=nivel>
                        <option value=1>Administrador</option>
                        <option value=2>Maestro</option>
                        <option value=3>Alumno</option>
                        </select></td></tr>
                    <tr><td colspan=2 align=center><input type=submit class='btn btn-lg btn-primary' name=submit value=Alta> </input></td></tr>
                    <tr><td>ID: <input type=text name=idm></td><td><input type=submit class='btn btn-lg btn-success' name=submit value=Modificar> </input></td></tr>

                    <tr><td>ID: <input type=text name=idb></td><td><input type=submit class='btn btn-lg btn-danger' name=submit value=Borrar> </input></td></tr>
                    <tr><td>Buscar: <input type=text name=idbuscar></td><td><input type=submit class='btn btn-lg btn-primary' name=submit value=Buscar> </input></td></tr>

                </table>
            </form>
        </div>
    ";

require ("footer.php");