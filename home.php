<?php
require('header.php');
require('classes/home.class.php');
// Отсекаем всех незарегистированных пользователей
if(!$m->isUser()) {
	$sec->head('login.php');
}
/* Ajax запросы */
if(isset($_GET['act']) && $_GET['act'] == 'get_result') {
	$home->getResult($_POST['id']);
}
// Определяем предмет
$home->setSubject($_GET['sid']);
/* Выбираем все предметы и подсталяем значение */
$subject=$db->query('SELECT id,title FROM subject ORDER BY title');
while($sub=$db->fetch_array($subject)) {
	$e.='<li '.($home->getSubject() == $sub['id'] ? 'class="active"' : '').'><a href="home.php?sid='.$sub['id'].'"><span class="lead">'.$sub['title'].'</span></a></li>';
}
// Выбор личного кабинета ученика или учителя 
if (($m->user['priv'] < 3)) {
		$html_result = $home->getPupilsResult();
}
else {
	$html_result = $home->getMyResult();
}

	
	
$tmp->setJS(array('bootstrap-tooltip','bootstrap-popover','home'));
$tmp->setVar('title','Личный кабинет');
$tmp->setVar('rightBar',$e);
$tmp->setVar('username',$m->user['name']);
$tmp->setVar('result',$html_result);
$tmp->setVar('JS_CODE',"");
$tmp->setVar('rand',$count['id']);
$tmp->parse('home');
?>