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
     * ������� ���������� ���������� ������.
     */
    function countTestPass() {
        global $db;
        $count = $db->query('SELECT SUM(count_pass) AS count_pass FROM nametest ',false,true);
        return $count['count_pass'];
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
