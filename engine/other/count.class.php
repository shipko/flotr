<?php
class count {
    /*
     * ������� ���������� ������ � ����, ������� �� ������� � �� ������.
     */
    function countTestWrite() {
        global $db;
        $count = $db->query('SELECT COUNT(id) FROM nametest WHERE `status`=2 AND `delete` != "2"',false,true);
        return $count['COUNT(id)'];
    }
    /*
     * ���������� �������������� � ����
     */
    function countAdmin() {
        global $db;
        $count = $db->query('SELECT COUNT(id) FROM user',false,true);
        return $count['COUNT(id)'];
    }
}

?>
