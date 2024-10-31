<?php

$todos = mapTodos ($todos, $arguments, function ($todo) {
	return null;
});

function mapTodos(array $todos, array $positions, Closure $callback): array
{
	foreach ($positions as $position) //Каждый аргумент как номер
	{
		$index = (int)$position - 1;

		if (!isset($todos[$index])) // проверка, что по индексу что-то есть
		{
			echo "Task $num does not exist.\n";
			continue;
		}

		$result = $callback($todos[$index]);
		if (is_array($result))
		{

			$todos[$index] = $result;
		}
		else
		{
			unset($todos[$index]);
		}

	}

	return array_values($todos);

}