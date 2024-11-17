<?php

require_once  __DIR__ . '/../boot.php';

echo view('Layout', [
    'title' => 'Todoist',
    'content' => view('pages/index', [
        'todos' => getTodos(),
    ]),
]);
