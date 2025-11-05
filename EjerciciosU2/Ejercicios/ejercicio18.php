<?php
$a = 1;
$b = 2;

function arraySuperglobal(){
    return $GLOBALS['a'];
}
echo arraySuperglobal();
?>