<?php
define('A', '../admin/');
require A.'engine/classes/mainclass.php';

$mainclass->isAdmin();
$mainclass->AssetsUser(array('1'));
require A.'engine/classes/other/secondary.class.php';
if (isset($_GET['m'])) {
    require A.'engine/classes/message.class.php';
    $content=$m->GetError($_GET['m']);
}
require A.'engine/classes/answer.class.php';

switch ($_GET['cat']) {
    case 'list':
        $title='�������������� ����� | C����� ������';

        $content.=$test->ListTest($_GET['sid']);
        break;
    case 'test':
        $title='�������������� ��������';
        $tmp->setJS(array('edittest'));
        $content.=$test->TestId($_GET['id']);
        break;
    case 'answer':
        $title='�������������� �������';
        $tmp->setJS(array('jquery.filedrop','fileupload','addanswers'));
        $content.=$test->EditQuestion($_GET['id']);
        break;
    case 'nametest':
        $title='�������������� �����';
        $content.=$test->NameTest($_GET['id']);
        break;
    default:
        $title='�������������� ����� | C����� ���������';
        $content.=$test->ListSubject();
        break;
    }

$tmp->setCSS(array('main','li'));
$tmp->setVar('content',$content);
$tmp->setVar('title',$title);
$tmp->Parse('test');
?>
