<?php
//                                    COOKIE - хранение состояния между HTTP - запросами. Хранит данные на ус-ве поользователя. Имеют срок годности
//$counter = 1;
//if (isset($_COOKIE['VISIT_COUNTER']))
//{
////    var_dump($_COOKIE['VISIT_COUNTER']);
////    echo $_COOKIE['VISIT_COUNTER'];
//    $counter = (int)$_COOKIE['VISIT_COUNTER'] + 1;
//}

//setcookie('VISIT_COUNTER', $counter, strtotime('+30 days')); //Счётчик cookie
//setcookie('VISIT_COUNTER', 1, time() = -1); //Удаление cookie

//$pages = [
//    'test.php' => 1,
//    'index.php' => 1,
//    'report.php' => 1,
//];
//
//setcookie('VISIT_COUNTER', json_encode($pages), time() +10000);

//echo '<pre>'; //для удобства отображения
//if (isset($_COOKIE['VISIT_COUNTER'])) {
//    var_export(json_decode($_COOKIE['VISIT_COUNTER'], true)); //Выведет то что было encode ($pages)
//}

//setcookie('VISIT_COUNTER', 1, [  //БЕЗОПАСНОСТЬ
//    'expires' => strtotime('+30 days'),
//    'secure' => false, //только по https
//    'httponly' => true, //только по http
//]);