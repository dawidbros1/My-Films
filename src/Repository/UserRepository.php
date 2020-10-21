<?php

namespace App\Repository;

class UserRepository extends \App\Model\Model
{
    public static function createUsersByData($data)
    {
        if ($data != null) {
            $users[] = new \App\Model\User;

            foreach ($data as $key => $simpleDataGame) {
                $user = new \App\Model\User;
                $user->setId($simpleDataGame['id']);
                $user->setEmail($simpleDataGame['email']);
                $user->setRole($simpleDataGame['role']);
                $user->setDate($simpleDataGame['date']);
                $user->setPassword($simpleDataGame['password']);
                $users[$key] = $user;
            }

            return $users;
        }

        return null;
    }

    public static function findOneByEmailAndPassword($email, $password)
    {
        $db = self::getConnection();
        $passHash = md5($password);
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->bindValue(':password', $passHash, \PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();

        $user = self::createUsersByData($result);
        return $user[0];
    }

    public static function getCurrentUser()
    {
        $db = self::getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $_SESSION['user_id'], \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll();

        $user = self::createUsersByData($result);
        return $user[0];
    }

    public static function getUserByEmail($email)
    {
        $db = self::getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();

        $user = self::createUsersByData($result);
        return $user[0];
    }

    public static function checkUniqueEmail($email)
    {
        $db = self::getConnection();

        $sql = "SELECT email FROM users WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
        if (count($result) == 0) return true;
        else return false;
    }

    public static function checkIfExistsEmail($email)
    {
        $db = self::getConnection();

        $sql = "SELECT email FROM users WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
        if (count($result) == 1) return true;
        else return false;
    }

    public static function save($user)
    {
        $db = self::getConnection();

        if ($user->getId() !== null) {
            $statement = $db->prepare('UPDATE users SET 
                email = :email,
                password = :password,
                date = :date,
                role = :role
                WHERE id = :id');
            $statement->bindValue(':id', $user->getId(), \PDO::PARAM_INT);
            $statement->bindValue(':date', $user->getDate(), \PDO::PARAM_STR);
        } else {
            $statement = $db->prepare('INSERT INTO users VALUES (NULL,:email,:password,:role,:date)');
            $now = date('Y-m-d H:i:s');
            $statement->bindValue(':date', $now, \PDO::PARAM_STR);
        }

        $statement->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
        $statement->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
        $statement->bindValue(':role', $user->getRole(), \PDO::PARAM_STR);

        $statement->execute();
    }
}
