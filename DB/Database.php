<?php

namespace DB;

use Exception;
use PDOException;
use PDO;

class Database
{
    private static $instance;

    private PDO $connection;
    
    private function __construct() {
        try {
        $this->connection = new PDO("mysql:host=".$_ENV['DB_URL'].";dbname=".$_ENV["DB_NAME"], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }


    public function ping(): void
    {
        try {
            $this->connection->prepare("SELECT 1");
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function select($table, $columns = "*", $where = null, $params = [])
    {
        try {
            $sql = "SELECT $columns FROM $table";
            if ($where) {
                $sql .= " WHERE $where;";
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function insert($table, $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO $table ($columns) VALUES ($values)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($data);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}