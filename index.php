<?php
require('header.php');
    /* Случайный тест */
    $count=$db->query('SELECT id FROM nametest WHERE `status`="2" AND `delete` != 2 ORDER BY rand() LIMIT 1',false,true);

    /* Посчитаем все тесты */
    $count_tests=$db->query('SELECT id,subject FROM nametest WHERE `status`=2 AND `delete` != "2" ORDER BY subject');
    $arr_count=array();
    while($count_t=$db->fetch_array($count_tests)) {
            $arr_count[$count_t['subject']]['count']++;
    }

    /* Выбираем все предметы и подсталяем значение */
    $subject=$db->query('SELECT id,title FROM subject ORDER BY title');
    while($sub=$db->fetch_array($subject)) {
        $e.='<li class="header"><a href="subject.php?sec=subject&id='.$sub['id'].'"><span class="lead">'.$sub['title'].' ('.(isset($arr_count[$sub['id']]['count']) ? $arr_count[$sub['id']]['count'] : '0').')</span></a></li>';
    }
$tmp->setVar('title','Главная');
$tmp->setVar('description','Сайт позволяет пройти тестирование любому желающему, а также получить оценку за пройденный тест');
$tmp->setVar('keywords','тесты, сфмл, северск, северский физико-математический лицей, 194 школа, история, школа, предметы, тесты по предмету, Муковкин Дмитрий, тестирование, ЕГЭ, ГИА, выставление оценки, sfml, простота');
$tmp->setVar('rightBar',$e);
$tmp->setVar('rand',$count['id']);
$tmp->parse('index');
?>