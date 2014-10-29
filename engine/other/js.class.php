<?php
if(!defined('CMS'))die('Сюда нельзя');
/*
 * @author Муковкин Дмитрий
 */
class js {
    function getJS($array) {
        foreach($array as $key) {
            $string.='<script type="text/javascript" src="./script/'.$key.'.js"></script>'."\n";
        }
        return $string;
    }
}

?>
