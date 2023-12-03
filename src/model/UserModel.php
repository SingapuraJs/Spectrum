<?php 

namespace Model;

use Model\BaseModel;

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'Usuarios';
    }

    public function add($userData)
    {
        try {
            $sql = 'INSERT INTO ' . $this->table . '(usr_usuario, usr_email, usr_senha, usr_telefone) VALUES (:username, email, password, tel)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $userData['usr_usuario']);
            $stmt->bindParam(':email', $userData['usr_email']);
            $stmt->bindParam(':password', $userData['usr_senha']);
            $stmt->bindParam(':tel', $userData['usr_telefone']);
            $stmt->execute();
            return ['sucess' => true];
        } catch (\PDOException $e) {
            return ['sucess' => false, 'error' => $e->getMessage()];
        }
    
    }
    
    public function verifyExist($username, $email)
        {
            try {
                $sql = 'SELECT * FROM ' . $this->table . ' WHERE usr_usuario = :username AND usr_email = :email';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                return ['success' => false, 'error' => $e->getMessage()];
            }
        }



}



