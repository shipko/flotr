<?php
define('CMS', true);
define('A', '../admin/');
require A.'engine/classes/mainclass.php';

$mainclass->isAdmin();
require A.'engine/classes/other/secondary.class.php';
require A.'engine/classes/message.class.php';
if (isset($_GET['m'])) {
    $content=$m->GetError($_GET['m']);
}
if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'addtest':
                require A.'engine/classes/testadd.class.php';
                $content.=$test->AddTest();
                break;
            case 'addquestion':
                require A.'engine/classes/testadd.class.php';
                $title='���������� ��������';
                $tmp->setJS(array('addanswers','spisok'));
                $content.=$test->AddQuestionSecond($_GET['id']);
                break;
            case 'editquest':
                require A.'engine/classes/testedit.class.php';
                $content .= $test->EditQuest($_GET['id']);
                break;
            case 'deltest':
                require A.'engine/classes/testdel.class.php';
                $content.=$test->DelOneTest($_GET['id']);
                break;
            case 'delquest':
                require A.'engine/classes/testdel.class.php';
                $content.=$test->DelOneQuest($_GET['id']);
                break;
            case 'editest':
                require A.'engine/classes/testedit.class.php';
                $content.=$test->EditTest($_GET['id']);
                break;
            default:
                $content.='�� ���� ����� ������ ���������� �����-�� �����, �� �.�. ��� ������ ������, �� �� ����������� ������ ����';
                break;
    }
}
else {
    switch ($_GET['sec']) {
        case 'add':
            require A.'engine/classes/testadd.class.php';
            switch ($_GET['cat']) {
                case 'test':
                    $content.=$test->AddTestWrite();
                    break;
                case 'question':
                    $title='���������� ��������';
                    $tmp->setJS(array('addanswers','jquery.filedrop','fileupload','file'));
                    $content.=$test->AddQuestion($_GET['id']);
                    break;
                default:
                    $title='���������� �����';
                    $content.=$test->AddTestWrite();
                    break;
                }
            break;
        case 'edit':
            require A.'engine/classes/testedit.class.php';
            $tmp->setCSS(array('li'));
            switch ($_GET['cat']) {
                case 'list':
                    $title='�������������� ����� | C����� ������';
                    $content.=$test->ListTest($_GET['sid']);
                    break;
                case 'test':
                    $title='�������������� ��������';
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
            break;
            break;
        case 'delete':
            require A.'engine/classes/testedit.class.php';
            $tmp->setCSS(array('li'));

            switch ($_GET['cat']) {
                case 'list':
                    $title='�������������� ����� | C����� ������';
                    $content.=$test->ListTest($_GET['sid']);
                    break;
                case 'test':
                    $tmp->setJS(array('edittest'));
                    $title='�������������� ��������';
                    $content.=$test->TestId($_GET['id']);
                    break;
                case 'answer':
                    $title='�������������� �������';
                    $tmp->setJS(array('addanswers'));
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
            break;
            break;
        default:
            $content.='�� ���� ����� ������ ���������� �����-�� �����, �� �.�. ��� ������ ������, �� �� ����������� ������ ����';
            break;
    }
}
$tmp->setCSS(array('main'));
$tmp->setVar('content',$content);
$tmp->setVar('title',$title);
$tmp->Parse('test');
?>
