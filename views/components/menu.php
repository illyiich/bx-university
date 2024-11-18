<?php
/**
 * @var array $items
 */

$currentPage = $_SERVER['REQUEST_URI'];
?>
<nav>
<!--    <a href="/?date=???">&minus;1 day</a>-->
<!--    <a href="/?date=???">&plus;1 day</a>-->
    <?php foreach ($items as $item): ?>
        <a href="<?= $item['url'];  ?>" class="<?= ($item['url'] === $currentPage) ? 'is-active' : ''; ?>"><?= $item['text']; ?></a>  <!--Чтобы при нажатии на Today, например, она стала активной (темнее)-->
    <?php endforeach; ?>
<!--    <a href="/report.php">Reporting</a>-->
</nav>

