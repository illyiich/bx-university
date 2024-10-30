<?php

// php 6.php list
// php 6.php list 2022-10-12
// php 6.php list yesterday
// php 6.php add "Wake up"
// php 6.php add "Drink coffee"
// php 6.php complete 1 2
// php 6.php remove 2 (rm)


function main (array $arguments): void
{
//	unset($arguments[0]); //выбрасывают 1 аргумент
	array_shift($arguments);

	$command = array_shift($arguments); // альтернатива, сдвигает массив, выбрасывает 1-й элемент, команда встает на 1-е место по 0-му ключу

//	var_dump($command, $arguments); // нужное значение в command

	switch ($command)
	{
		case "list":
			listCommand($arguments);
		case "add":
			addCommand($arguments);
			break;
		case "complete":
			 completeCommand($arguments);
			break;
		case "remove":
			removeCommand($arguments);
			break;
		default:
			echo "Unknown command";
			exit(1); //Код ошибки

	}

	exit (0); //Команды успешно выполнились
}



function addCommand(array $arguments)
{
	$title = array_shift($arguments); //Заголовок - 1-й элемент

	$todo = [
		'id' => uniqid(),
		'title' => $title,
		'completed' => false,
	];

//	$serializedString = serialize($todo); //строковое представление todo
//
//	var_dump(unserialize($serializedString)); // Обратно в представление в виде массива

	$fileName = date('Y-m-d') . 'txt';
	$filePath = __DIR__ . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу

	if (file_exists($filePath)) //Проверка на существование
	{
		$content = file_get_contents(($filePath)); //Содержимое файла
		$todos = unserialize($content, [ //Преобразуем в массив, небезопасно
			'allowed_classes' => false,  //Для безопасности
		]);
		$todos[] = $todo; //Добавили todo в todos
		file_put_contents($filePath, serialize($todos)); //serialize - генерирует пригодное для хранения представление переменной
	}
	else
	{
		$todos = [ $todo ];

		file_put_contents($filePath, serialize($todos));
	}

	file_put_contents($filePath, $title . "\n", FILE_APPEND); //Добавили title в файл по адресу filePath. Используется дозапись вместо перезаписи

	var_dump($filePath);
}

function removeCommand(array $arguments)
{


}

function completeCommand(array $arguments)
{


}

function listCommand(array $arguments)
{
	$fileName = date('Y-m-d') . 'txt';
	$filePath = __DIR__ . '/data/' . $fileName; //Текущая директория + папка data + fileName. Абсолютный путь к файлу

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

	foreach ($todos as $index => $todo)
	{
		echo sprintf(
			"%s. [%s] %s \n", //Индекс. [] Задача
			($index + 1),
			$todo['completed'] ? 'x' : ' ',
			$todo['title']
		);
	}
}


main($argv);
