<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>
    <section class="content">
        <header>
            <span class="icon">📝</span>
            <h1>Todoist</h1>
        </header>

        <main>

            <?php

            require_once  __DIR__ . '/../boot.php'





            ?>

            <article class="todo">
                <label>
                    <input type="checkbox" checked>
                    My todo 1
                </label>
            </article>
            <article class="todo">
                <label>
                    <input type="checkbox" checked>
                    My todo 2
                </label>
            </article>

            <form action="/" method="post" class="add-todo">
                <input type="text" placeholder="What to do?">
                <button type="submit">Save</button>
            </form>
        </main>

        <footer>
            &copy; 2030 Todoist by Bitrix University
        </footer>

    </section>

</body>
</html>