<?php

class Database {
    public $connection;

    public function __construct($config) {

        $dsn = "mysql:" . http_build_query($config["Database"], "", ";");

        $this->connection = new PDO($dsn, $config["User"]["username"], $config["User"]["password"],[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query, $params = []) {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}