<?php

/*
 * @author Муковкин Дмитрий
 */

class check_test {

    function charseTrue($str, $first = 'cp1251', $second = 'utf-8') {
        $str = iconv($first, $second, $str);
        if (!$str) {
            return 'error';
        }
        return $str;
    }

    /* Проверка теста */

    function TestId($id) {
        global $db, $sec;
        $id = $sec->ClearInt($id, 'Security breach: id');
        $type = $sec->ClearInt($_GET['type'], 'Security breach: type');
        switch ($type) {
            case '1':
                $c = $db->query('SELECT question,correct FROM answers WHERE id="' . $id . '"', 'empty',true);
                $this->retBool($c['question'],($c['correct'] == '2'));
                break;
            case '2':
                //переведем и кодировку
                $value = $this->charseTrue($_POST['value'], 'utf-8', 'cp1251');
                // т.к. очищаем
				
                $value = $sec->filter($this->st2lower(trim($value)));
                // а теперь защитимся
                
                $answer = $db->query('SELECT title,question FROM answers WHERE id="' . $id . '"');
                if ($db->num_rows($answer) == 0) {
                    return 'empty2';
                }
                $q = $db->fetch_array($answer);
                $ans = $this->st2lower($q['title']);
				
				$this->retBool($q['question'],($ans == $value));
				
                break;
			case '3':
				// Считываем id теста
				$id = $sec->ClearInt($_POST['test'],'Security breach: test id');
				
				foreach($_POST['id'] as $k => $v) {
					$array[$sec->ClearInt($v,'Security breach: id')] = true;
				}
				// Защита от не множественного выбора
				if(count($array) < 2) {
					exit('Security breach: count array');
				}
                $answer = $db->query('SELECT id FROM answers WHERE question='.$id.' AND correct = 2');
                if ($db->num_rows($answer) == 0) {
                    return 'empty query';
                }
                while($q = $db->fetch_array($answer)) {
					if(!isset($array[$q['id']])) 
						$this->retBool($id,false);
						
					unset($array[$q['id']]);
				}
				if(count($array) > 0) {
					$this->retBool($id,false);
				}
				$this->retBool($id,true);				
                break;
            default:
                return 'false';
                break;
        }
    }
	
	function retBool($id,$bool) {
		$arr = array('id' => $id);
		if ($bool) {
			$arr['bool'] = 'true';
		} else {
			$arr['bool'] = 'false';
		}
		exit(json_encode($arr));
	}

    function st2lower($st) {
        return(strtolower(strtr($st, "АБВГДЕЁЖЗИЙКЛМHОРПСТУФХЦЧШЩЪЬЫЭЮЯ", "абвгдеёжзийклмнорпстуфхцчшщъьыэюя")));
    }

    function countPlus($id) {
        global $db, $sec;
        $query = $db->query('SELECT count_pass FROM nametest WHERE id = ' . $id . '', 'Тест не найден', true);

        $db->query('UPDATE nametest SET count_pass = count_pass + 1 WHERE id = ' . $id . '');
    }
    
	function checkResult() {
		global $m, $db, $sec;
		$id = $sec->ClearInt($_POST['id'], 'Security breach result: id');
		$time = $sec->ClearInt($_POST['time'], 'Security breach result: time');
		$percent = $sec->ClearInt($_POST['percent']);
		$true_answer = $sec->ClearInt($_POST['true_answer']);
		if($time > 86400) {
			exit('Security breach: time');
		}
		
		if(!isset($_POST['array']) || !is_array($_POST['array'])){
			exit('Security breach: result');
		}
		$array_answer = array();
		foreach($_POST['array'] as $k => $v) {
			$idAnswer = $sec->ClearInt($k);
			if ($v == 'true') 
				$array_answer[$idAnswer]='true';
			else 
				$array_answer[$idAnswer]='false';
		}
		
		$this->countPlus($id);
		$ball = $this->getBall($percent,$id);

		$arr = array(
			'ball' => $ball,
			'percent' => $percent,
			'true_answer' => $true_answer,
			'result' => $array_answer
		);
		if(isset($m->user['id'])) {
			$db->query("INSERT INTO result (`test`,`user`,`time`,`result`,`time_exec`) VALUES (".$id.",".$m->user['id'].",".$time.",'".json_encode($arr)."',".time().")");
		}
		return $ball;
		
	}
    function getBall($percent,$id) {
        global $db, $sec;
        $percent = $sec->ClearInt($percent);
        $id = $sec->ClearInt($id,'Нет идентификатора');
		
		if ($percent > 100 || $percent < 0) {
			exit('Security breach: range of numbers');
		}
		
        $test = $db->query('SELECT subject FROM nametest WHERE id = '.$id.'','Тест отсутствует',true);
        $f = $db->query('SELECT factor FROM factors WHERE (test_id = '.$id.' AND subject_id = '.$test['subject'].') OR subject_id = '.$test['subject'].' ORDER BY id DESC','Критерии не найдены',true);
        
        $fac = json_decode($f['factor']);
        
        if ($this->transformNum($fac->factor[2]) <= $percent) {
            return '5';
        } else if ($this->transformNum($fac->factor[1]) <= $percent) {
            return '4';
        } else if ($this->transformNum($fac->factor[0]) <= $percent) {
            return '3';
        } else {
            return '2';
        }
        
    } 
    function transformNum($int) {
        global $sec;
        $int = $sec->ClearInt($int);
        $num = $int * 5;
        return $num;
    }
}

$c = new check_test;
?>
