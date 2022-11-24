<?php

class Login
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function existsEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email=:email';
        $query = $this->db->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        return $query->rowCount();
    }

    public function createUser($data)
    {
        $response = false;

        if (!$this->existsEmail($data['email'])) {
            $password = hash_hmac('sha512', $data['password'], ENCRIPTKEY);

            $sql = 'INSERT INTO users(name, user, email, password) 
                VALUES(:name, :user, :email, :password)';

            $params = [
                ':name' => $data['name'],
                ':user' => $data['user'],
                ':email' => $data['email'],
                ':password' => $password
            ];

            $query = $this->db->prepare($sql);
            $response = $query->execute($params);
        }

        return $response;
    }
}
