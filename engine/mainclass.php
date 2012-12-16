<?php
if(!defined('CMS'))die('Сюда нельзя');
class Mainclass {
	public $user = array();
	function __construct() {
		global $tmp;
		if ($this->isUser()) {
			$array = array(
				'1' => 'Админ-панель',
				'2' => 'Тесты'
			);
			$admin = '';
			if ($this->user['priv'] <= 2) {
				$admin = '<li class="nav-header">Управление</li>';
				$admin .= '<li><a href="admin">'.$array[$this->user['priv']].'</a></li>';
			}
			$tmp->setVar('header_user','<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$this->user['name'].' '.$this->user['surname'].'<b class="caret"></b></a>
                <ul class="dropdown-menu">
				  '.$admin.'
                  <li><a href="settings.php">Настройки</a></li>
                  <li class="divider"></li>
				  <li><a href="login.php?act=logout">Выход</a></li>
                </ul>');
			$tmp->setJS(array('jquery'));
		}
		else {
			$tmp->setVar('header_user','<a href="login.php" class="dropdown-toggle" data-toggle="dropdown">Вход</a>
			<ul class="dropdown-menu">
			  <li><a href="login.php">Вход</a></li>
			  <li><a href="signup.php">Регистрация</a></li>
			  <li><a href="login.php?act=restore">Забыли пароль</a></li>
			</ul>');
			$tmp->setJS(array('jquery'));
		}
    }
	
	function isUser() {
		global $sec,$db;
        if ($this->isIssetCookie()) {
            $query = $db->query('SELECT * FROM user WHERE id=' . $this->user['id'] . '');
            if ($db->num_rows($query) == 1) {
                $user = $db->fetch_array($query);

                if ($user['pass'] == $this->user['pass']) {
                    $this->user = $user;
                    $this->UpdateLastVisit();
					$this->UpdateCookie();
                    return true;
                } else {
                    $sec->ClearCookie();
                }
            } else {
                $sec->ClearCookie();
            }
        } else {
            $sec->ClearCookie();
        }
		return false;
	}
	    
    function isIssetCookie() {
        global $sec;
        if ($sec->filter($_COOKIE['id']) && $sec->filter($_COOKIE['pass'])) {
            $this->user['id'] = $sec->ClearInt($_COOKIE['id']);
            $this->user['pass'] = $sec->filter($_COOKIE['pass']);
            return true;
        }
        else
            return false;
    }
	
	function LogOut() {
        global $sec;
        $sec->ClearCookie();
    }
	
	function UpdateLastVisit() {
        global $db;
        $db->query('UPDATE user SET lastvisit="' . time() . '", ip="'.$_SERVER['REMOTE_ADDR'].'" WHERE id = "' . $this->user['id'] . '"');
    }
	function UpdateCookie() {
		setcookie('id', $this->user['id'], time() + 3600);
        setcookie('pass', $this->user['pass'], time() + 3600);
	}
	function isIssetLogin($login) {
		global $sec,$db;
		$login = $sec->filter($login, 25,'Не введено поле логин'); 
		$res=$db->query('SELECT id FROM user WHERE login="'.$login.'" LIMIT 1');
		if($db->num_rows($res) == 0){
			return true;
		}
		else {
			return false;
		}
	}
	function isIssetLoginAjax($login) {
		global $sec,$db;
		$login = $sec->filter($login, 25); 
		if (empty($login)) {
			exit ("no");
		}
		$res=$db->query('SELECT id FROM user WHERE login="'.$login.'" LIMIT 1');
		if($db->num_rows($res) == 0){
			exit ("yes");
		}
		else {
			exit ("no");
		}
	}
	function isIssetMail($mail) {
		global $sec,$db;
		$email = $sec->filter($mail, 25,'Не введено поле логин');
		if(!$sec->isMail($email)) {
			return false;
		}
		$res=$db->query('SELECT id FROM user WHERE mail="'.$email.'" LIMIT 1');
		if($db->num_rows($res) == 0) {
			return true;
		}
		else {
			return false;
		}
	}
	function isIssetMailAjax($mail) {
		global $sec,$db;
		$email = $sec->filter($mail, 25);
		if (empty($email)) {
			exit ("no");
		}
		if(!$sec->isMail($email)) {
			exit('no valid');
		}
		$res=$db->query('SELECT id FROM user WHERE mail="'.$email.'" LIMIT 1');
		if($db->num_rows($res) == 0) {
			exit ("yes");
		}
		else {
			exit ("no");
		}
	}
}
$m = new Mainclass();
?>
