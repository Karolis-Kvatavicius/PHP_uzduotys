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
    protected $temos;
    protected $komentarai;
    protected $komentaru_skaicius;

    abstract function printInfo($link, $article_content, $user);



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
        if (isset($record['komentaru_skaicius'])) {
            $this->komentaru_skaicius = $record['komentaru_skaicius'];
        }
        if (isset($record['images'])) {
            $this->images = explode('***', $record['images']);
        }
        if (isset($record['temos'])) {
            $this->temos = explode('***', $record['temos']);
        }
        if (isset($record['komentarai'])) {
            $temp = explode('***', $record['komentarai']);
            foreach ($temp as $value) {
                $this->komentarai[] =  explode(';', $value);
            }
        }
    }

    public function getID()
    {
        return $this->id;
    }

    public function printArticle($admin = false, $user = false)
    {
        if ($admin && $user) {
            // Articles format for admin control panel
            echo "<h1>Antraštė: $this->title</h1>";
            echo "<h3>Autorius: $this->author";
            echo "<h3>Paskelbimo data: $this->publishDate</h3>";
            echo "<h3>Reprezentacinė nuotrauka:</h3>";
            echo "<img width='200' src='$this->preview'>";
            echo "<p><strong>Trumpas turinys:</strong> $this->shortContent</p>";
            echo "<p><strong>Turinys:</strong> $this->content</p>";
            echo "<a href='../controllers/delete_article.php?id=$this->id&user=$user'>Ištrinti straipsnį</a>";
            return;
        }
        echo "<h1>Antraštė: $this->title</h1>";
        echo "<h3>Autorius: $this->author";
        echo "<h3>Paskelbimo data: $this->publishDate</h3>";
        echo "<h3>Reprezentacinė nuotrauka:</h3>";
        echo "<img width='200' src='$this->preview'>";
        echo "<p><strong>Trumpas turinys:</strong> $this->shortContent</p>";
        echo "<p><strong>Turinys:</strong> $this->content</p>";
        echo '<h4>Papildomos nuotraukos:</h4>';
        foreach ($this->images as $image) {
            echo "<img width='200' src='$image'>";
        }
        echo '<h4>Straipsnio temos:</h4>';
        foreach ($this->temos as $tema) {
            echo "<p>$tema</p>";
        }
        echo '<h4>Komentarai:</h4>';
        if (!empty($this->komentarai)) {
            foreach ($this->komentarai as $komentaras) {
                echo "<div style='border: 1px solid indigo; margin: 0 50px 10px 50px;'>";
                echo "<p>$komentaras[1]</p>";
                echo "<h5>Komentavo: $komentaras[3]</h5>";
                echo "</div>";
            }
        } else {
            echo "<p>Komentarų nėra...</p>";
        }
    }
}

class NewsArticle extends Article
{
    function printInfo($link, $article_content, $user)
    {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>" . $this->author . "</p>";
        echo "<p>Paskelbta: <strong>" . $this->publishDate . "</strong></p>";
        echo "<p><b>Atnaujinta:</b> <i>" . $this->addDate . "</i></p>";
        echo "<p>" . $this->content . "</p>";
        echo "<p>" . $this->komentaru_skaicius . " komentarų</p>";
        echo $link;
        echo '<br>';
        echo $article_content;
        if (isset($user['role']) && $user['role'] == "Autorius" && $user['vartotojas'] != $this->author) {
            echo "<a href='comment_view.php?id=$this->id'>Komentuoti</a>";
        } else if (isset($user['role']) && $user['role'] == "StandartinisVartotojas") {
            echo "<a href='comment_view.php?id=$this->id'>Komentuoti</a>";
        } else if (isset($user['role']) && $user['role'] == "Administratorius") {
            echo "<a href='../controllers/delete_article.php?id=$this->id'>Ištrinti straipsnį</a>";
        }
        echo "<br><br>";
        echo '</div>';
    }
}

class ShortArticle extends Article
{
    function printInfo($link, $article_content, $user)
    {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>" . $this->author . "</p>";
        echo "<p>Paskelbta: <strong>" . $this->publishDate . "</strong></p>";
        echo "<p><b>Atnaujinta:</b> <i>" . $this->addDate . "</i></p>";
        echo "<p>" . $this->shortContent . "</p>";
        echo "<p>" . $this->komentaru_skaicius . " komentarų</p>";
        echo $link;
        echo '<br>';
        echo $article_content;
        if (isset($user['role']) && $user['role'] == "Autorius" && $user['vartotojas'] != $this->author) {
            echo "<a href='comment_view.php?id=$this->id'>Komentuoti</a>";
        } else if (isset($user['role']) && $user['role'] == "StandartinisVartotojas") {
            echo "<a href='comment_view.php?id=$this->id'>Komentuoti</a>";
        } else if (isset($user['role']) && $user['role'] == "Administratorius") {
            echo "<a href='../controllers/delete_article.php?id=$this->id'>Ištrinti straipsnį</a>";
        }
        echo "<br><br>";
        echo '</div>';
    }
}

class PhotoArticle extends Article
{
    function printInfo($link, $article_content, $user)
    {
        echo '<div style="border: 1px solid indigo; text-align: center; margin: 20px;">';
        echo "<h2>$this->title</h2>";
        echo "<p>" . $this->author . "</p>";
        echo "<p>Paskelbta: <strong>" . $this->publishDate . "</strong></p>";
        echo "<p><b>Atnaujinta:</b> <i>" . $this->addDate . "</i></p>";
        echo "<p>" . $this->type . "</p>";
        echo '<img width="300" src="' . $this->preview . '">';
        echo "<p>" . $this->komentaru_skaicius . " komentarų</p>";
        echo $link;
        echo '<br>';
        echo $article_content;
        if (isset($user['role']) && $user['role'] == "Autorius" && $user['vartotojas'] != $this->author) {
            echo "<a href='comment_view.php?id=$this->id'>Komentuoti</a>";
        } else if (isset($user['role']) && $user['role'] == "StandartinisVartotojas") {
            echo "<a href='comment_view.php?id=$this->id'>Komentuoti</a>";
        } else if (isset($user['role']) && $user['role'] == "Administratorius") {
            echo "<a href='../controllers/delete_article.php?id=$this->id'>Ištrinti straipsnį</a>";
        }
        echo "<br><br>";
        echo '</div>';
    }
}
