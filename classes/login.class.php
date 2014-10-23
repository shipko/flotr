<?php
if(!defined('CMS'))die('Сюда нельзя');
class Login {
	function CheckLogin() {
		global $sec, $db;
		$login = $sec->filter($_POST['login'], 25,'Не введено поле логин');
		$pass = $sec->filter($_POST['pass'], 25,'Поле пароль не заполнено');
		$check = ((int)$_POST['alien']==2) ? '2' : '1';
		
		$login = strtolower($login);
		$pass = $sec->salt($pass);
		$query = $db->query('SELECT id,pass FROM user WHERE login="' . $login . '" LIMIT 1');
		if ($db->num_rows($query) == 0) {
			return 'Неверное имя пользователя или пароль.';
		} 
		else {
			$query = $db->fetch_array($query);
			if ($query['pass'] == $pass) {
				$time = time() + 30 * 24 * 36000;
				if ($check == 2) {
					$time = 0;
				}
				setcookie('id', $query['id'], $time);
				setcookie('pass', $query['pass'], $time);
				$sec->head('home.php');
			}
			return 'Неверное имя пользователя или пароль.';
		}
	}
	
	function LogOut() {
		global $sec;
        $sec->ClearCookie();
		$sec->head('index.php');
	}
}
$l = new Login;
?>