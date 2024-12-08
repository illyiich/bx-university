<?php

declare(strict_types=1);

class Todo
{
    private string $id;

    private string $title;

    private bool  $completed = false; //используем геттер, чтобы получить доступ
    private DateTime $createdAt;

    private ?DateTime $updatedAt = null; //?Возможно int, возможно null

    private ?DateTime $completedAt = null; //Инициализация


    public function __construct(
        string $title,
        ?string $id = null,
        ?bool $completed = null,
        ?DateTime $createdAt = null,
        ?DateTime $updatedAt = null,
        ?DateTime $completedAt = null
    ) //Для некой другой динамической части используем конструктор
    {
//        echo "run constructor" . PHP_EOL;
        //Обращаемся к свойствам
        $this->id = $id ?? uniqid(); //динамические поля
        $this->completed = $completed ?? false;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->updatedAt = $updatedAt; //Время создания
        $this->completedAt = $completedAt;

        $this->setTitle($title); //Обращаемся к методам
    }

    public function done()
    {
        $now = new DateTime();

        $this->completed = true; //Изнутри класса обращаемся через this
        $this->completedAt = $now;
        $this->updatedAt = $now;
    }

    public function undone()
    {
        $this->completed = false; //Изнутри класса обращаемся через this
        $this->completedAt = null;
        $this->updatedAt = new DateTime();
    }

    public function isCompleted(): bool //геттер - выставляет наружу содержимое класса
    {
        return $this->completed;
    }

    public function getId(): string //Кликаем правой кнопкой мыши по class > generate > setters (для private)
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
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

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }


    public function getCompletedAt(): ?DateTime
    {
        return $this->completedAt;
    }
}

