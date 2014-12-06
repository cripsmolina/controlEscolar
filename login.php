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
<body><?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 2/10/14
 * Time: 06:21 PM
 */
echo"<div class='container'>

      <form class='form-signin' role='form' action='validate.php' method='post'>
        <h2 class='form-signin-heading'>Please sign in</h2>
        <input type='text' class='form-control' placeholder='User' required autofocus name='user'>
        <input type='password' class='form-control' placeholder='Password' required name='psw'>

        <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>
      </form>";
@$msg=$_GET['msg'];
if($msg!="")
{
    echo"<div class='alert alert-info' >$msg</div>";

}

  echo"  </div>";
?>