<?php
require('header.php');
    /* ��������� ���� */
    $count=$db->query('SELECT id FROM nametest WHERE `status`="2" AND `delete` != 2 ORDER BY rand() LIMIT 1',false,true);

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
$tmp->setVar('title','�������');
$tmp->setVar('description','���� ��������� ������ ������������ ������ ���������, � ����� �������� ������ �� ���������� ����');
$tmp->setVar('keywords','�����, ����, �������, ��������� ������-�������������� �����, 194 �����, �������, �����, ��������, ����� �� ��������, �������� �������, ������������, ���, ���, ����������� ������, sfml, ��������');
$tmp->setVar('rightBar',$e);
$tmp->setVar('rand',$count['id']);
$tmp->parse('index');
?>