<?php
if(!defined('CMS'))die('���� ������');
class Type {
    /* ������� ��� ������� ���� (������� � ������������ ������ ��������� ������) */
    function typeOne($array) {
        global $test_mode;
        $ask = $this->charseTrue(stripslashes($array['ask']));
		// ������ �������� �������
		$ask = $this->formula($ask);
        $title=$this->formula($this->charseTrue(stripslashes($array['title'])));
        $arr = array('id' => $array['aid'], 'text' => $title, 'add_class' => 'a a1');
        /* Test Mode */
        if ($test_mode) {
            unset($arr);
            $b='a a1';
            if ($array['correct']==2) {
                $b+=' b';
            }
            $arr = array('id' => $array['aid'], 'text' => $title, 'add_class' => $b);
        }
        
        $images = (empty($array['code']) ? '' : json_decode($array['code']) );
        $count_images = count($images);
        return    array(
            'id'   => $array['id'],
			'type' => '1',			
            'text' => $ask,
            'path' => $images,
            'count_images' => $count_images,
            // ������ ��������
            'answers' => array(
                $arr
            )
        );
    }
    function typeOneYet($array) {
        global $test_mode;
        $title=$this->formula($this->charseTrue(stripslashes($array['title'])));
        $a=array('id' => $array['aid'], 'text' => $title, 'add_class' => 'a a1');
        /* Test Mode */
        if ($test_mode) {
            $b='a a1';
            if ($array['correct']==2) {
                $b+=' b';
            }
            $a = array('id' => $array['aid'], 'text' => $title, 'add_class' => $b);
        }
        return $a;
    }
	
    /* ����� */
    
    /*  ������� ��� ������� ���� (������ � ������������ ����� ������ ������)  */
    function typeTwo($array) {
        $ask = $this->charseTrue(stripslashes($array['ask']));
        // ������ �������� �������
		$ask = $this->formula($ask);
		
        $images = (empty($array['code']) ? '' : json_decode($array['code']) );
        $count_images = count($images);
        return    array(
			'id'   => $array['id'],
            'type' => '2',
            'text' => $ask,
            'path' => $images,
            'count_images' => $count_images,
            // ������ id �� �������� ����� ���������� �����
            'answers' => array(
                array('id' => $array['aid'])
            )
        );
    }
    /* ����� */
	/* ������� ��� �������� ���� (������� � ������������ �������������� ������ ��������� ������) */
    function typeThree($array) {
        global $test_mode;
        $ask = $this->charseTrue(stripslashes($array['ask']));
		// ������ �������� �������
		$ask = $this->formula($ask);
		
        $title=$this->charseTrue(stripslashes($array['title']));
        $arr = array('id' => $array['aid'], 'text' => $title, 'add_class' => 'a a3');
        /* Test Mode */
        if ($test_mode) {
            unset($arr);
            $b='a a3';
            if ($array['correct']==2) {
                $b+=' b';
            }
            $arr = array('id' => $array['aid'], 'text' => $title, 'add_class' => $b);
        }
        
        $images = (empty($array['code']) ? '' : json_decode($array['code']) );
        $count_images = count($images);
        return    array(
            'id'   => $array['id'],
			'type' => '3',			
            'text' => $ask,
            'path' => $images,
            'count_images' => $count_images,
            // ������ ��������
            'answers' => array(
                $arr
            )
        );
    }
	function typeThreeYet($array) {
        global $test_mode;
        $title=$this->formula($this->charseTrue(stripslashes($array['title'])));
        $a=array('id' => $array['aid'], 'text' => $title, 'add_class' => 'a a3');
        /* Test Mode */
        if ($test_mode) {
            $b='a a3';
            if ($array['correct']==2) {
                $b+=' b';
            }
            $a = array('id' => $array['aid'], 'text' => $title, 'add_class' => $b);
        }
        return $a;
    }
	/* ����� */
}

?>
