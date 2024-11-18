<?php
/**
 * @var array $todo
 * @var bool $isHistory
 * @var ?int $truncateTodo
 */

?>
<article class="todo">
    <label>
        <input
            type="checkbox"
            <?= ($todo['completed']) ? 'checked' : ''; ?>
            <?= ($isHistory) ? 'disabled' : ''; ?>
        >
        <?= safe(truncate($todo['title'], option('TRUNCATE_TODO', 200))); ?>  <!--Защита от XSS-->
    </label>
</article>

