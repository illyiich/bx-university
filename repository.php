<?php

function getTodos(?int $time = null): array
{
	$filePath = getRepositoryPath($time);

	if (!file_exists($filePath))
	{
		return []; //вернули пустой массив
	}

	$content = file_get_contents(($filePath)); //Содер	жимое файла
	$todos = unserialize($content, [ //Преобразуем в массив, небезопасно
		'allowed_classes' => false,  //Для безопасности
	]);

	return is_array($todos) ? $todos : [];
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

function storeTodos(array $todos, ?int $time = null)
{
	$filePath = getRepositoryPath($time);

	file_put_contents($filePath, serialize($todos)); //serialize - генерирует пригодное для хранения представление переменной

}

function getRepositoryPath(?int $time): string
{
	$time = $time ?? time();

	$fileName = date('Y-m-d', $time) . 'txt';
	return ROOT . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу
}

