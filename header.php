<?php
$time = microtime();
define('CMS', true);
define('ADMIN','');
/* Посылаем заголовки, чтобы страница не кешировалась */
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
/* Как никак, но завершим */
ignore_user_abort(true);
error_reporting(0);
require 'config.php';
require 'engine/template/base.php';
require 'engine/db/mysql.php';
require 'engine/security/base.php';
require 'engine/other/main.class.php';
require 'engine/mainclass.php';
$other->time=new time;
$tmp->setJS(array('jquery'));
?>
