<?php
require 'header.php';
if(isset($_GET['act']) && $_GET['act']=='test') {
    require './classes/check_test.php';
    exit($c->TestId($_POST['id']));
}
else if(isset($_GET['act']) && $_GET['act']=='getBall') {
    require './classes/check_test.php';
	
    exit($c->checkResult());
}
require './classes/test.php';
$t->Go();
$tmp->setJS(array('jquery','lang','test/second','test/test','bootstrap'));
$tmp->setCSS(array('test'));
$tmp->setVar('title',$t->title);
$tmp->setVar('description','Тест по теме '.$t->title.', предмет '.$t->arr['sub_title']);
$tmp->setVar('JS_test',$t->generateJSTest($t->js));
$tmp->setVar('subject',$t->arr['sub_title']);
$tmp->setVar('category',$t->cat);
$tmp->setVar('theme',  stripslashes($t->arr['title']));
$tmp->setVar('count_test',$t->arr['count_pass']);
$tmp->setVar('user',$t->author);
$tmp->setVar('scale',$t->Scale($t->arr['count']));
$tmp->parse('test');
?>
