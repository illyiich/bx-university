<?php

function removeCommand(array $arguments)
{
	$fileName = date('Y-m-d') . 'txt';
	$filePath = ROOT . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу

	if (!file_exists($filePath))
	{
		echo "Nothing to do here";
		return;
	}

	$content = file_get_contents($filePath); //Содержимое файла
	$todos = unserialize($content, [ //Преобразуем в массив, небезопасно
		'allowed_classes' => false,  //Для безопасности
	]);

	if (empty($todos)) //Если массив пустой
	{
		echo "Nothing to do here";
		return;
	}

	foreach ($arguments as $num) //Каждый аргумент как номер
	{
		$index = (int)$num - 1; // Преобразует номер задачи в индекс массива

		if (!isset($todos[$index])) // проверка, что по индексу что-то есть
		{
			echo "Task $num does not exist.\n";
			continue;
		}

		unset($todos[$index]); // Удаляет задачу по индексу
	}

	$todos = array_values($todos); // Сбрасывает индексы массива

	file_put_contents($filePath, serialize($todos)); // Сохраняет изменения
}