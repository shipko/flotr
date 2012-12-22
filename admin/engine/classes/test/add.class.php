<?php
/**
 * Description of test
 *
 * @author �������
 */
require(PATH.'engine/classes/other/other.class.php');
class add extends someFunction {
    function testAdd() {
        global $sec,$db,$mainclass;

        $title=$sec->filter($_POST['title'],150,'�� ������ ������ ���������');
        $subject=$sec->ClearInt($_POST['subject'],'������� �� ��������');
        $category=$sec->ClearInt($_POST['category']);
        $status=((int)$_POST['status']==2) ? '2' : '1';
		$shuffle=((int)$_POST['shuffle']==2) ? '2' : '1';
        $is_edit = $sec->filter($_POST['is_edit_factor']);
        $test_subject=$db->query('SELECT id FROM subject WHERE id="'.$subject.'"','id �������� �������');
        if ($category != 0) {
            $cat_subject=$db->query('SELECT id FROM subject_category WHERE id="'.$category.'"','id ��������� �������');
        }
        $db->query('INSERT INTO nametest (`title`,`subject`,`category`,`status`,`user`,`date_create`,`shuffle`) VALUES ("'.$title.'","'.$subject.'","'.$category.'","'.$status.'","'.$mainclass->user['id'].'","'.time().'","'.$shuffle.'")');
        $last_insert = mysql_insert_id();
        if ($is_edit == 'true') {
            $factor3 = $sec->ClearInt($_POST['factor1'],'������ �������� �������');
            $factor4 = $sec->ClearInt($_POST['factor2'],'������ �������� �������');
            $factor5 = $sec->ClearInt($_POST['factor3'],'������ �������� �������');
            
            $arr['factor'] = array($factor3,$factor4,$factor5);
            
            $db->query("INSERT INTO factors (`test_id`,`subject_id`,`factor`) VALUES (".$last_insert.",".$subject.",'".json_encode($arr)."')");
        }
        

        $sec->head('test.php?sec=add&cat=question&id='.$last_insert.'&m=6');
    }

    function testMain() {
        global $db,$sec,$tmp;
            $tmp->setVar('title','���������� �����');
            $sub_query=$db->query('SELECT * FROM subject ORDER BY title','��������� ������ � ������� ���������');
            $sid = $sec->ClearInt($_GET['sid']);
            
            while($subject=$db->fetch_array($sub_query)) {
                $list_sub.='
                    <option value="'.$subject['id'].'"'.($subject['id'] == $sid ? ' selected' : '').'>'.$subject['title'].'</option>'."\n";
            }
            $tmp->setVar('ListSubject',$list_sub);
            $tmp->setVar('factor3','6');
            $tmp->setVar('factor4','11');
            $tmp->setVar('factor5','16');
            $tmp->setJS(array('add','mark'));
            $tmp->setCSS(array('mark'));
    }

    function testLoad() {
        global $db,$sec,$tmp;
            if ($_GET['load'] == 'category') {
				header('Content-Type: text/html; charset=windows-1251');
                $id = $sec->ClearInt($_GET['id']);
                $catId = $sec->ClearInt($_GET['categoryId']);
                $sub_query=$db->query('SELECT id,title FROM subject_category WHERE subject = '.$id.' ORDER BY title');   
                if ($db->num_rows($sub_query) == 0) {
                    exit('<option value="0">��������� �� �������</option>');
                }
                $str = '<option value="">�������� ���������</option>';
                while($query = $db->fetch_array($sub_query)) {
                    $str .= '<option value="'.$query['id'].'"'.($query['id'] == $catId ? ' selected' : '').'>'.$query['title'].'</option>';
                }
                exit($str);
            }        
    }
    
