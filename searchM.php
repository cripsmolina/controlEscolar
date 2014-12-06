<?php
/**
 * Created by PhpStorm.
 * User: Universidad
 * Date: 2/10/14
 * Time: 07:15 PM
 */

require('Materia.php');
require_once('db.php');
require('header.php');

$idm=$_COOKIE['id_empleado'];
$materia = new Materia();

$materia->readMateria($idm);