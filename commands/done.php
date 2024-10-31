<?php

function doneCommand(array $arguments) //php 6.php done 2
{
	$fileName = date('Y-m-d') . 'txt';
	$filePath = ROOT . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу

	if (!file_exists($filePath))
	{
		echo "Nothing to do here";
		return;
	}

	$content = file_get_contents(($filePath)); //Содержимое файла
	$todos = unserialize($content, [ //Преобразуем в массив, небезопасно
		'allowed_classes' => false,  //Для безопасности
	]);

	if (empty($todos)) //Если массив пустой
	{
		echo "Nothing to do here";
		return;
	}

	$now = time();

	foreach ($arguments as $num) //Каждый аргумент как номер
	{
		$index = (int)$num - 1;
		if (!isset($todos[$index])) // проверка, что по индексу что-то есть
		{
			echo "Task $num does not exist.\n";
			continue;
		}
		$todos[$index] = array_merge($todos[$index], [ //Слияние 2-х массивов
			'completed' => true,
			'updated_at' => $now,
			'completed_at' => $now,
		]);
	}

	file_put_contents($filePath, serialize($todos));
}