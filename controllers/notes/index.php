<?php

$config = require 'config.php';
$db = new Database($config);

$title = 'Notes';
$heading = 'Notes Page';

$currentUserId = 1;
$notes = $db->query("select * from notes where user_id = :user_id", [
    "user_id" => $currentUserId
])->fetchAll();

require 'views/notes/notes.view.php';