<?php

$config = require 'config.php';
$db = new Database($config);

$title = 'Note';
$heading = 'Note Page';

$note = $db->query("select * from notes where id = :id", ["id" => $_GET["id"]])->fetch();

require 'views/note.view.php';