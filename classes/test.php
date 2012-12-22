<?php
if(!defined('CMS'))die('Сюда нельзя');
require './classes/type.extend.php';
    $test_mode=!$sec->Settings();
class test extends Type {
    public $js=array(),
            $id,
            $title='',
            $author='',
            $arr,
            $arr_quest,
			$scale = array();
    /*
     * И так последовательность:
     * Проверка на существование теста(сразу же загружается тест и предмет)
     * Выборка из базы всех вопросов, которые относятся к этому тесту
     * Создание javascript массиа с вопросами и ответами
     * Вывод шаблона через функцию Template_type№
     */
    function Go() {
        global $db,$err,$sec,$other,$tmp;
        // Счетчик вопросов
        $count_scale=0;
        $id=$sec->ClearInt($_GET['id'],'Параметр id задан не верно');
        $this->getTest($id);
        $this->id=$id;
        $quest_and_ans=$db->query('SELECT q.id,q.ask,a.title,a.id AS aid, a.correct,q.type,q.code FROM question AS q INNER JOIN answers AS a ON q.id = a.question WHERE test='.$id.' AND q.delete = 1 AND a.delete = 1 ORDER BY q.id ',
        'Мы нашли тест, но вопросов к нему еще не добавили :(');
        $this->arr['count_pass']=$other->time->rulesTime($this->arr['count_pass'],array('раз','раза','раз'));
        
        $i='';
        while($w=$db->fetch_array($quest_and_ans)) {
            // Добавляем в массив ответ
            if ($i==$w['id']) {
                switch ($type) {
                    case '1':
                        $this->arr_quest['answers'][]=$this->typeOneYet($w);
                        break;
                    case '2':
                        exit('Произошла ошибка. Ответов больше чем должно быть!');
                        break;
					case '3':
                        $this->arr_quest['answers'][]=$this->typeThreeYet($w);
                        break;
                    default:
                        break;
                }
            }else {
                // Ответы кончились, забиваем их и переходим к следующему вопросу
                $i=$w['id'];
                $type=$w['type'];
                // тут начинается самое итересное. Происходит разделение тестов на типы.
                if(!empty($this->arr_quest)) {
                    $this->js['questions'][]=$this->arr_quest;
                    unset($this->arr_quest);
                }
				$arr_descr_title[]=$w['ask'];
                switch ($type) {
                    case '1':
                        $this->arr_quest=$this->typeOne($w);
                        break;
                    case '2':
                        $this->arr_quest=$this->typeTwo($w);
                        break;
					case '3':
                        $this->arr_quest=$this->typeThree($w);
                        break;
                    default:
                        continue;
                        break;
                }
            $this->arr['count']++;
            }
        }
        //shuffle($this->arr['answers']);
        $this->js['questions'][]=$this->arr_quest;
		
		// Для поисковика (description)
        array_splice($arr_descr_title,20);		
		$tmp->setVar('keywords',implode(',',$arr_descr_title));
		
        /* Порядок лучше не менять, иначе не будет разнообразия вопросов */
		//if ($this->arr['shuffle'] != '2') {
			shuffle($this->js['questions']);
			array_splice($this->js['questions'],20);
		//}
        
    }
    function generateJSTest($array) {
        return '<script type="text/javascript">var test_id = '.$this->id.' ,arr ='.json_encode($array).'</script>';
    }
    function charseTrue($str,$first='cp1251',$second='utf-8') {
        $str=iconv($first, $second, $str);
        if(!$str) {
            return 'error';
        }
        return $str;
    }
	
	function formula($str) {
		preg_match_all("|\[math\](.*?)\[\/math\]|", $str, $regs, PREG_SET_ORDER);
		foreach ($regs as $math) 
		{
			$t=str_replace('[math]','',$math[0]);
			$t=str_replace('[/math]','',$t);
			$t=htmlspecialchars_decode($t);
			$code='<img src="engine/other/mathematics/?string='.base64_encode($t).'" />';
			$str = str_replace($math[0], $code, $str);
		}
		return $str;
	}
	
    // Делаем квадратики внизу теста
    function Scale($count) {
       // if ($this->arr['shuffle'] != '2' && $count > 20) {
        if ($count > 20) {
            $count = 20;
        }
        for ($id=1; $id <= $count; $id++) {
            $sc.=$this->For_li($id);
        }
        return $sc;
    }
 
/* 
 * Функция отвечающая за выборку теста и предмета, к которому он принадлежит
 */
    function getTest($id) {
        global $db,$err;
        
        $this->arr=$db->query('SELECT n.title, n.user, n.count_pass, n.shuffle, s.title AS sub_title, u.name, u.surname, sc.title AS s_title FROM nametest AS n 
            INNER JOIN subject AS s ON n.subject=s.id 
            LEFT JOIN user AS u ON n.user = u.id 
            LEFT JOIN subject_category AS sc ON n.category = sc.id 
            WHERE n.id='.$id.' AND n.status="2" AND n.delete != 2',
        'Тест не найден',true);
        $this->title=$this->arr['title'];
        
        if (!empty($this->arr['s_title'])) {
            $this->cat = '<h3 class="page-header" style="padding: 0; margin-bottom: 7px;">Категория:</h3>
                <p class="lead">'.$this->arr['s_title'].'</p>';
        }
    }

    function SecBust($id) {
        $salt='this_test_have_'.$id.'_idsfml';
        $_SESSION['sec']=md5($salt);
        $_SESSION['asks']=array();
    }
    function For_li($id) {
        return '<button class="btn btn-small" id="'.$id.'">&nbsp;&nbsp;&nbsp;</button>';
    }
}
$t=new test;
?>