<?php
define('CMS', true);
define('PA', '../admin/');
require PA.'engine/classes/mainclass.php';
$other->count=new Count;
$mainclass->isAdmin();
$mainclass->setSettings();
$tablets = '��� ����������� ������ � �����-������ ��� ��������� ������ ���� e-mail �����.</br> �� ����������� ��� ��� �������� ����������, � ����� ��� ����� � ����.';
if ($mainclass->user['priv']== '1') {
    $testMode='<div class="settings_table"><div class="title">Test mode:</div><div class="text">'.$mainclass->SetTestMode().'</div></div>';    
}
$tmp->setVar('id',$mainclass->user['id']);
$tmp->setVar('HelloUser',$mainclass->HelloUser($mainclass->user['name']));
$tmp->setVar('Tablets',$tablets);
$tmp->setVar('TestMode',$testMode);
$tmp->setVar('CountTest',$other->count->countTestWrite());
$tmp->setVar('CountAdmin',$other->count->countAdmin());
$tmp->setVar('title','�����-������');
$tmp->setCSS(array('main'));
$tmp->parse('main');
?>
