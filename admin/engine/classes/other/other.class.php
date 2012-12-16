<?php
/* 
 * Developed by Mukovkin Dmitry
 */
class someFunction {
    function isIssetTrueAnswer($array) {
        foreach ($array as $key => $value) {
            if ($value['check'] == '2') 
                return true;
        }
        return false;
    }
	function countTrueAnswer($array) {
	$i = 0;
		foreach ($array as $key => $value) {
            if ($value['check'] == '2') 
                $i++;
        }
        return $i;
	}
    /* �������, ������� �������� �� ����� ������ ����� */
    function pasteLink() {
        if ($_GET['ret']=='from_edit') {
            $link='&ret';
        }
        return $link;
    }
    /*
     * ��������� �������� ���������� ��������� ������.
     * $int - �������������� ����� ���������.
     * $edit - �������� ��� ������� ��������������.
     * $countAnswer - ����������� ���������� ��������.
     */
    function RealCountAnswers($int,$edit=false,$countAnswer = 2) {
        global $sec,$err,$other;
        $array = array();
        for($i=1; $i <= $int; $i++) {
            if(empty($_POST['answer'.$i])) {
                continue;
            }
            $input=$sec->filter($_POST['answer'.$i],255);
            if($_POST['ok'.$i] != '2') 
                $check=1;
            else 
                $check=2;
            
            if ($edit) {
                $id = $sec->ClearInt($_POST['answerid'.$i]);
            }
            
            $array[]=array('input' => $input,'check' => $check, 'id' => $id);
        }
        
        if (count($array) < $countAnswer) {
            return $err->GNC('����������, ������� ���� �� '.$other->time->rulesTime($countAnswer,array('�������','��������','���������')).' ������');
        }
        
        return $array;
    }
    
    function addFilesInHTML($json) {
        $arr = json_decode($json);
        if (!empty($arr)) {
            $i = 0;
            foreach($arr as $k => $v) {
                $i++;
                $str.='<input type="hidden" id="file_'.$i.'" name="file'.$i.'" value="'.$v->path.'">';
            }
        }
        return $str;
    }
    
    function addFile($array = array()) {
        // ������ ���������� ����������� ������
        $count=(int)$_POST['count_files'];
        if ($_POST['count_files'] == 0) {
            return '';
        }
        // �������� �� ������������� �����
        for ($i=1; $i <= $count; $i++) {
            if (empty($_POST['file'.$i])) 
                continue;
            if($this->ifIssetFile($_POST['file'.$i])) {
                $array[] = array('path' => $_POST['file'.$i]);
            }
        }
        // �������� �� ������ � �������
        // (���� ���������� POST[count_files] > 0,
        // �� ����� ������ �� ����������)
        if (empty($array))
            return '';
        else
            return json_encode($array);
        
    }
    
    function ifIssetFile($filename) {
        $filename = str_replace('../','',$filename);
        $filename = str_replace('./','',$filename);
        
        if (file_exists('../uploads/tests/'.$this->test_id.'/a_'.$filename)) {
            return true;
        }
        return false;
    }
    
}
?>
