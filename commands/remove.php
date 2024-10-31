<?php

function removeCommand(array $arguments)
{
	$todos = getTodosOrFail();

	$todos = mapTodos ($todos, $arguments, function ($todo) {
		return null;
	});


	storeTodos($todos);
}