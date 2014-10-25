<?php
define('CMS', true);
define('PATH', '../admin/');
require PATH.'engine/classes/mainclass.php';
$mainclass->isAdmin();
$mainclass->AssetsUser(array('1'));

$array_section = array(
    'main' => 'index',
);
$mainclass->LoadCategory('subject'); 
$mainclass->LoadMessage();
$tmp->setCSS(array('main','li'));
$tmp->Parse('subject/'.$mainclass->tmpName);
?>