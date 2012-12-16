<?php
class index {
    public
        $arrayText = array();
    function subjectMain() {
        global $db,$tmp;
            $sub_query=$db->query('SELECT * FROM subject ORDER BY title','��������� ������ � ������� ���������');
            while($subject=$db->fetch_array($sub_query)) {
                $list_sub.='
                <li class="sub">
                    <a href="subject.php?cat=sub&id='.$subject['id'].'">'.$subject['title'].'</a>
                    <a href="subject.php?cat=sedit&id='.$subject['id'].'" style="font-size: 14px; color: #CD1B1B; margin-bottom: 3px;">(��������)</a>
                </li>';
            }
            $tmp->setVar('title','������ ���������');
            $tmp->setVar('ListSubject',$list_sub);
    }
    
    function subjectSub() {
        global $db,$sec,$tmp;
            $id = $sec->ClearInt($_GET['id'],'�������� ����� �������');
            $subject = $db->query('SELECT title FROM subject WHERE id = "'.$id.'"','������ �������� �� ����������',true);

            $query_cat = $db->query('SELECT id,title FROM subject_category WHERE subject = "'.$id.'"','��������� � �������� �� ����������</br><a href="subject.php?cat=add&sid='.$id.'" style="color: #2D76B9">��������</a>');
            while($cat = $db->fetch_array($query_cat)) {
                $html.='<li class="sub"><a href="subject.php?cat=edit&id='.$cat['id'].'">'.$cat['title'].'</a> <a href="subject.php?cat=delete&id='.$cat['id'].'" style="font-size: 14px; color: #CD1B1B; margin-bottom: 3px;">(�������)</a></li>';
            }
            $tmp->setVar('title','������ ���������');
            $tmp->setVar('subject',$subject['title']);
            $tmp->setVar('ListCat',$html);
            $tmp->setVar('id',$id);
    }
    function subjectSedit() {
        global $db,$sec,$tmp;
        if (isset($_GET['do'])) {
            $this->EditSubject();
        }
        $id = $sec->ClearInt($_GET['id'], '������ ���������');
        $sub_query=$db->query('SELECT * FROM subject WHERE id = '.$id.'','��������� ������ � ������� ��������',true);
        $factor = $db->query('SELECT id,factor FROM factors WHERE subject_id = '.$id.' LIMIT 1');
            
            if ($db->num_rows($factor) == 0) {
                unset($factor);
                $factor['factor'] = '{"factor":[6,11,16]}';
            }
            else {
                $factor = $db->fetch_array($factor);
            }
            $f = json_decode($factor['factor']);

        $tmp->setVar('factor3',$f->factor[0]);
        $tmp->setVar('factor4',$f->factor[1]);
        $tmp->setVar('factor5',$f->factor[2]);
        $tmp->setVar('ListSubject',$list_sub);
        $tmp->setVar('title','�������������� ��������');
        $tmp->setVar('i_title',$sub_query['title']);
        $tmp->setVar('id',$sec->ClearInt($_GET['id']));
        $tmp->setCSS(array('mark'));
        $tmp->setJS(array('mark'));
    }
    function subjectAdd() {
        global $db,$sec,$tmp;
        if (isset($_GET['do'])) {
            $this->AddCat();
        }
        $sub_query=$db->query('SELECT * FROM subject ORDER BY title','��������� ������ � ������� ���������');
        
        $sid = $sec->ClearInt($_GET['sid']);
        
        while($subject=$db->fetch_array($sub_query)) {
            $list_sub.="<option value='{$subject['id']}'".($subject['id'] == $sid ? ' selected' : '').">{$subject['title']}</option>\n";
        }
        
        $tmp->setVar('ListSubject',$list_sub);
        $tmp->setVar('title','���������� ���������');
        $tmp->setVar('id',$sec->ClearInt($_GET['sid']));
    }
    function subjectEdit() {
        global $db,$sec,$tmp;
        if (isset($_GET['do'])) {
            $this->EditCat();
        }
        else if (isset($_GET['id'])) {
            $id = $sec->ClearInt($_GET['id'],'��� ��������� ����������');
            $sub_query=$db->query('SELECT * FROM subject_category WHERE id='.$id.'','��������� ������ � ������� ���������',true);
            $sid = $sub_query['subject'];
            $title = $sub_query['title'];
            $act = 'edit_cat&id='.$id;
            $sub_query=$db->query('SELECT * FROM subject ORDER BY title','��������� ������ � ������� ���������');
            
            $factor = $db->query('SELECT id,factor FROM factors WHERE subject_id = '.$sid.' LIMIT 1');
            
            if ($db->num_rows($factor) == 0) {
                unset($factor);
                $factor['factor'] = '{"factor":[6,11,16]}';
            }
            else {
                $factor = $db->fetch_array($factor);
            }
            $f = json_decode($factor['factor']);

            $tmp->setVar('factor3',$f->factor[0]);
            $tmp->setVar('factor4',$f->factor[1]);
            $tmp->setVar('factor5',$f->factor[2]);
            
            
            while($subject=$db->fetch_array($sub_query)) {
                $list_sub.="<option value='{$subject['id']}'".($subject['id'] == $sid ? ' selected' : '').">{$subject['title']}</option>\n";
            }
            
            $tmp->setVar('title',$title);
            $tmp->setVar('id',$id);
            $tmp->setVar('sid',$sid);
            $tmp->setVar('ListSubject',$list_sub);
            $tmp->setCSS(array('mark'));
            $tmp->setJS(array('mark'));
        } else {
            return $sec->head('subject.php?cat=add');
        }
    }
    function subjectDelete() {
        global $db,$sec,$tmp;
        $id=$sec->ClearInt($_GET['id'],'�������� id �� �����');

        $question=$db->query('SELECT id,subject FROM subject_category WHERE id='.$id.'','����� ��������� �� ����������',true);

        $answer_in_quest=$db->query('UPDATE subject_category SET `delete` = 2 WHERE `id`='.$id.'');
            
        return $sec->head('subject.php?cat=sub&id='.$question['subject'].'&m=16');
    }
    protected function AddCat() {
        global $sec,$err,$db,$mainclass;
        $title=$sec->filter($_POST['title'],150,'�� ������ ������ ���������');
        $subject=$sec->ClearInt($_POST['subject'],'������� �� ������');

        $test_subject=$db->query('SELECT id FROM subject WHERE id="'.$subject.'"','id ����� �������');
        $db->query('INSERT INTO subject_category (`title`,`subject`) VALUES ("'.$title.'","'.$subject.'")');

        return $sec->head('subject.php?cat=sub&id='.$subject.'&m=14');
    }
    protected function EditCat() {
        global $sec,$err,$db,$mainclass;
        $id = $sec->ClearInt($_GET['id'],'������ id');
        $title=$sec->filter($_POST['title'],150,'�� ������ ������ ���������');
        $subject=$sec->ClearInt($_POST['subject'],'������� �� ������');

        $db->query('SELECT id FROM subject_category WHERE id="'.$id.'"','��������� �� ����������');
        $db->query('SELECT id FROM subject WHERE id="'.$subject.'"','id ����� �������');
        $db->query('UPDATE subject_category SET `title` = "'.$title.'",`subject` = "'.$subject.'" WHERE id = '.$id.'');
        
        $factor = $db->query('SELECT id,factor FROM factors WHERE subject_id = 1 LIMIT 1');
            
            if ($db->num_rows($factor) == 0) {
                unset($factor);
                $factor['factor'] = '{"factor":[6,11,16]}';
            }
            else {
                $factor = $db->fetch_array($factor);
            }
        
        return $sec->head('subject.php?cat=sub&id='.$subject.'&m=15');
    }
    protected function EditSubject() {
        global $sec,$err,$db,$mainclass;
        $id = $sec->ClearInt($_GET['id'],'������ id');
        $title=$sec->filter($_POST['title'],70,'�� ������ ������ ���������');
        $factor3 = $sec->ClearInt($_POST['factor1'],'������ �������� �������');
        $factor4 = $sec->ClearInt($_POST['factor2'],'������ �������� �������');
        $factor5 = $sec->ClearInt($_POST['factor3'],'������ �������� �������');
        
        $db->query('SELECT id FROM subject WHERE id="'.$id.'"','id ����� �������');
        
        $arr['factor'] = array($factor3,$factor4,$factor5);
        $factor = $db->query('SELECT id,factor FROM factors WHERE subject_id = '.$id.' LIMIT 1');
            
            if ($db->num_rows($factor) == 0) {
                $db->query("INSERT INTO factors (`test_id`,`subject_id`,`factor`) VALUES (0,".$id.",'".json_encode($arr)."')");
            }
            else {
                $factor = $db->fetch_array($factor);
                $db->query("UPDATE factors SET `test_id` = 0,`subject_id` = ".$id.", `factor` = '".json_encode($arr)."' WHERE id = ".$factor['id']."");
            }
        
        return $sec->head('subject.php?m=17');
    }
}
?>
