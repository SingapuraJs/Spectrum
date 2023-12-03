<?php
// No arquivo logout.php que está dentro de /views/user
require_once(__DIR__ . '/../../func/functions.php');

echo $test;
logOut();
session_regenerate_id(true);

header  ('location: ../../index.php');

?>
