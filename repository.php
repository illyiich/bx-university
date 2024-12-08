<?php

/*
 * @param int|null $time
 * @return Todo[]
 */
function getTodos(?int $time = null): array
{
//	$filePath = getRepositoryPath($time);
//
//	if (!file_exists($filePath))
//	{
//		return []; //вернули пустой массив
//	}
//
//	$content = file_get_contents(($filePath)); //Содер	жимое файла
//	$todos = unserialize($content, [ //Преобразуем в массив, небезопасно
//		'allowed_classes' => false,  //Для безопасности
//	]);
//
//	return is_array($todos) ? $todos : [];

    $connection = getDbConnection();

    $from = date('Y-m-d 00:00:00', $time);
    $to = date('Y-m-d 23:59:59', $time);

    $result = mysqli_query($connection, "
        SELECT * FROM todos
        WHERE created_at BETWEEN '{$from}' AND '{$to}'
        ORDER BY created_at
        LIMIT 100
        ");
    if (!$result)
    {
        throw new Exception(mysqli_error($connection));
    }

    $todos = [];

    while ($row = mysqli_fetch_assoc($result))
    {
        $todos[] = new Todo(
            $row['title'],
            $row['id'],
            $row['completed'] === 'Y',
            new DateTime($row['created_at']),
            $row['updated_at'] ? new DateTime($row['updated_at']) : null,
            $row['completed_at'] ? new DateTime($row['completed_at']) : null
        );
    }

    return $todos;

}

function getTodosOrFail(?int $time = null) : array
{
	$todos = getTodos($time);

	if (empty($todos)) //Если массив пустой
	{
		echo "Nothing to do here" . PHP_EOL;
		exit();
	}

	return $todos;
}

function saveTodo(Todo $todo) : bool //На вход принимает объект
{
//    $todos = getTodos($time);
////    $todos[] = $todo; //Добавили todo в todos. Добавляет новую задачу в массив
////
////    storeTodos($todos);

    $connection = getDbConnection(); //Инициализация соединения

    $id = mysqli_real_escape_string($connection, $todo->getId()); //Защита от sql-инъекций
    $title = mysqli_real_escape_string($connection, $todo->getTitle());
    $completed = $todo->isCompleted() ? 'Y' : 'N';
    $createdAt = $todo->getCreatedAt()->format('Y-m-d H:i:s');
    $updatedAt = $todo->getUpdatedAt() ?  $todo->getUpdatedAt()->format('Y-m-d H:i:s'): null;
    $completedAt = $todo->getCompletedAt() ? $todo->getCompletedAt()->format('Y-m-d H:i:s'): null;

    $updatedAt = $updatedAt ? "'{$updatedAt}'" : "NULL";
    $completedAt = $completedAt ? "'{$completedAt}'" : "NULL";

    $sql = "INSERT INTO todos (id, title, completed, created_at, updated_at, completed_at) VALUES (
        '{$id}', 
        '{$title}',
        '{$completed}',
        '{$createdAt}',
        {$updatedAt},
        {$completedAt} 
    );";

    $result = mysqli_query($connection, $sql);
    if (!$result)
    {
        throw new Exception(mysqli_error($connection));
    }

    return true;

}

//function storeTodos(array $todos, ?int $time = null)
//{
//	$filePath = getRepositoryPath($time);
//
//	file_put_contents($filePath, serialize($todos)); //serialize - генерирует пригодное для хранения представление переменной
//
//}
//
//function getRepositoryPath(?int $time): string
//{
//	$time = $time ?? time();
//
//	$fileName = date('Y-m-d', $time) . '.txt';
//	return ROOT . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу
//}
//
