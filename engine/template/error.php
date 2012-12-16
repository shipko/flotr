<?php
if(!defined('CMS'))die('Сюда нельзя');
class err {
    public function GNC($message) {
        $this->setVar('title','Произошла ошибка');
        $this->setVar('message',$message);
        $this->parse('critError');
        exit();
    }
}
$err=new err;
?>
