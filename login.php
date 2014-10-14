<?php
require('header.php');
require('classes/login.class.php');
if ($_GET['act'] == 'login') {
	$message = $l->CheckLogin();
} else if ($_GET['act'] == 'logout') {
	$l->LogOut();
}
    /* Посчитаем все тесты */
    $count_tests=$db->query('SELECT id,subject FROM nametest WHERE `status`=2 AND `delete` != "2" ORDER BY subject');
    $arr_count=array();
    while($count_t=$db->fetch_array($count_tests)) {
            $arr_count[$count_t['subject']]['count']++;
    }

    /* Выбираем все предметы и подсталяем значение */
    $subject=$db->query('SELECT id,title FROM subject ORDER BY title');
    while($sub=$db->fetch_array($subject)) {
       $e.='<li class="header"><a href="subject.php?sec=subject&id='.$sub['id'].'"><span class="lead">'.$sub['title'].' ('.(isset($arr_count[$sub['id']]['count']) ? $arr_count[$sub['id']]['count'] : '0').')</span></a></li>';
    }

$tmp->setVar('title','Вход в личный кабинет');

if (!empty($message))
	$tmp->setVar('message','<div class="alert alert-error">'.$message.'</div>');
else
	$tmp->setVar('message','');
	
$tmp->setVar('rightBar',$e);
//$tmp->setJS(array('bootstrap-alert'));
$tmp->parse('login');
?>