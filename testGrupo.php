<?php
require("header.php");
require("Grupo.php");
require("Usuario.php");
require("db.php");


   $grupo = new Grupo();
   $user = new Usuario();

    if(isset($_REQUEST['accion']))
    {
        $accion = $_REQUEST['accion'];
    }
    else
    {
        $accion = 0;
    }

    if(isset($_REQUEST['alumno']))
    {
        $id = $_REQUEST['alumno'];
    }
    else
    {
        $id = 0;
    }

    if(isset($_REQUEST['grupo']))
    {
        $idg = $_REQUEST['grupo'];
    }
    else
    {
        $idg = 0;
    }


    switch($accion)
    {
        case 0:
            $grupo->readAlumnos();
        break;

        case 2:
            $grupo->deleteAlumnoGrupo($id,$idg);
            $grupo->readAlumnos();
        break;
}

require('footer.php'); ?>

