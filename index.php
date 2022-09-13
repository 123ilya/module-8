<?php

// Получаем содержимое файла
//$g = file_get_contents('.\test.txt');
//Изменяем содержимое файла
//file_put_contents('.\test.txt', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
//echo $g;
//Проверяем сущуществование файла или каталога
//echo file_exists('.\test.txt');
//-----------------------------------------------------------------------------------------------------------
// Создаю класс TelegraphText и добавляю в него соответствующие поля
class TelegraphText
{
    //Добавляю поля
    public $text, $title, $author, $published, $slug;

//Добавляю конструктор. При создании объекта ,конструктор инициализирует, указанные в нём переменные
    public function __construct($author, $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('Y-m-d H:i:s');
    }

    public function storeText($title, $text)
    {
        $arr = [
            'title' => $title,
            'text' => $text,
            'author' => $this->author,
            'published' => $this->published
        ];
        foreach ($arr as $item) {
            echo $item . PHP_EOL;
        }
    }
}
$aaa = new TelegraphText('ilya','ttt');
$aaa->storeText('gope','morz b solntce');
