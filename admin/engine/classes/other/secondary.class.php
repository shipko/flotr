<?php

/*
 * ����� ������������ ��� �������������� �������, ������������� ������ ������
 */

/**
 * Description of secondary
 *
 * @author �������
 */
class secondary {
    function GetSubject() {
        global $db;
        $sub_query=$db->query('SELECT * FROM subject','��������� ������ � ������� ���������');

        while($subject=$db->fetch_array($sub_query)) {
        $list_sub.='<option value="'.$subject['id'].'">'.$subject['title'].'</option>';
        }
        return $list_sub;
    }
    function issetTest($id) {
        global $db;
            $query=$db->query('SELECT id FROM nametest WHERE id ='.$id.'');
            if ($db->num_rows($query) > 0) 
                return true;
            else
                return false;    
    }
}
$secondary=new secondary;
?>
