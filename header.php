
<html>
<head>
    <!-- <meta charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>System V</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script><!--linea para ajax-->
    <script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script><!--linea ajax-->


</head>
<body>
<?php
$id_empleado=$_COOKIE['id_empleado'];
$accesos=$_COOKIE['acceso'];
if($id_empleado=="" or $accesos=="")
{
    print"<meta http-equiv='refresh' content='0;url=login.php?msg='>";
    exit;
}
session_start();
$idu2=$_SESSION['id_empleado'];
$acceso2=$_SESSION['acceso'];
if($idu2=="" or $acceso2=="")
{
    print"<meta http-equiv='refresh' content='0;url=login.php?msg='>";
    exit;
}

require_once('db.php');
$sql="select * from usuario where id = $id_empleado";
$consulta = mysql_query($sql)or die(mysql_error());
$nivel=mysql_result($consulta,0,'nivel');


if($nivel==1)
{
 require('menu.php');
}
else
{
    if($nivel==2)
    {
        require ('menu_maestro.php');
    }
}
    ?>