<?php
require(PATH.'engine/classes/other/other.class.php');
class edit extends someFunction {
    public 
    $test=array();
    function testMain() {
        global $db,$tmp;
        
        $tmp->setVar('title','�������������� | ������ ���������');
        $tmp->setCSS(array('li'));
        
            $sub_query=$db->query('SELECT * FROM subject ORDER BY title','��������� ������ � ������� ���������');
            while($subject=$db->fetch_array($sub_query)) {
                $list_sub.='
                    <li class="sub">
                        <a href="test.php?sec=edit&cat=subject&sid='.$subject['id'].'">'.$subject['title'].'</a>
                    </li>';
            }
        $tmp->setVar('ListSubject',$list_sub); 
    }
    
    function testSubject() {
        global $db,$sec,$tmp;
        
        $tmp->setVar('title','�������������� | C����� ������');
        $tmp->setCSS(array('li'));
        
        $id=$sec->ClearInt($_GET['sid'],'�������� ����� �������');
        $sub_query=$db->query('SELECT * FROM nametest WHERE `subject` ="'.$id.'" AND `delete` != "2"','����� ��� �� ��������� <br /> <a href="test.php?sec=add&sid='.$id.'">��������</a> ������');
        
        while($subject=$db->fetch_array($sub_query)) {
            $list_sub.='
                    <li class="sub">
                        <a href="test.php?sec=edit&cat=list&id='.$subject['id'].'">'.$subject['title'].'</a>
                        <a href="test.php?sec=edit&cat=edit&id='.$subject['id'].'" style="font-size: 14px; color: #CD1B1B; margin-bottom: 3px;">(��������)</a>
                        <a href="test.php?sec=delete&cat=test&id='.$subject['id'].'" style="font-size: 14px; color: #CD1B1B; margin-bottom: 3px;">(�������)</a>
                    </li>';
        }
        $tmp->setVar('ListTest',$list_sub); 
        $tmp->setVar('idSubject',$id);
    }
    
    function testList() {
        global $db,$sec,$tmp,$other;
        
        $tmp->setVar('title','�������������� �����');
        $tmp->setCSS(array('li'));
        
        $id=$sec->ClearInt($_GET['id'],'�������� ����� �������');
        
        $quest=$db->query('SELECT * FROM question WHERE `test`="'.$id.'" AND `delete` != "2"','�������� ���, �� �� ������ <a href="test.php?sec=add&cat=question&ret&id='.$id.'" style="color: #2D76B9;">��������</a> �� � ����� �����');
        $sub=$db->query('SELECT * FROM nametest WHERE id="'.$id.'" LIMIT 1',false,true);
        while($subject=$db->fetch_array($quest)) {
            $list_sub.='
                <li class="editable">
                    <a href="test.php?sec=edit&cat=answer&id='.$subject['id'].'">'.stripslashes($subject['ask']).'</a>
                    <a href="test.php?sec=delete&cat=question&id='.$subject['id'].'" style="color: #CD1B1B; ">(�������)</a>
                </li>';
        }
        $i=40;
        if (strlen($sub['title']) > $i) {
            $sub['title']=substr($sub['title'], 0, $i).'...';
        }
        
        $countAnswer = $other->time->rulesTime($db->num_rows($quest),array('������','�������','��������'));
        
        $tmp->setVar('ListTest',$list_sub); 
        $tmp->setVar('CountAnswer',$countAnswer);
        $tmp->setVar('TestTitle',$sub['title']);
        $tmp->setVar('TestId',$id);
    } 
    
