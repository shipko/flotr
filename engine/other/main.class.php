<?php
/*
 * @author Дмитрий Муковкин
 */
function __autoload($class_name) {
	global $other;
    $class_name=strtolower($class_name);
    if(!file_exists(ADMIN.'engine/other/'.$class_name.'.class.php')) {
        exit('Класс '.$class_name.' не нашелся');
    }
    require($class_name.'.class.php');
    return $other->$class_name = new $class_name();
}
class other {
	function __construct() {}
}
$other=new other;
?>