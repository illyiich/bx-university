<?php
/**
 * @var array $todos
 * @var bool $isHistory
 */
?>
<main>

    <?php foreach ($todos as $todo):?>
        <?= view('components/todo', ['todo' => $todo, 'isHistory' => $isHistory ]); ?>
    <?php endforeach; ?>

    <?php if (!$isHistory): ?>
    <form action="/" method="post" class="add-todo">
        <input type="text" placeholder="What to do?">
        <button type="submit">Save</button>
    </form>
    <?php endif; ?>

</main>

