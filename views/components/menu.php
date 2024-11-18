<?php
/**
 * @var array $items
 */
?>
<nav>
<!--    <a href="/?date=???">&minus;1 day</a>-->
<!--    <a href="/?date=???">&plus;1 day</a>-->
    <?php foreach ($items as $item): ?>
        <a href="<?= $item['url'];  ?>" class="is-active"><?= $item['text']; ?></a>
    <?php endforeach; ?>
<!--    <a href="/report.php">Reporting</a>-->
</nav>