<?php
/*
 * ���� ����� ������������ ��� ����������� ����������� ������� �� �����
 */
class time {
    public $date = array(
        '1' => array('������'),
        '2' => array('�������'),
        '3' => array('�����'),
        '4' => array('������'),
        '5' => array('���'),
        '6' => array('����'),
        '7' => array('����'),
        '8' => array('�������'),
        '9' => array('��������'),
        '10' => array('�������'),
        '11' => array('������'),
        '12' => array('�������'),
        );
    /*
     * array[0] = �����
     * array[1] = ������
     * array[2] = �������
     */
    function rulesTime($number,$array) {
        $cases = array(2, 0, 1, 1, 1, 2);  
        return $number.' '.$array[ ($number%100 > 4 && $number%100<20) ? '2' : $cases[($number%10<5)? $number%10 : 5] ];
    }
    /*
     * timestamp -> date month year
     */
    function fullDate($int) {
        if ($int == 0) {
            return '����������';
        }
        $nowdate=getdate();
	$date=getdate($int);
        if($nowdate['year']==$date['year']&&$nowdate['mon']==$date['mon']&&$nowdate['mday']==$date['mday']) {
                return '������� � '.$date['hours'].':'.($date['minutes'] < 10 ? '0'.$date['minutes'] : $date['minutes']);
        }elseif($nowdate['year']==$date['year']&&$nowdate['mon']==$date['mon']&&($nowdate['mday']-1)==$date['mday']) {
                return '����� � '.$date['hours'].':'.($date['minutes'] < 10 ? '0'.$date['minutes'] : $date['minutes']);
        }
        else {
                return $date['mday'].' '.$this->date[$date['mon']][0].' '.$date['year'].' � '.$date['hours'].':'.($date['minutes'] < 10 ? '0'.$date['minutes'] : $date['minutes']);

        }
    }
	
	
	function sumTime($seconds) {
		$array = array('seconds' => array('�������','�������','������'),'minutes' => array('������','������','�����'));
		
		$minutes = floor($seconds / 60);
		$seconds = $seconds % 60;
		if ($minutes == 0)
			return $this->rulesTime($seconds,$array['seconds']);
		
		if ($seconds == 0)
			return $this->rulesTime($minutes,$array['minutes']);
		
		return $this->rulesTime($minutes,$array['minutes']).' '.$this->rulesTime($seconds,$array['seconds']);
	}
}







?>
