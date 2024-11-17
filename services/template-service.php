<?php

/**
 * @throws Exception
 */
function view(string $path, array $variables = []) : string
{
    // pages/index => ROOT . '/views/pages/index.php'
    if(!preg_match('/^[0-9A-Za-z\/_-]+$/', $path))
    {
        throw new Exception('Invalid template path');
    }

    $absolutePath = ROOT . "/views/$path.php";

    if(!file_exists($absolutePath)) //Существует ли шаблон
    {
        throw new Exception('Template not found');
    }

    extract($variables);

//    foreach ($variables as $varName => $varValue)
//    {
//        $$varName = $varValue;
//
//    }

    ob_start(); //Буфер вывода

    require $absolutePath; //Подключили файл шаблона

    return ob_get_clean();

}