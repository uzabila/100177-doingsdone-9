<?php
require_once 'functions.php';
require_once 'config/db.php';
require_once 'helpers.php';

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($link, "utf8");