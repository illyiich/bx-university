<?php

session_start();

if (isset($_SESSION['USER'])) //Связали с session-write
{
    echo '<pre>';
    print_r($_SESSION['USER']);
}

//Вывод: Array
//(
//    [ID] => 12
//    [HASH] => vdvdzvzsdvsdvsfvdvdsvdsvsdvsdvsdcdsv4=
//)