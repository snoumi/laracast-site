<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config);

$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors["body"] = 'Description of no more than 1000 characters is required';
}

if (! empty($errors))
{
    return view("notes/create", [
        "title" => "Note",
        "heading" => "Note Page",
        "errors" => $errors,
    ]);
}

$db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)",
    [
        'body' => $_POST['body'],
        'user_id' => 1,
    ]);

header("location: /notes");
die();