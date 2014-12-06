<?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 2/10/14
 * Time: 08:24 PM
 */

if($_GET)
{
   $id_empleado=$_GET['cv'];
}
if($id_empleado=="" or $id_empleado==0)
{
    $msg='';
    print"<meta http-equiv='refresh' content='0;url=login.php?msg=$msg'>";
    exit;
}
else
{
    setCookie('id_empleado',$id_empleado);
    setCookie('acceso',1);
    session_start();
    $_SESSION['id_empleado']=$id_empleado;
    $_SESSION['acceso']=1;

    print "<meta http-equiv='refresh'content='0;url=index.php'>";
    exit;
}
?>