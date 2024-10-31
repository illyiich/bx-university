<?php

function undoneCommand(array $arguments)
{

	$todos = getTodosOrFail();

//	foreach ($arguments as $num) //Каждый аргумент как номер
//	{
//		$index = (int)$num - 1;
//
//		if (!isset($todos[$index])) // проверка, что по индексу что-то есть
//		{
//			echo "Task $num does not exist.\n";
//			continue;
//		}
//
//		$todos[$index] = array_merge($todos[$index], [ //Слияние 2-х массивов
//			'completed' => false,
//			'updated_at' => time(),
//			'completed_at' => null,
//		]);
//	}

	$todos = mapTodos ($todos, $arguments, function ($todo) {
		return array_merge($todo, [
			'completed' => false,
			'updated_at' => time(),
			'completed_at' => null,
		]);
	});


	storeTodos($todos);

}