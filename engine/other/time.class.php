<?php
/*
 * Этот класс предназначен для правильного отображения времени на сайте
 */
class time {
    public $date = array(
        '1' => array('января'),
        '2' => array('февраля'),
        '3' => array('марта'),
        '4' => array('апреля'),
        '5' => array('мая'),
        '6' => array('июня'),
        '7' => array('июля'),
        '8' => array('августа'),
        '9' => array('сентября'),
        '10' => array('октября'),
        '11' => array('ноября'),
        '12' => array('декабря'),
        );
    /*
     * array[0] = ответ
     * array[1] = ответа
     * array[2] = ответов
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
            return 'Неизвестно';
        }
        $nowdate=getdate();
	$date=getdate($int);
        if($nowdate['year']==$date['year']&&$nowdate['mon']==$date['mon']&&$nowdate['mday']==$date['mday']) {
                return 'сегодня в '.$date['hours'].':'.($date['minutes'] < 10 ? '0'.$date['minutes'] : $date['minutes']);
        }elseif($nowdate['year']==$date['year']&&$nowdate['mon']==$date['mon']&&($nowdate['mday']-1)==$date['mday']) {
                return 'вчера в '.$date['hours'].':'.($date['minutes'] < 10 ? '0'.$date['minutes'] : $date['minutes']);
        }
        else {
                return $date['mday'].' '.$this->date[$date['mon']][0].' '.$date['year'].' в '.$date['hours'].':'.($date['minutes'] < 10 ? '0'.$date['minutes'] : $date['minutes']);

        }
    }
	
	
	function sumTime($seconds) {
		$array = array('seconds' => array('секунду','секунды','секунд'),'minutes' => array('минуту','минуты','минут'));
		
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