    function testAnswer() {
        global $db,$sec,$tmp;
        
        require 'engine/classes/file.class.php';
        
        $tmp->setVar('title','�������������� �������');
        $tmp->setJS(array('jquery.filedrop','fileupload','addanswers'));
        
        $id=$sec->ClearInt($_GET['id'],'�������� ����� �������');        
        $question=$db->query('SELECT * FROM question WHERE `id`='.$id.' AND `delete` != "2" LIMIT 1','������ ������� �� �������',true);
        
        $html = $this->addFilesInHTML($question['code']);
        
        $function = 'typeTest_'.$question['type'];
        $this->$function($question['id']);
        
        $tmp->setVar('TestId',$question['test']);
        $tmp->setVar('AnswerId',$id);
        $tmp->setVar('files',$html);
        $tmp->setVar('TextAsk',stripslashes($question['ask']));
        $tmp->setVar('ListFile',$file->ListFile($question));
        $tmp->setVar('CountFiles',$file->count);
        
    } 
    
    function testEdit() {
        global $db,$sec,$tmp;
        $tmp->setJS(array('add','mark'));
        $tmp->setCSS(array('mark'));
        $tmp->setVar('title','�������������� �����');
        
        $id=$sec->ClearInt($_GET['id'],'�������� ����� �������');
       
        $sub=$db->query('SELECT * FROM nametest WHERE `id`="'.$id.'" AND `delete` != "2" LIMIT 1','���� �� �������',true);
        
        $sub_query=$db->query('SELECT * FROM subject ORDER BY title','��������� ������ � ������� ���������');  
            while($subject=$db->fetch_array($sub_query)) {
                $check = ($subject['id']==$sub['subject'] ? ' selected' : '');
                $list_sub.='
                        <option value="'.$subject['id'].'"'.$check.'>'.$subject['title'].'</option>';
            }

        $factor = $db->query('SELECT factor FROM factors WHERE (test_id = '.$id.' AND subject_id = '.$sub['subject'].') OR subject_id = '.$sub['subject'].' ORDER BY id DESC LIMIT 1','������ � ����������',true);
        $f = json_decode($factor['factor']);
        
        
        $tmp->setVar('factor3',$f->factor[0]);
        $tmp->setVar('factor4',$f->factor[1]);
        $tmp->setVar('factor5',$f->factor[2]);
        $tmp->setVar('TestId',$id);
        $tmp->setVar('categoryId',$sub['category']);
        $tmp->setVar('InputTitle',stripslashes($sub['title']));
        $tmp->setVar('Checked',($sub['status']=='2' ? 'checked="checked"' : ''));
		$tmp->setVar('Checked-Shuffle',($sub['shuffle']=='2' ? 'checked="checked"' : ''));
        $tmp->setVar('ListSubject',$list_sub);
        
    } 
    
    
    protected function typeTest_1($id) {
        global $db,$tmp,$mainclass;
        
        $i = 0;
        $query_ans=$db->query('SELECT * FROM answers WHERE question='.$id.'');
        
        while($arr=$db->fetch_array($query_ans)) {
            $i++;
            $answers.='
                <div class="answer" id="input'.$i.'">
                    <input name="ok'.$i.'" '.($arr['correct']==2 ? 'checked="checked"' : '').' value="2"  type="checkbox" class="big_checkbox" />
                    <textarea name="answer'.$i.'" class="big_input answerInput" id="answer'.$i.'" onkeyup="dynamicTextarea(this)" style="width: 440px; min-height: 25px; height: 25px; resize: none;overflow: hidden; " />'.stripslashes($arr['title']).'</textarea>
                    <input type="hidden" name="answerid'.$i.'" value="'.$arr['id'].'">
                </div>';
        }
        $mainclass->tmpName .= 'Type1';
        $tmp->setVar('CountAnswer',$i);
        $tmp->setVar('ListAnswer',$answers);
        
    }
    
