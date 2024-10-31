<?php

function doneCommand(array $arguments) //php 6.php done 2
{
	$todos = getTodosOrFail();

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

	storeTodos($todos);
}