<?php
if(!defined('CMS'))die('���� ������');
class err {
    public function GNC($message) {
        $this->setVar('title','��������� ������');
        $this->setVar('message',$message);
        $this->parse('critError');
        exit();
    }
}
$err=new err;
?>
