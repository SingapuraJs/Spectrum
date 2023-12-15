<?php 

namespace Model;

use Model\BaseModel;

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'usuarios';
    }

    public function add($userData)
    {
        try {
            $sql = 'INSERT INTO ' . $this->table . '(usr_usuario, usr_email, usr_senha, usr_foto) VALUES (:username, :email, :password, :pic)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $userData['usr_usuario']);
            $stmt->bindParam(':email', $userData['usr_email']);
            $stmt->bindParam(':password', $userData['usr_senha']);
            $stmt->bindParam(':pic', $userData['usr_foto']);
            $stmt->execute();
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    
    }
    
    public function checkCredentials($username, $userEmail)
    {
        
        $sql = 'SELECT * FROM '. $this->table . ' WHERE usr_usuario = :username or usr_email = :userEmail';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':userEmail', $userEmail);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return ($result !== false && $result !== null);

    }

    public function getExistent($username)
        {
            try {
                $sql = 'SELECT * FROM ' . $this->table . ' WHERE usr_usuario = :username';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                return ['success' => false, 'error' => $e->getMessage()];
            }
        }
}



