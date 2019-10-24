<?php

namespace Models;

use Libs\Database as Database;
use PDO;


class Users
{
    public static function getUser($email, $pass)
    {
        $connection = Database::get();
        $query = $connection->prepare("Select * FROM utente WHERE utente.email = ?");
        $query->bindParam(1, $email, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetchAll();

        if (!empty($result)) {
            if (password_verify($pass, $result[0]["password"])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }


    }

    public static function getUserType($email)
    {
        $connection = Database::get();
        $query = $connection->prepare("Select * FROM utente WHERE utente.email = ?");
        $query->bindParam(1, $email, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetchAll();

        return $result[0]["tipo"];
    }

    public static function getUserStatus($email)
    {
        $connection = Database::get();
        $query = $connection->prepare("Select * FROM utente WHERE utente.email = ?");
        $query->bindParam(1, $email, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetchAll();

        return $result[0]["accountAbilitato"];
    }

    public static function createUser($name, $email, $type)
    {
        $pass = self::createRandPassword();
        $passhash = password_hash($pass,PASSWORD_BCRYPT);

        $connection = Database::get();
        $query = $connection->prepare("Insert INTO utente VALUES (Null,?,'',?,?,?,0,0)");
        $query->bindParam(1, $email, PDO::PARAM_STR);
        $query->bindParam(2, $passhash, PDO::PARAM_STR);
        $query->bindParam(3, $name, PDO::PARAM_STR);
        $query->bindParam(4, $type, PDO::PARAM_STR);
        $query->execute();

        MailSender::userPasswordSender($email,$pass,$name);
    }

    public static function createRandPassword()
    {
        $length = 10;
        $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = [];
        $max = mb_strlen($character) - 1;
        for ($i = 0; $i < $length; ++$i) {
            $string [] = $character[random_int(0, $max)];
        }
        return implode('', $string);
    }
}
