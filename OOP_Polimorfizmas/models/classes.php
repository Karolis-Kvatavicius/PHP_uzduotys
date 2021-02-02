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
    protected $images;

    abstract function printInfo($link, $article_content);

    

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
        if(isset($record['images'])) {
            $this->images = explode('***', $record['images']);
        }   
    }

    public function getID()
    {
        return $this->id;
    }

    public function printArticle() {
        echo "<h1>$this->title</h1>";
        echo "<h3>Autorius: $this->author, Paskelbimo data: $this->publishDate</h3>";
        echo "<div style='display: flex; justify-content: center;'>";
        echo "<p>$this->shortContent</p>";
        echo "<img width='200' src='$this->preview'>";
        echo "</div>";
        echo "<p>$this->content</p>";
        foreach ($this->images as $image) {
            echo "<img width='200' src='$image'>";
        }
    }
}

class NewsArticle extends Article {
    function printInfo($link, $article_content) {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>".$this->author."</p>";
        echo "<p>Paskelbta: <strong>".$this->publishDate."</strong></p>";
        echo "<p>".$this->content."</p><br>";
        echo $link;
        echo '<br>';
        echo $article_content;
        echo "<br><br>";
        echo '</div>';
    }
}

class ShortArticle extends Article {
    function printInfo($link, $article_content) {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>".$this->author."</p>";
        echo "<p>Paskelbta: <strong>".$this->publishDate."</strong></p>";
        echo "<p>".$this->shortContent."</p><br>";
        echo $link;
        echo '<br>';
        echo $article_content;
        echo "<br><br>";
        echo '</div>';
    }
}

class PhotoArticle extends Article {
    function printInfo($link, $article_content) {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>".$this->author."</p>";
        echo "<p>Paskelbta: <strong>".$this->publishDate."</strong></p>";
        echo "<p>".$this->type."</p>";
        echo '<img width="300" src="'.$this->preview.'"><br>';
        echo $link;
        echo '<br>';
        echo $article_content;
        echo "<br><br>";
        echo '</div>';
    }
}