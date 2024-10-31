<?php

function getTodos(?int $time = null): array
{
	$time = $time ?? time();

	$fileName = date('Y-m-d', $time) . 'txt';
	$filePath = ROOT . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу

	if (!file_exists($filePath))
	{
		return []; //вернули пустой массив
	}

	$content = file_get_contents(($filePath)); //Содержимое файла
	$todos = unserialize($content, [ //Преобразуем в массив, небезопасно
		'allowed_classes' => false,  //Для безопасности
	]);

	return is_array($todos) ? $todos : [];
}