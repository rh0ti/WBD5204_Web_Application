<?php
session_start();
spl_autoload_register(function($class_name){

  include "classes/$class_name.class.php";

});

$source = new source;

?> 