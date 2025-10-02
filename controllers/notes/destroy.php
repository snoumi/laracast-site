<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config);

$currentUserId = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note = $db->query("select * from notes where id = :id", [
        "id" => $_GET["id"]
    ])->fetchOrFail();

    authorize($note["user_id"] == $currentUserId);

    $db->query("DELETE FROM notes WHERE id = :id", [
        "id" => $_GET["id"]
    ]);

    header("Location: /notes");
    exit();
} else {

    $note = $db->query("select * from notes where id = :id", [
        "id" => $_GET["id"]
    ])->fetchOrFail();

    authorize($note["user_id"] == $currentUserId);

    view("notes/show", [
        "title" => "Note",
        "heading" => "Note Page",
        "note" => $note,
    ]);

}