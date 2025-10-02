<?php

$config = require 'config.php';
$db = new Database($config);

$title = 'Note';
$heading = 'Note Page';

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", [
    "id" => $_GET["id"]
])->fetchOrFail();

authorize($note["user_id"] == $currentUserId);

require 'views/notes/note.view.php';