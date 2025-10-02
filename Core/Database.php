<?php

namespace Core;

use PDO;

class Database {
    public $connection;
    public $statement;

    public function __construct($config) {

        $dsn = "mysql:" . http_build_query($config["Database"], "", ";");

        $this->connection = new PDO($dsn, $config["User"]["username"], $config["User"]["password"],[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function fetch() {
        return $this->statement->fetch();
    }

    public function fetchAll() {
        return $this->statement->fetchAll();
    }

    public function fetchOrFail() {
        $result = $this->fetch();

        if (! $result) {
            abort();
        }

        return $result;
    }
}