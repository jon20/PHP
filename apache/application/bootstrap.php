<?php

require 'core/ClassLoder.php';

$loder = new ClassLoder();
$loder -> registerDir(dirname(__FILE__).'/core');
$loder -> registerDir(dirname(__FILE__).'/models');
$loder->register();

?>