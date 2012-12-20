<?php
require('header.php');
require('classes/home.class.php');
// �������� ���� ������������������� �������������
if(!$m->isUser()) {
	$sec->head('login.php');
}
/* Ajax ������� */
if(isset($_GET['act']) && $_GET['act'] == 'get_result') {
	$home->getResult($_POST['id']);
}
// ���������� �������
$home->setSubject($_GET['sid']);
/* �������� ��� �������� � ���������� �������� */
$subject=$db->query('SELECT id,title FROM subject ORDER BY title');
while($sub=$db->fetch_array($subject)) {
	$e.='<li '.($home->getSubject() == $sub['id'] ? 'class="active"' : '').'><a href="home.php?sid='.$sub['id'].'"><span class="lead">'.$sub['title'].'</span></a></li>';
}
// ����� ������� �������� ������� ��� ������� 
if (($m->user['priv'] < 3)) {
		$html_result = $home->getPupilsResult();
}
else {
	$html_result = $home->getMyResult();
}

	
	
$tmp->setJS(array('bootstrap-tooltip','bootstrap-popover','home'));
$tmp->setVar('title','������ �������');
$tmp->setVar('rightBar',$e);

$tmp->setVar('result',$html_result);
$tmp->setVar('JS_CODE',"");
$tmp->setVar('rand',$count['id']);
$tmp->parse('home');
?>