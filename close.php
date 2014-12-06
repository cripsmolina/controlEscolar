<?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 2/10/14
 * Time: 08:44 PM
 */

setCookie('id_empleado',"");
setCookie('acceso',"");
session_start();
session_unset();
session_destroy();
$msg="Sesion Terminada";
print"<meta http-equiv='refresh' content='0;url=login.php?msg=$msg'>";
exit;