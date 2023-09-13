<?php
require "../config/config.php";

class Database
{
    private $pdo;

    public function ping(): void
    {
        try {
            $this->pdo->prepare("SELECT 1");
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function select($table, $columns = "*", $where = null, $data = [], $params = [])
    {
        try {
            $sql = "SELECT $columns FROM $table";
            if ($where) {
                $sql .= " WHERE $where;";
            }
            $stmt = $this->pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindParam(":$key", $value, PDO::PARAM_STR);
            }
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
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // Add update and delete methods similarly

    // public function update($table, $data, $where, $params = []) { ... }
    // public function delete($table, $where, $params = []) { ... }
}


try {
    $db = new Database($_ENV['DB_URL'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
