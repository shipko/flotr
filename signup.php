<?php
require('header.php');
require('classes/login.class.php');
	if(isset($_GET['act']) && $_GET['act'] == 'ajax') {
		switch($_GET['cat']) {
			case 'login':
				$m->isIssetLoginAjax($_POST['login']);
			break;
			case 'mail':
				$m->isIssetMailAjax($_POST['mail']);
			break;
		}
	
	} else if (isset($_GET['act']) && $_GET['act'] == 'do') {
		$name=$sec->filter($_POST['name'],30,'���������� ������ ���');
		$surname=$sec->filter($_POST['surname'],30,'���������� ������ �������');
		$login=$sec->filter($_POST['login'],25,'���������� ������ �������');
		$pass=$sec->filter($_POST['pass'],32,'���������� ������ ������');
		$mail=$sec->filter($_POST['email'],32,'���������� ������ e-mail');
		
		if (!$m->isIssetLogin($login)) {
			exit('����� ����� ��� ����������');
		}
		
		if (!$m->isIssetMail($mail)) {
			exit('����� e-mail ��� ����������');
		}
		
		$pass=$sec->salt($pass);
		$db->query('INSERT INTO user (`login`,`name`,`surname`,`pass`,`mail`,`priv`,`lastvisit`,`registered`,`ip`) VALUES ("'.$login.'","'.$name.'","'.$surname.'","'.$pass.'","'.$mail.'",3,'.time().','.time().',"'.$_SERVER['REMOTE_ADDR'].'")');
		// ������� ��� �������������
		$time = time() + 31536000;
		setcookie('id', mysql_insert_id(), $time);
		setcookie('pass', $pass, $time);
		$sec->head('home.php?welcome');
	}

    $tmp->setJS(array('jquery', 'reg'));
    /* ��������� ��� ����� */
    $count_tests=$db->query('SELECT id,subject FROM nametest WHERE `status`=2 AND `delete` != "2" ORDER BY subject');
    $arr_count=array();
    while($count_t=$db->fetch_array($count_tests)) {
            $arr_count[$count_t['subject']]['count']++;
    }

    /* �������� ��� �������� � ���������� �������� */
    $subject=$db->query('SELECT id,title FROM subject ORDER BY title');
    while($sub=$db->fetch_array($subject)) {
        $e.='<li class="header"><a href="subject.php?sec=subject&id='.$sub['id'].'"><span class="lead">'.$sub['title'].' ('.(isset($arr_count[$sub['id']]['count']) ? $arr_count[$sub['id']]['count'] : '0').')</span></a></li>';
    }

$tmp->setVar('title','�����������');
   
if (!empty($message))
	$tmp->setVar('message','<div class="alert alert-error">'.$message.'</div>');
else
	$tmp->setVar('message','');
	
$tmp->setVar('rightBar',$e);
//$tmp->setJS(array('bootstrap-alert'));
$tmp->parse('reg');
?>