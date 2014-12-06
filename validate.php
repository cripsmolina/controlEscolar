<?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 2/10/14
 * Time: 07:25 PM
 */

$user=$_POST['user'];

$psw=$_POST['psw'];

if($user=="" or $psw=="")
{
    $msg="Llenar los campos antes de continuar";
    print "<meta http-equiv='refresh'content='0;url=login.php?msg=$msg'>";
    exit;
}
require_once("db.php");

$sql="select id ,usuario,password,estatus from usuario where usuario='$user' and password='$psw' LIMIT 1";
$consulta=mysql_query($sql);


    $cveacceso=mysql_result($consulta,0,'id');
    $active=mysql_result($consulta,0,'estatus');
    if($active==0)
    {
        $msg="El usuario no es activo consulte a su administrador";
        print "<meta http-equiv='refresh'content='0;url=login.php?msg=$msg'>";
        exit;
    }
    else
    {

        print "<meta http-equiv='refresh'content='0;url=accesos.php?cv=$cveacceso'>";
        exit;
    }

?>