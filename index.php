<?php
session_start();
define('APP_DEBUG',True);
 
define('APP_WEB_URL',"http://".$_SERVER['SERVER_NAME']."/");                                                                                                                     
 
define("APP_REAL_URL",$_SERVER['DOCUMENT_ROOT']);

 require './ThinkPHP/ThinkPHP.php';
?>
