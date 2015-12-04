<?php

// function __autoload($class) {
//     include 'classes/' . $class . '.class.php';
// }

function my_autoloader() {
    include 'Money.php';
}

spl_autoload_register('my_autoloader');

?>