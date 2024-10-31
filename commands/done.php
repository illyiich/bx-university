<?php

function doneCommand(array $arguments) //php 6.php done 2
{
	$todos = getTodosOrFail();

	$now = time();

	$todos = mapTodos($todos, $arguments, function ($todo) use ($now) {
		return array_merge($todo, [
			'completed' => true,
			'updated_at' => $now,
			'completed_at' => $now,
		]);
	});

	storeTodos($todos);
}