<?php
/**
 * Description of index
 *
 * @author Дом
 */
class index {
    
    function __construct() {
        
    }
    public function resultMain() {
        global $tmp, $db;
		
        $tmp->setVar('title','Список результатов');
		$res = $db->query('SELECT r.*, u.name, u.surname, n.title FROM result AS r 
			INNER JOIN user AS u ON r.user = u.id
			INNER JOIN nametest AS n ON r.test = n.id
			','Никто не проходил тестирование');
		$html = '
			<table class="table" style="text-align: left; margin: 0 0 0 20px;">
				<thead>
					<tr>
					  <th>Фамилия, Имя</th>
					  <th>Тест</th>
					  <th>Время</th>
					  <th>Оценка</th>
					  <th>Функции</th>
					</tr>
				</thead>
				<tbody>';
		while($r = $db->fetch_array($res)) {
		$json = json_decode($r['result']);
		$i=30;
        if (strlen($r['title']) > $i) {
            $r['title']=substr($r['title'], 0, $i).'...';
        }
			$html .= '
				<tr>
					<td><a href="result.php?cat=user&id='.$r['id'].'">'.$r['surname'].' '.$r['name'].'</a></td>
					<td><a href="test.php?sec=edit&cat=list&id='.$r['test'].'">'.$r['title'].'</a></td>
					<td>'.$r['time'].'</td>
					<td>'.$json->ball.' ('.$json->percent.'%)</td>
					<td><a href="result.php?cat=user&id='.$r['id'].'" style="color: #69C;">Подробнее</a></td>
                </tr>';
		}
		$tmp->setVar('ListResult',$html);
		$tmp->setCSS(array('bootstrap'));
    }
}

?>