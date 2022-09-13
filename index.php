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

//Создаю метод, для записи текста в файл
    public function storeText($title, $text)
    {
        $post = [
            'title' => $title,
            'text' => $text,
            'author' => $this->author,
            'published' => $this->published
        ];
        $serializedPost = serialize($post);
        file_put_contents($this->slug, $serializedPost);
    }

    //Создаю метод для загрузки текста из файла
    public function loadText()
    {
        //Десереализую строку, сохраненную в файле
        $loadedPost = unserialize(file_get_contents($this->slug));
        //Присваиваю полям класса, значения полученного массива
        if (filesize($this->slug) !== 0) {
            $this->title = $loadedPost['title'];
            $this->text = $loadedPost['text'];
            $this->author = $loadedPost['author'];
            $this->published = $loadedPost['published'];
            echo $this->text;
        }
    }
}

$aaa = new TelegraphText('ilya', '.\ttt.txt');
//$aaa->storeText('gope', 'morz b solntce');
//$bbb = unserialize(file_get_contents('.\ttt.txt'));
//var_dump($bbb);
$aaa->loadText();