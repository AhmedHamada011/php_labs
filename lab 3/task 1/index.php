<?php
session_start();
require_once("vendor/autoload.php");

$counter = (new Counter())->get_counter();

echo "<h1>Counter is $counter </h1>";