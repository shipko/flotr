<?php
define('CMS', true);
define('PATH', '../admin/');
require PATH.'engine/classes/mainclass.php';
$mainclass->isAdmin();

$array_section = array(
    'main' => 'index',
    'second' => array(
        'add' => 'add',
        'edit' => 'edit',
        'delete' => 'delete'
    )
);
$mainclass->LoadCategory('result'); 
$mainclass->LoadMessage();
$tmp->Parse('result/'.$mainclass->tmpName);
?>
