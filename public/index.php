<?php
// php -S localhost:8000 -t public
// php -S localhost:8000
//http://localhost:8000/?date=2024-11-01 - за прошлую дату

require_once  __DIR__ . '/../boot.php';

$time = null;
$isHistory = false;
$title = 'Todoist';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $title = trim($_POST['title']);

    $title = strip_tags($title); //Без тегов

    if (strlen($title) > 0)
    {
        $todo = createTodo($title);

        addTodo($todo);

        redirect('/?saved=true');
    }
    else
    {
        $errors[] = 'Task cannot be empty';
    }

//    header('location: /');
}

if (isset($_GET['date']))
{
    $time = strtotime($_GET['date']);
    if ($time === false)
    {
        $time = time();
    }

    $today = date('Y-m-d');
    if ($today !== date('Y-m-d', $time))
    {
        $isHistory = true;
        $title = sprintf('Todoist :: %s', date('j M', $time));
    }
}


echo view('Layout', [
    'title' => $title,
    'bottomMenu' => [
        ['url' => '/', 'text' => 'Today'],
        ['url' => '/report.php', 'text' => 'Reporting'],
    ],
    'content' => view('pages/index', [
        'todos' => getTodos($time),
        'isHistory' => $isHistory,
        'errors' => $errors,
    ]),
]);

//                HTTP - запросы
//var_dump($_REQUEST); // request = get + post + cookie
//
//var_dump($_COOKIE); die;
//
//$_SERVER
//    $_GET
//        $_POST