<?php

// php todo.php list
// php todo.php list 2022-10-12
// php todo.php list yesterday
// php todo.php add "Wake up"
// php todo.php add "Drink coffee"
// php todo.php done 1 2 [x]
// php todo.php undone 1 2 [ ]
// php todo.php remove 2 (rm)
// php todo.php report

require_once __DIR__ . '/boot.php';

function main (array $arguments)
{
//	unset($arguments[0]); //выбрасывают 1 аргумент
	array_shift($arguments); //Удаляет первый элемент массива ($arguments), представляющий имя файла скрипта

	$command = array_shift($arguments); // альтернатива, сдвигает массив, выбрасывает 1-й элемент, команда встает на 1-е место по 0-му ключу

//	var_dump($command, $arguments); // нужное значение в command

	switch ($command)
	{
		case "list":
			listCommand($arguments);
			break;
		case "add":
			addCommand($arguments);
			break;
		case "done":
			doneCommand($arguments);
			break;
		case "undone":
			undoneCommand($arguments);
			break;
		case "rm":
			removeCommand($arguments);
			break;
		case "report":
			reportCommand($arguments);
			break;
		default:
			echo "Unknown command";
			exit(1); //Код ошибки

	}

	exit (0); //Команды успешно выполнились
}

main($argv);
