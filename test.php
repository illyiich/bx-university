<?php

declare(strict_types=1);

class Todo
{
    private string $id;

    private string $title;

    private bool  $completed = false; //используем геттер, чтобы получить доступ
    private int $createdAt;

    private ?int $updatedAt = null; //?Возможно int, возможно null

    private ?int $completedAt = null; //Инициализация

    public function __construct(string $title) //Для некой другой динамической части используем конструктор
    {
//        echo "run constructor" . PHP_EOL;
        //Обращаемся к свойствам
        $this->id = uniqid(); //динамические поля
        $this->title = $title;
        $this->createdAt = time(); //Время создания

        $this->setTitle($title); //Обращаемся к методам
    }

    public function done()
    {
        $now = time();

        $this->completed = true; //Изнутри класса обращаемся через this
        $this->completedAt = time();
        $this->updatedAt = time();
    }

    public function undone()
    {
        $this->completed = false; //Изнутри класса обращаемся через this
        $this->completedAt = null;
        $this->updatedAt = time();
    }

    public function isCompleted(): bool //геттер - выставляет наружу содержимое класса
    {
        return $this->completed;
    }

    public function getId(string $id): void //Кликаем правой кнопкой мыши по class > generate > setters (для private)
    {
        $this->id = $id;
    }

    public function getTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setTitle(string $title): void
    {
        $title = trim($title);
        if (strlen($title) === 0)
        {
            throw new Exception('Title cannot be empty');
        }
        $this->title = $title;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }


    public function getCompletedAt(): ?int
    {
        return $this->completedAt;
    }
}

//$todo1 = new Todo;
//$todo2 = new Todo;

$todo = new Todo("hello world");

var_dump($todo->isCompleted());

//$todo->setId('1233');

//var_dump('before', $todo);

$todo->done();
//$todo->undone();

//var_dump('after', $todo);

var_dump($todo->isCompleted());
// done todo


//$todo->title = "hello";

//$todo->id = uniqid();
//$todo->title = '123213';
//$todo->completed = false;
//$todo->createdAt = time();
//$todo->updatedAt = null;
//$todo->completedAt = null;

//var_dump($todo1->id, $todo2->id);
//var_dump($todo->id);
////var_dump($todo->id === 123);
