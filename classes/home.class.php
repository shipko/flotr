<?php
if(!defined('CMS'))die('Сюда нельзя');

class home {
	private $subject=false;
	
	function setSubject($sid) {
		global $sec;
		if (!empty($sid)) {
			$this->subject = $sec->ClearInt($sid);
		}
	}
	
	function getSubject() {
		return $this->subject;
	}
	
	function classTable($ball) {
		switch($ball) {
			case '5':
				return 'success';
			break;
			case '4':
				return 'info';
			break;
			case '3':
				return 'warning';
			break;
			case '2':
				return 'error';
			break;
		}
	}
	function getResult($id) {
		global $sec,$db,$other,$m;
		
		$id = $sec->ClearInt($id);
		if (empty($id)) {
			exit('empty');
		}
		if($m->user['priv'] < 3) {
			$result = $db->query('SELECT r.*,u.name,u.surname FROM result AS r LEFT JOIN user AS u ON r.user = u.id WHERE r.id = '.$id.' LIMIT 1');
		}
		else {
			$result = $db->query('SELECT * FROM result WHERE id = '.$id.' AND user = '.$m->user['id'].' LIMIT 1');
		}
		if ($db->num_rows($result) == 0) {
			exit('empty_db');
		}
		$arr = $db->fetch_array($result);
		
		$arrAnswerTitle = $this->queryAnswerTitle($arr['test']);
		
		$j = json_decode($arr['result']);
		foreach($j->result as $k=>$v) {
			$h .= '<button class="btn btn-mini btn-'.($v == 'true' ? 'success' : 'danger').'" title="'.$arrAnswerTitle[$k].'">&nbsp;&nbsp;</button>';
		}
		$html = '
			'.($m->user['priv'] < 3 ? '<strong>Пользователь:</strong>
			<span class="badge badge-success">'.$arr['surname'].' '.$arr['name'].'</span> <br> ' : '').'
			<strong>Оценка:</strong>
			<span class="badge badge-success">'.$j->ball.'</span> <br> 
			<strong>Правильный ответов:</strong> '.$j->true_answer.' ('.$j->percent.'%)<br>
			<strong>Тест пройден</strong> за '.$other->time->sumTime($arr['time']).'. </br >
			<strong>Дата прохождения:</strong> '.$other->time->fullDate($arr['time_exec']).'. </br >
			<strong>Ответы:</strong></br >
			<div class="btn-group">
				'.$h.'
			</div>';
			
		exit($html);
	}
	
	function getPupilsResult() {
		global $db,$other,$m;
		if ($this->getSubject()) {
			$where_mysql = 'WHERE nt.subject = '.$this->getSubject();
		}
		$result = $db->query('SELECT r.*, nt.title FROM result AS r LEFT JOIN nametest AS nt ON r.test = nt.id '.$where_mysql.' ORDER BY id DESC LIMIT 50');	
		if ($db->num_rows($result) > 0) {
			while($r = $db->fetch_array($result)) {
				$r['json']=json_decode($r['result']);
					$html_result .= '<tr class="'.$this->classTable($r['json']->ball).'">
							  <td><small>'.$other->time->fullDate($r['time_exec']).'<small></td>
							  <td>'.$r['title'].'</td>
							  <td>'.$r['json']->ball.'</td>
							  <td>
								<button class="full_result btn btn-small btn-info" type="button" rel="popover" data-id="'.$r['id'].'">Подробнее</button>
							  </td>
							</tr>';
				}
			} else {
					$html_result .= '<tr class="'.$this->classTable($r['json']->ball).'">
							  
							  <td colspan="4">
									По этому предмету еще не тестировались
							  </td>
							</tr>';
			}
		return $html_result;
	}
	
	function getMyResult() {
		global $db,$other,$m;
		if ($this->getSubject()) {
			$where_mysql = 'AND nt.subject = '.$this->getSubject();
		}
		$result = $db->query('SELECT r.*, nt.title FROM result AS r LEFT JOIN nametest AS nt ON r.test = nt.id WHERE r.user = '.$m->user['id'].' '.$where_mysql.' ORDER BY id DESC LIMIT 25');	
		if ($db->num_rows($result) > 0) {
			while($r = $db->fetch_array($result)) {
				$r['json']=json_decode($r['result']);
					$html_result .= '<tr class="'.$this->classTable($r['json']->ball).'">
							  <td><small>'.$other->time->fullDate($r['time_exec']).'<small></td>
							  <td>'.$r['title'].'</td>
							  <td>'.$r['json']->ball.'</td>
							  <td>
								<button class="full_result btn btn-small btn-info" type="button" rel="popover" data-id="'.$r['id'].'">Подробнее</button>
							  </td>
							</tr>';
				}
			} else {
					$html_result .= '<tr class="'.$this->classTable($r['json']->ball).'">
							  
							  <td colspan="4">
									По этому предмету Вы еще не тестировались
							  </td>
							</tr>';
			}
		return $html_result;
	}
	function queryAnswerTitle($id) {
		global $db;
		$query = $db->query('SELECT id, ask FROM question WHERE test = '.$id.'');
		while($a = $db->fetch_array($query)) {
			$arr[$a['id']]=$a['ask'];
		}
		return $arr;
	}
}

$home = new home;
?>