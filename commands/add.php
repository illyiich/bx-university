<?php

function addCommand(array $arguments)
{
	$title = array_shift($arguments); //Заголовок - 1-й элемент. Извлекает и удаляет название задачи из аргументов

	$todo = [
		'id' => uniqid(),
		'title' => $title,
		'completed' => false,
		'created_at' => time(), //текущее время
		'updated_at ' => null, // Время последнего обновления
		'completed_at ' => null, // Время завершения, если задача выполнена
	];

//	$serializedString = serialize($todo); //строковое представление todo
//
//	var_dump(unserialize($serializedString)); // Обратно в представление в виде массива

//	$fileName = date('Y-m-d') . 'txt'; // Создаёт имя файла на основе текущей даты
//	$filePath = ROOT . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу
//
//	if (file_exists($filePath)) //Проверка на существование
//	{
//		$content = file_get_contents($filePath); //Содержимое файла

		$todos = unserialize($content, [ //Преобразуем в массив, небезопасно
			'allowed_classes' => false,  //Для безопасности. Только безопасные типы данных
		]);
		$todos[] = $todo; //Добавили todo в todos. Добавляет новую задачу в массив
		file_put_contents($filePath, serialize($todos)); //serialize - генерирует пригодное для хранения представление переменной
	}
	else
	{
		$todos = [ $todo ]; // Если файла нет, создаёт новый массив с добавленной задачей

		file_put_contents($filePath, serialize($todos)); // Сохраняет массив в новый файл
	}

	file_put_contents($filePath, $title . "\n", FILE_APPEND); //Добавили title в файл по адресу filePath. Используется дозапись вместо перезаписи

	var_dump($filePath);
}