    protected function typeTest_2($id) {
        global $db,$tmp,$mainclass;

        $arr=$db->query('SELECT * FROM answers WHERE question='.$id.' LIMIT 1',false,true);
        
        $mainclass->tmpName .= 'Type2';
        $tmp->setVar('Answer',$arr['title']);
        $tmp->setVar('CountAnswer','0');
    }
	protected function typeTest_3($id) {
        global $db,$tmp,$mainclass;
        
        $i = 0;
        $query_ans=$db->query('SELECT * FROM answers WHERE question='.$id.'');
        
        while($arr=$db->fetch_array($query_ans)) {
            $i++;
            $answers.='
                <div class="answer" id="input'.$i.'">
                    <input name="ok'.$i.'" '.($arr['correct']==2 ? 'checked="checked"' : '').' value="2"  type="checkbox" class="big_checkbox" />
                     <textarea name="answer'.$i.'" class="big_input answerInput" id="answer'.$i.'" onkeyup="dynamicTextarea(this)" style="width: 445px; min-height: 25px; height: 25px; resize: none;overflow: hidden; " />'.stripslashes($arr['title']).'</textarea>
                    <input type="hidden" name="answerid'.$i.'" value="'.$arr['id'].'">
                </div>';
        }
        $mainclass->tmpName .= 'Type1';
        $tmp->setVar('CountAnswer',$i);
        $tmp->setVar('ListAnswer',$answers);
    }

/*
 * ������� �����������
 * testUpdateTest - ��������� �����
 * testUpdateTypeOne - ��������� ������� 1 ����
 * testUpdateTypeTwo - ��������� ������� 2 ����
 * testUpdateTypeThree - ��������� ������� 3 ����
 */    
    
    
    function testUpdateTest() {
        global $db,$sec;
        $id=$sec->ClearInt($_GET['id'],'id ����� �������');
        
        $query_for_test=$db->query('SELECT id FROM nametest WHERE `id`='.$id.' AND `delete` != "2"','����� �� ����������');

        $title=$sec->filter($_POST['title'],150,'��������� ����� �� ��������');
        $subject=$sec->ClearInt($_POST['subject'],'������� �� ������');
        $category = $sec->ClearInt($_POST['category']);
        $status=($_POST['status'] == '2' ? (int)$_POST['status'] : '1');
		$shuffle=($_POST['shuffle'] == '2' ? (int)$_POST['shuffle'] : '1');
        $is_edit = $sec->filter($_POST['is_edit_factor']);
        
        $test_subject=$db->query('SELECT id FROM subject WHERE id="'.$subject.'"','id �������� �������');
        
        
        if ($is_edit == 'true') {
            $factor3 = $sec->ClearInt($_POST['factor1'],'������ �������� �������');
            $factor4 = $sec->ClearInt($_POST['factor2'],'������ �������� �������');
            $factor5 = $sec->ClearInt($_POST['factor3'],'������ �������� �������');
            
            $factor = $db->query('SELECT id,factor FROM factors WHERE subject_id = '.$subject.' AND test_id = '.$id.' LIMIT 1');
            $arr['factor'] = array($factor3,$factor4,$factor5);
            if ($db->num_rows($factor) == 0) {
                $db->query("INSERT INTO factors (`test_id`,`subject_id`,`factor`) VALUES (".$id.",".$subject.",'".json_encode($arr)."')");
            }
            else {
                $factor = $db->fetch_array($factor);
                $db->query("UPDATE factors SET `factor` = '".json_encode($arr)."' WHERE id = ".$factor['id']."");
            } 
        }
        
        $db->query('UPDATE nametest SET title="'.$title.'", subject="'.$subject.'", category="'.$category.'", status="'.$status.'", shuffle="'.$shuffle.'", date_edit="'.time().'" WHERE id='.$id.'');
        
        $sec->head('test.php?sec=edit&cat=list&id='.$id.'&m=1');
    }
    
