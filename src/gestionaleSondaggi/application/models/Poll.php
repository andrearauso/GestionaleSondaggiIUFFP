<?php


namespace Models;

use Libs\Database as Database;

class Poll
{
    public static function getAllPoll()
    {
        $connection = Database::get();
        $query = $connection->prepare("Select * FROM sondaggi");
        $query->execute();

        $result = $query->fetchAll();
        return $result;
    }
}