<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;
$notes = $db->query("select * from notes where user_id = :user_id", [
    "user_id" => $currentUserId
])->fetchAll();

view("notes/index", [
    "title" => "Notes",
    "heading" => "Notes Page",
    "notes" => $notes,
]);