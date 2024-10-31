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


	$todos = getTodos();
	$todos[] = $todo; //Добавили todo в todos. Добавляет новую задачу в массив

	storeTodos($todos);

}