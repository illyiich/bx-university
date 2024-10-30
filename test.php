<?php

function main(array $arguments): void
{
	array_shift($arguments);
	$command = array_shift($arguments);

	switch ($command) {
		case "list":
			listCommand();
			break;
		case "add":
			addCommand($arguments);
			break;
		case "done":
			markCommand($arguments, true);
			break;
		case "undone":
			markCommand($arguments, false);
			break;
		case "remove":
			removeCommand($arguments);
			break;
		default:
			echo "Unknown command\n";
			exit(1);
	}

	exit(0);
}

function markCommand(array $arguments, bool $completed): void
{
	$fileName = date('Y-m-d') . '.txt';
	$filePath = __DIR__ . '/data/' . $fileName;

	if (!file_exists($filePath)) {
		echo "Nothing to do here\n";
		return;
	}

	$content = file_get_contents($filePath);
	$todos = unserialize($content, ['allowed_classes' => false]) ?: [];

	if (empty($todos)) {
		echo "Nothing to do here\n";
		return;
	}

	foreach ($arguments as $num) {
		$index = (int)$num - 1;

		if (!isset($todos[$index])) {
			echo "Task $num does not exist.\n";
			continue;
		}

		$todos[$index]['completed'] = $completed;
		$todos[$index]['updated_at'] = time();
		$todos[$index]['completed_at'] = $completed ? time() : null;
	}

	file_put_contents($filePath, serialize($todos));
}

function addCommand(array $arguments): void
{
	$title = array_shift($arguments);

	if (empty($title)) {
		echo "Task title cannot be empty.\n";
		return;
	}

	$todo = [
		'id' => uniqid(),
		'title' => $title,
		'completed' => false,
		'created_at' => time(),
		'updated_at' => null,
		'completed_at' => null,
	];

	$fileName = date('Y-m-d') . '.txt';
	$filePath = __DIR__ . '/data/' . $fileName;

	// Чтение и проверка содержимого файла перед добавлением
	$todos = file_exists($filePath) ? unserialize(file_get_contents($filePath), ['allowed_classes' => false]) : [];
	$todos[] = $todo;

	// Запись данных в файл после добавления
	file_put_contents($filePath, serialize($todos));

	echo "Current tasks after addition:\n";
	var_dump($todos); // Отладочный вывод для проверки
}

function listCommand(): void
{
	$fileName = date('Y-m-d') . '.txt';
	$filePath = __DIR__ . '/data/' . $fileName;

	if (!file_exists($filePath)) {
		echo "Nothing to do here\n";
		return;
	}

	$content = file_get_contents($filePath);
	$todos = unserialize($content, ['allowed_classes' => false]) ?: [];

	if (empty($todos)) {
		echo "Nothing to do here\n";
		return;
	}

	echo "Listing tasks:\n";
	foreach ($todos as $index => $todo) {
		echo sprintf(
			"%d. [%s] %s\n",
			$index + 1,
			$todo['completed'] ? 'x' : ' ',
			$todo['title']
		);
	}
}