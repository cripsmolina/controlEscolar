<?php
/**
 * Created by PhpStorm.
 * User: CRIPS
 * Date: 12/09/14
 * Time: 07:00 PM
 */
    $db_name = "pro1";
    $db_server ="localhost";
    $db_user = "root";
    $db_pass = "";
    $db_connection = mysql_connect($db_server, $db_user, $db_pass)or die("Wrong Connection!");
    mysql_select_db($db_name);
    mysql_query("SET NAMES utf8");
?>