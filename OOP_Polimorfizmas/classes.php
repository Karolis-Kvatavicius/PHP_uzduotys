<?php

abstract class Article
{
    protected $id;
    protected $author;
    protected $shortContent;
    protected $content;
    protected $publishDate;
    protected $type;
    protected $addDate;
    protected $title;
    protected $preview;

    public function __construct($record)
    {
        $this->id = $record['id'];
        $this->author = $record['author'];
        $this->shortContent = $record['shortContent'];
        $this->content = $record['content'];
        $this->publishDate = $record['publishDate'];
        $this->type = $record['type'];
        $this->addDate = $record['addDate'];
        $this->title = $record['title'];
        $this->preview = $record['preview'];
    }
}

class NewsArticle extends Article {
    function printInfo() {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>".$this->author."</p>";
        echo "<p>Paskelbta: <strong>".$this->publishDate."</strong></p>";
        echo "<p>".$this->content."</p><br>";
        echo '</div>';
    }
}

class ShortArticle extends Article {
    function printInfo() {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>".$this->author."</p>";
        echo "<p>Paskelbta: <strong>".$this->publishDate."</strong></p>";
        echo "<p>".$this->shortContent."</p><br>";
        echo '</div>';
    }
}

class PhotoArticle extends Article {
    function printInfo() {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>".$this->author."</p>";
        echo "<p>Paskelbta: <strong>".$this->publishDate."</strong></p>";
        echo "<p>".$this->type."</p>";
        echo '<img width="300" src="'.$this->preview.'"><br>';
        echo '</div>';
    }
}