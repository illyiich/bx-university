<?php

function addCommand(array $arguments)
{
	$title = array_shift($arguments); //Заголовок - 1-й элемент. Извлекает и удаляет название задачи из аргументов

	$todo = createTodo($title);

    addTodo($todo);
}