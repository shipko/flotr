<?php
$time = microtime();

define('CMS', true);
define('ADMIN','');

error_reporting(0);

require 'config.php';

require 'vendor/autoload.php';
$twig = new Twig_Environment($loader, array(
    'cache' => '/path/to/compilation_cache',
));

echo $twig->render('index.html', array('name' => 'Fabien'));

require 'engine/template/base.php';
require 'engine/db/mysql.php';
require 'engine/security/base.php';
require 'engine/other/main.class.php';
require 'engine/mainclass.php';
$other->time=new time;
$tmp->setJS(array('jquery'));
?>
