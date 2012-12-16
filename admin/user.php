<?php
define('CMS', true);
define('A', '../admin/');
require A.'engine/classes/mainclass.php';
$mainclass->isAdmin();
require A.'engine/classes/user.class.php';

if (isset($_GET['m'])) {
    require A.'engine/classes/message.class.php';
    $message=$m->GetError($_GET['m']);
}
switch ($_GET['sec']) {
        case 'add':
                    $mainclass->AssetsUser(array('1'));
                    $title='���������� ������ ��������������';
                    $page='user_add';
            break;
        case 'edit':
                    $id=$sec->ClearInt($_GET['id'],' id �� ���������');
                    if($id != $mainclass->user['id']) {
                        $mainclass->AssetsUser(array('1'));
                    }
                    
                    $title='�������������� �������';
                    $user->userEdit($id);
                    $page='user_edit';
            break;
        case 'profile':
            $id=(int)$_GET['id'];
            if($id != $mainclass->user['id']) {
                $mainclass->AssetsUser(array('1'));
            }
            else {
                $this_you = '(��� ��)';
            }
            $title='���������� ������ ��������������';
            $page='profile';
            $user_info=$user->Profile($id);
            if ($mainclass->AssetsUser(array('1'),true) && $id != $mainclass->user['id'] ) {
                $delete = '<div style="float: right; margin-right: 20px;"><a href="user.php?act=delete&id='.$id.'">(�������)</a></div>';
            }
            
            $tmp->setVar('Delete',$delete);
            $tmp->setVar('id',$user_info['id']);
            $tmp->setVar('User',$user_info['surname'].' '.$user_info['name'].' '.$this_you);
            $tmp->setVar('lastvisit',$other->time->fullDate($user_info['lastvisit']));
            $tmp->setVar('registered',$other->time->fullDate($user_info['registered']));
            $tmp->setVar('ListTests',$user->ListAddTests($id));
            $tmp->setVar('title',$title);
            $content='';
            break;
        default:
                    $page='user';
            
                    $mainclass->AssetsUser(array('1'));
                    
                    $title='������ ���������������';
                    $content.='<div class="headi" style="margin: 10px 10px 0 10px; height: 10px;">������ ���������������</div>
   <table width="100%" border="0">
     <tr><span style="color: #323232; font-size: 14px; margin-left: 10px"><a href="user.php?sec=add" style="color: #69C">(�������� ������)</a></span></tr>  
     <tr><ul class="test">'.$user->adminsList().'</ul></tr>
   </table>';
            break;
}

if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'add':
                $mainclass->AssetsUser(array('1'));
                $content.=$user->AddUser();
                break;
            case 'edit':
                $id=(int)$_GET['id'];
                
                if($id != $mainclass->user['id']) {
                    $mainclass->AssetsUser(array('1'));
                }
                $content.=$user->EditUser($id);
                break;
            case 'delete':
                $id=(int)$_GET['id'];
                $mainclass->AssetsUser(array('1'));
                if($id == $mainclass->user['id']) {
                    return $sec->head('user.php?m=10');
                }
                
                $content.=$user->DeleteUser($id);
                break;
            default:
                $content='�� ���� ����� ������ ���������� �����-�� �����, �� �.�. ��� ������ ������, �� �� ����������� ������ ����';
                break;
    }
}
$tmp->setCSS(array('main','li'));
$tmp->setJS(array('jquery','bouncebox','message'));
$tmp->setVar('title',$title);
$tmp->setVar('message',$message);
$tmp->setVar('content',$content);
$tmp->parse($page);
?>
