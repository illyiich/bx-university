<?php

function listCommand(array $arguments)
{
	$todos = getTodosOrFail();

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
