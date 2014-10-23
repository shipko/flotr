<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subject
 *
 * @author Дмитрий
 */
class subject {
    function SubjectId($id) {
        global $sec, $db, $tmp;
        $id=$sec->ClearInt($id,'Параметр не найден');

        $subject=$db->query('SELECT title FROM subject WHERE id="'.$id.'" LIMIT 1','Предмет не найден',true);

        $category = $db->query('SELECT id,title FROM subject_category WHERE subject = '.$id.'');
        
        $s=$db->query('SELECT * FROM nametest WHERE `subject`="'.$id.'" AND `status`="2" AND `delete` !=2 ORDER BY title');
        
        if($db->num_rows($s) == 0) {
            $subject['text'].='<h2>Тесты не найдены</h2>';
        } else {
            $subject['text']='<ul class="unstyled">';
            while($arr=$db->fetch_array($s)) {
                $array[$arr['category']][] = array('id' => $arr['id'], 'title' => $arr['title']);
				$array_keywords[]=$arr['title'];
            }

            while($cat = $db->fetch_array($category)) {
                if (count($array[$cat['id']]) != 0) {
                    $subject['text'].='<h4>'.$cat['title'].'</h4>
                        <ul style="list-style-type: none">';
                    foreach($array[$cat['id']] as $k => $v) {
                        
                        $subject['text'].='<li class="sub" style="font-size: 14px;"><a href="test.php?id='.$v['id'].'">'.$v['title'].'</a></li>';
                    }
                    $subject['text'].='</ul>';
                }
            }
            if (!empty($array[0])) {
                $subject['text'].='<h4>Без категории</h4>
                    <ul style="list-style-type: none">';
                foreach($array[0] as $k => $v) {
                    $subject['text'].='<li class="sub" style="font-size: 14px;"><a href="test.php?id='.$v['id'].'">'.$v['title'].'</a></li>';
                }
                $subject['text'].='</ul>';
            }
        }
		$tmp->setVar('description','Все добавленные тесты по предмету '.$subject['title']);

		$tmp->setVar('keywords',implode(',',(!$array_keywords ? array() : $array_keywords)));
        return $subject;
    }

    function SubjectList() {
        global $sec, $db,$tmp;

        $subject=$db->query('SELECT n.id,n.title, s.title AS sub_title FROM nametest AS n INNER JOIN subject AS s ON n.subject=s.id WHERE n.status="2" AND n.delete!=2 ORDER BY id DESC LIMIT 50');

        if($db->num_rows($subject) == 0) {
            $c='<h2>Тесты не найдены</h2>';
        } else {
            $c.='<ul class="unstyled">';
        while($arr=$db->fetch_array($subject)) {
            $c.='<li class="sub"><h5><a href="test.php?id='.$arr['id'].'" style="color: #333">'.$arr['title'].'</a></h5></li>';
			$array_keywords[]=$arr['title'];
        }
            $c.='</ul>';
        }
		$tmp->setVar('description','Последние 50 добавленных тестов.');
		$tmp->setVar('keywords',implode(',',$array_keywords));
        return $c;
    }
}
$s=new subject;
?>
