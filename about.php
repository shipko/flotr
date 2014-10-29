<?php
require 'header.php';
$tmp->setVar('title','О проекте');
$tmp->setVar('description','Страница с контактами, информацией о разработчиках, правами на тесты, логотипами сайта.');
$tmp->setVar('keywords','Муковкин Дмитрий, Битнер Лилия, sfml');
$tmp->parse('about');
?>
