<?php

class DB
{
    public static function getConnection()
    {

        $db_params = include('config/db_params.php');

        try {

            $dsn = "mysql:host={$db_params['host']};dbname={$db_params['dbname']}";
            $user = $db_params['username'];
            $passwd = $db_params['password'];

            return new PDO($dsn, $user, $passwd);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        }
}
