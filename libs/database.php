<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $db_name;
    private $tableName;
    private $conditions = [];
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

    public function __destruct()
    {
        $this->closeConnection();
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

    public function where($column, $value, $operator = '=' || 'LIKE' || '>' || '<' || '>=' || '<=')
    {
        $this->conditions[] = [
            'column' => $column,
            'value' => strtoupper($operator) === 'LIKE' ? "%$value%" : $value,
            'operator' => $operator,
        ];
        return $this;
    }

    private function getCondition()
    {
        if (count($this->conditions) <= 0) {
            return '';
        }
        $condition = 'WHERE ';
        $condition .= array_reduce($this->conditions, function ($carry, $item) {
            // $newCondition = $item['column'] . ' ' . $item['operator'] . ' ' . $item['value'];
            $newCondition = "$item[column] $item[operator] '$item[value]'";
            if ($carry) {
                return $carry . ' AND ' . $newCondition;
            }
            return $newCondition;
        });
        return $condition;
    }

    public function get()
    {
        $sql = "SELECT * FROM {$this->tableName} {$this->getCondition()}";
        // echo $sql;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO $this->tableName SET ";
        foreach (array_keys($data) as $column) {
            $sql .= "$column = ?, ";
        }
        // slice off the last comma and space
        $sql = substr($sql, 0, -2);

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_values($data));
        return $this->conn->lastInsertId();
    }

    public function update($data)
    {
        $sql = "UPDATE $this->tableName SET ";
        $sql .= array_reduce(array_keys($data), function ($carry, $item) {
            $newValue = $item . ' = ?';
            if ($carry) {
                return $carry . ', ' . $newValue;
            }
            return $newValue;
        });
        $sql .= $this->getCondition();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_values($data));
        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->tableName {$this->getCondition()}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
