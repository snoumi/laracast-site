<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config);

$currentUserId = 1;
$notes = $db->query("select * from notes where user_id = :user_id", [
    "user_id" => $currentUserId
])->fetchAll();

view("notes/index", [
    "title" => "Notes",
    "heading" => "Notes Page",
    "notes" => $notes,
]);