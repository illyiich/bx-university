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

            require_once  __DIR__ . '/../boot.php';

            $todos = getTodos();

            foreach ($todos as $todo)
            {



            ?>

            <article class="todo">
                <label>
                    <input type="checkbox" <?php
                        if ($todo['completed'])
                        {
                            echo "checked";
                        }

                    ?>>
                    <?php
                        echo $todo['title']

                    ?>
                </label>
            </article>

            <?php
            }
            ?>


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