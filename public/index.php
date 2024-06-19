<?php

if(!session_id()) session_start(); //Ternary Operator

require_once '../app/init.php';

$app = new App;