    function testQuestion($id=false,$message=false,$number_quest=4,$array=false) {
        global $db,$err,$sec,$m,$tmp;
        
        $tmp->setVar('title','���������� ��������');
        $tmp->setJS(array('addanswers','jquery.filedrop','fileupload'));
        $tmp->setVar('return','');
        $tmp->setVar('checkedAnswer','');
        
        $id=$sec->ClearInt($_GET['id'],'������ id');
        /* ������� ���������, ���� ��� ����� */
        if($message) {
            $_GET['m'] = $message;
        }
        /* �������� �� ������������� ����� */
        $arr=$db->query('SELECT id,title FROM nametest WHERE `id`='.$id.' AND `delete` != "2" LIMIT 1','������ ����� �� �������',true);
        $i=20;
        if (strlen($arr['title']) > $i) {
            $arr['title']=substr($arr['title'], 0, $i).'...';
        }
        if(isset($_GET['ret'])) {
            $tmp->setVar('return','(�����)');
            $arr['link']='&ret=from_edit';
        }
        /* ������� ���������� �������������� */
        $arr['uid'] = uniqid();

        if($array) {
            $a=1;
            $tmp->setVar('checkedAnswer','checked');
            $tmp->setVar('return','(�����)');

            foreach($array as $k=>$v) {
                $arr_td.=$this->Tr($v['input'], $v['check'], $a);
                $a++;
            }
            $arr['link']='&ret=from_edit';
        } else {
            $arr_td.=$this->Tr('',false,1);
            $arr_td.=$this->Tr('',false,2);
			$arr_td.=$this->Tr('',false,3);
			$arr_td.=$this->Tr('',false,4);
        }
        $tmp->setVar('testId',$arr['id']);
        $tmp->setVar('testTitle',$arr['title']);
        $tmp->setVar('testUnique',$arr['uid']);
        $tmp->setVar('countAnswer',$number_quest);
        $tmp->setVar('answers',$arr_td);
    }
    /* ����������� �������
     * ��������� ���������� 1 � 2 ���� �������
     * ���� ������� ������ ��� 1, �� 1 ���.
    */
    public function testAddQuestion() {
        global $err,$sec,$db,$mainclass;
        $type = 1;
        $id = $sec->ClearInt($_GET['id'],'�������� ����� �������');
        /* �������� �� ������������� ����� */        
        $query = $db->query('SELECT id, title FROM nametest WHERE `id`='.$id.' AND `delete` != "2" LIMIT 1','������ ����� �� �������',true);
        
        $this->test_id = $query['id'];
        
        //print_r($_POST);
        /* �������� ��������� */
        $title = $sec->filter($_POST['title'],false,'�� �������� �� ������ ������ ��������?');
        
        /* �������� �������� ���������� ������� */
        $array_answers = $this->RealCountAnswers(8,false,1);
        
        /* ���������� ��� */
		// ��� 2
        if (count($array_answers) == 1) {
            $type = 2;
        }
		// ��� 1 ��� 3
        else {
            if (count($array_answers) > 8) {
                return $err->GNC('����� ����� ����� ����� ��������');
            }
            /* ���������, ���� �� � ������� ���������� ����� */
            if (!$this->isIssetTrueAnswer($array_answers)) {
                return $err->GNC('�� �� ������� ���������� �����');
            }
			if ($this->countTrueAnswer($array_answers) >= 2) {
				$type = 3;
			} else {
				$type = 1;
			}
            
        }
        $file=$this->addFile();
        //print_r($file);
        $db->query("INSERT INTO question (ask,type,code,test,ball) VALUES ('".$title."',".$type.",'".$file."',".$id.",0)");
        $last_id = mysql_insert_id();

        foreach($array_answers as $k => $v) {
            $db->query('INSERT INTO answers (title,question,correct,ball) VALUES ("'.$v['input'].'",'.$last_id.','.($type == 2 ? '1' : $v['check']).',1)');
        }
        
        $link=$this->pasteLink();
        
        if ($_POST['answers_next'] == '2' && $type == 1) {
            $mainclass->tmpName = 'addQuestion';
            return $this->TestQuestion($id,5,count($array_answers),$array_answers);
        }
            
        else
            return $sec->head('test.php?sec=add&cat=question&id='.$id.'&m=5&ret');
    }
    function Tr($input='',$check=false,$i) {
        return '<div class="answer" id="input'.$i.'"><input type="checkbox" name="ok'.$i.'" '.($check=='2' ? 'checked' : '').' value="2" class="big_checkbox" /><textarea name="answer'.$i.'" class="big_input answerInput" id="answer'.$i.'" onkeyup="dynamicTextarea(this)" style="width: 445px; min-height: 25px; height: 25px; resize: none;overflow: hidden; " />'.stripslashes($input).'</textarea></div>';
    }
    
}
?>