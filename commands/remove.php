<?php

function removeCommand(array $arguments)
{

	$todos = getTodosOrFail();

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

	storeTodos($todos);
}