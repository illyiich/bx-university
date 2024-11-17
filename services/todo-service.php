<?php

function createTodo(string $title): array
{
    return [
        'id' => uniqid(),
        'title' => $title,
        'completed' => false,
        'created_at' => time(), //текущее время
        'updated_at ' => null, // Время последнего обновления
        'completed_at ' => null, // Время завершения, если задача выполнена
    ];
}
function mapTodos(array $todos, array $positions, Closure $callback): array
{
    foreach ($positions as $position) //Каждый аргумент как номер
    {
        $index = (int)$position - 1;

        if (!isset($todos[$index])) // проверка, что по индексу что-то есть
        {
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