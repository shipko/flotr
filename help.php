<?php
require 'header.php';
switch ($_GET['sec']) {
    case 'copyright':
        $tmp->setVar('title','������� �����������');
        $tmp->parse('copyright');
        break;
    case 'addtest':
        $tmp->setVar('title','������ �� ���������� ����� �� ����');
        $tmp->parse('help_addtest');
        break;
    default:
        break;
}

?>
