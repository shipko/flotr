<?php
class message {
    public $array_mess=array(
        1 => array('class' => 'update', 'text' => '���������'),
        2 => array('class' => 'update', 'text' => '���������'),
        3 => array('class' => 'update', 'text' => '�������'),
        4 => array('class' => 'error', 'text' => '��������� ������'),
        5 => array('class' => 'update', 'text' => '������ ��������'),
        6 => array('class' => 'ready', 'text' => '���� ������.', 'small' => '������ �������� �������.'),
        7 => array('class' => 'ready', 'text' => '������������� ��������'),
        8 => array('class' => 'ready', 'text' => '������� ��������'),
        9 => array('class' => 'ready', 'text' => '������������� ������'),
        10 => array('class' => 'error', 'text' => '������ ������� ������ ����'),
        11 => array('class' => 'ready', 'text' => '��������� �������'),
        12 => array('class' => 'update', 'text' => '������ ������'),
        13 => array('class' => 'update', 'text' => '���� ������'),
        14 => array('class' => 'update', 'text' => '��������� ���������'),
        15 => array('class' => 'update', 'text' => '��������� ���������'),
        16 => array('class' => 'update', 'text' => '��������� �������'),
        17 => array('class' => 'update', 'text' => '������� ��������'),
        );
    function GetError($id) {
        $id=(int)$id;
        if (isset($this->array_mess[$id])) {
            return '
                <div id="messageBox" class="'.$this->array_mess[$id]['class'].'">
                    <p>
                        <b>'.$this->array_mess[$id]['text'].'</b>
                        '.$this->array_mess[$id]['small'].'
                    </p>
                </div>';
        }
        return false;
    }
}
$m=new message();
?>
