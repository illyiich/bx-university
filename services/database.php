<?php

function getDbConnection()
{
    static $connection = null;

    if ($connection === null)
    {
        $dbHost = option('DB_HOST'); //Данные для доступа
        $dbUser = option('DB_USER');
        $dbPassword = option('DB_PASSWORD');
        $dbName = option('DB_NAME');


        $connection = mysqli_init(); //Инициализация соединения

        $connected = mysqli_real_connect($connection, $dbHost, $dbUser, $dbPassword, $dbName); //Подключение
        if (!$connected)
        {
            $error = mysqli_connect_errno() . ': ' . mysqli_connect_error();
            throw new Exception($error);
        }

        $encodingResult = mysqli_set_charset($connection, 'utf8');
        if (!$encodingResult)
        {
            throw new Exception(mysqli_error($connection));
        }

    }

    return $connection;

}