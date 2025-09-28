<?php

$config = require 'config.php';
$db = new Database($config);

$title = 'Notes';
$heading = 'Notes Page';

$notes = $db->query("select * from notes")->fetchAll();

require 'views/notes.view.php';