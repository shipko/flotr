<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 04.11.2014
 * Time: 2:23
 */
function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler("exception_error_handler");

/* Trigger exception */
strpos();
