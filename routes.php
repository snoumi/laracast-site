<?php

$router->get("/", "controllers/index.php");
$router->get("/games", "controllers/games.php");
$router->get("/random", "controllers/random.php");

$router->get("/notes", "controllers/notes/index.php");
$router->get("/note", "controllers/notes/show.php");
$router->delete("/note", "controllers/notes/destroy.php");
$router->get("/notes/create", "controllers/notes/create.php");
$router->post("/notes", "controllers/notes/store.php");