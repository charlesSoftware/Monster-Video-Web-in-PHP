<?php
$var_array = require_once './config.php';  
extract($var_array, EXTR_PREFIX_SAME, "new");
Header("HTTP/1.1 303 See Other"); 
Header("Location: $xunlei_down"); 
?>