<?php
class Security {
    function head($s='index.php') {
        header("Location: $s");
        exit();
    }
    /*
     * $l - длина строки
     */
    function filter($str,$l=false,$err_str=false) {
        global $err,$tmp;
        if($err_str) {
            if (empty($str)) {
                $tmp->GNC($err_str);
            }
        }
        $str=mysql_real_escape_string(addslashes(htmlspecialchars(trim($str))));
        if($l) {
            $str=substr($str,0,$l);
        }
        return $str;
    }

    function ClearInt($number,$str=false) {
        global $tmp;
        $number=(int)$number;
        if (empty($number) && $str) {
            $tmp->GNC($str);
            exit();
        }
        return $number;
    }

    function notLink($link) {
        return str_replace('://', '', $link);
    }

    function salt($str) {
        $salt='abcmsfml';
        return md5($str.$salt);
    }
	
	function checkAccess($priv,$arr) {
		foreach($arr as $k) {
			if ($k == $priv) {
				return true;
			}
		}
		return false;
	}
	
    function ClearCookie() {
		setcookie('id', '', time()-60);
		setcookie('pass', '', time()-60);
		return true;
    }
    function isMail($email) {
         return preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email));
    }
    function Settings() {
        global $db;
        $test_mode = $db->query('SELECT value FROM settings WHERE cat = "test_mode" LIMIT 1',false,true);
        if ($test_mode['value'] == '1') {
            return true;
        }
        return false;
    }

}
$sec=new Security();
?>