    function testUpdateAnswer() {
        global $sec,$db;
        $id=$sec->ClearInt($_GET['id'],'id ����� �������');
        
        if($id != $_POST['id']) {
            exit('Hacker :(');
        }
        
        $title = $sec->filter($_POST['title'],false,'��������� ����� �� ��������');
        
        $arr_quest=$db->query('SELECT id, type, test FROM question WHERE `id`='.$id.' AND `delete` != "2" LIMIT 1','������ ������� �� �������',true);
        
        $this->test_id = $arr_quest['test'];
        
        $function = 'typeTest_'.$arr_quest['type'].'Update';

        $this->$function($arr_quest['id']);
        
        
        
        $file=$this->addFile(json_decode($arr_quest['code']));
        
        $db->query("UPDATE question SET ask='$title',type='".$this->type."', code='".$file."' WHERE id={$arr_quest['id']} ");
        
        
        $sec->head('test.php?sec=edit&cat=list&m=1&id='.$arr_quest['test']);
    }
    
    function typeTest_1Update($id) {
        global $db,$sec,$err;
		
		$this->type = 1;
        
        /* �������� ��������������� ��� �������� ������ */
        $num=$sec->ClearInt($_POST['number'],'Security breach');
        
        if ($num > 8) {
            return $err->GNC('Security breach 1');
        }

        /* �������� �������� ���������� ������� */
        $array_answers = $this->RealCountAnswers($num,true);
        
        /* ���������, ���� �� � ������� ���������� ����� */
        if (!$this->isIssetTrueAnswer($array_answers)) {
            return $err->GNC('�� �� ������� ���������� �����');
        }
		
        if ($this->countTrueAnswer($array_answers) >= 2) {
			 $this->type = 3;
		}
		
        $first = true;
        foreach ($array_answers as $k => $v) {
            if (!$first) {
                $ids .= ' AND ';  
            }        
            if (!empty($v['id'])) { 
                $db->query('UPDATE answers SET title="'.$v['input'].'",correct='.$v['check'].' WHERE id='.$v['id'].'');
                $first = false;
                $ids .= 'id != '.$v['id'];
            }
            else {  
                $db->query("INSERT INTO answers (title,correct,question,ball) VALUES ('{$v['input']}','{$v['check']}','{$this->id}',1)");
                $ids .= 'id != '.mysql_insert_id();
                $first = false;
            }
        }     
        
        $db->query('DELETE FROM answers WHERE question='.$id.' AND ('.$ids.')');
        
    }
    
    function typeTest_2Update($id) {
        global $db,$sec;
        
        $input=strtolower($sec->filter($_POST['answer'],255,'����� �� ��������'));       
        $this->type = 2;
        $test_query=$db->query('UPDATE answers SET title="'.$input.'" WHERE question='.$id.'');
    }
	function typeTest_3Update($id) {
        global $db,$sec,$err;
		
		$this->type = 3;
        
		/* �������� ��������������� ��� �������� ������ */
        $num=$sec->ClearInt($_POST['number'],'Security breach');
        
        if ($num > 8) {
            return $err->GNC('Security breach 1');
        }

        /* �������� �������� ���������� ������� */
        $array_answers = $this->RealCountAnswers($num,true);
        
        /* ���������, ���� �� � ������� ���������� ����� */
        if (!$this->isIssetTrueAnswer($array_answers)) {
            return $err->GNC('�� �� ������� ���������� �����');
        }
        if ($this->countTrueAnswer($array_answers) < 2) {
			 $this->type = 1;
		}
        $first = true;
        foreach ($array_answers as $k => $v) {
            if (!$first) {
                $ids .= ' AND ';  
            }        
            if (!empty($v['id'])) { 
                $db->query('UPDATE answers SET title="'.$v['input'].'",correct='.$v['check'].' WHERE id='.$v['id'].'');
                $first = false;
                $ids .= 'id != '.$v['id'];
            }
            else {  
                $db->query("INSERT INTO answers (title,correct,question,ball) VALUES ('{$v['input']}','{$v['check']}','{$this->id}',1)");
                $ids .= 'id != '.mysql_insert_id();
                $first = false;
            }
        }     
        
        $db->query('DELETE FROM answers WHERE question='.$id.' AND ('.$ids.')');
        
    }
}
?>