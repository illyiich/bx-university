<?php
/**
 * @var Todo $todo
 * @var bool $isHistory
 * @var ?int $truncateTodo
 */

?>
<article class="todo">
    <label>
        <input
            type="checkbox"
            <?= ($todo->isCompleted()) ? 'checked' : ''; ?>
            <?= ($isHistory) ? 'disabled' : ''; ?>
        >
        <?= safe(truncate($todo->getTitle(), option('TRUNCATE_TODO', 200))); ?>  <!--Защита от XSS-->
        <time datetime="<?= $todo->getCreatedAt()->format(DateTime::ATOM)?>"><?= $todo->getCreatedAt()->format('M, d')?></time>
    </label>
</article>

