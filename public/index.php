<?php

require_once  __DIR__ . '/../boot.php';

$title = "Todoist";
$todos = getTodos();

echo view('pages/index', [
        'title' => $title,
        'todos' => $todos,
]);
