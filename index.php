<?php


class TelegraphText
{
    public $text;
    public $title;
    public $author;
    public $published;
    public $slug;

    public function __construct($author, $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date('Y-m-d H:i:s');
    }

    public function storeText()
    {
        $post = [
            'title' => $this->title,
            'text' => $this->text,
            'author' => $this->author,
            'published' => $this->published
        ];
        $serializedPost = serialize($post);
        file_put_contents($this->slug, $serializedPost);
    }

    public function loadText()
    {
        $loadedPost = unserialize(file_get_contents($this->slug));
        if (filesize($this->slug) !== 0) {
            $this->title = $loadedPost['title'];
            $this->text = $loadedPost['text'];
            $this->author = $loadedPost['author'];
            $this->published = $loadedPost['published'];
            return $this->text;
        }
    }

    public function editText($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }
}

$telegraphText1 = new TelegraphText('ilya', '.\obj.txt');
var_dump($telegraphText1);

$telegraphText1->editText('new story', 'klsjhklsjfhakjhfakjdhkljashkajshafs');
var_dump($telegraphText1);

$telegraphText1->storeText();
echo $telegraphText1->loadText();
