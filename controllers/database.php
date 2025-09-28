<?php

$config = require 'config.php';
$db = new Database($config);

$id = $_GET["id"];

$query = "select * from posts where id = :id";

$posts = $db->query($query, ["id" => $id])->fetchAll();

$title = 'Database';
$heading = 'Database Page';

require 'views/database.view.php';