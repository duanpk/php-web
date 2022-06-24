<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $db_name;
    private $tableName;
    private $conn;

    /**
     * [__construct description]
     *
     * @param   string $host      host
     * @param   string $username  username
     * @param   string $password  password
     * @param   string $db_name   database name
     *
     * @return  mixed           connection
     */
    public function __construct($host = '127.0.0.1', $username = 'root', $password = 'bietlamgi', $db_name = 'php_mysql')
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;

        $this->conn = $this->connect();
    }

    private function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->conn = null;
    }

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function get($id)
    {
        try {
            $sql = "SELECT * FROM $this->tableName WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM $this->tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {
        try {
            $sql = "INSERT INTO $this->tableName SET ";
            foreach (array_keys($data) as $column) {
                $sql .= "$column = ?, ";
            }
            // slice off the last comma and space
            $sql = substr($sql, 0, -2);

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array_values($data));
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
    }

    public function update($data, $id)
    {
        try {
            $sql = "UPDATE $this->tableName SET ";
            foreach (array_keys($data) as $column) {
                $sql .= "$column = ?, ";
            }
            // slice off the last comma and space
            $sql = substr($sql, 0, -2);
            $sql .= " WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array_values($data));
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM $this->tableName WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
    }
}
