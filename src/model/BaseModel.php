<?php 

namespace Model;


class BaseModel
{
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;
    protected $conn;
    public $table;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->connection();
    }

    public function connection()
    {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname;
        $this->conn = new \PDO($dsn, $this->username, $this->password);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function select()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function selectById($id)
    {
        $sql = 'SELECT * FROM ' . $this->table . ' where id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        try {
            $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }




}

?>