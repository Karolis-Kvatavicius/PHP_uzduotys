<?php
abstract class Vartotojas {
    protected $id;
    protected $username;
    protected $vardas;
    protected $pavarde;
    protected $role;
    protected $statusas;

    public function __construct($user)
    {
        $this->id = $user['id'];
        $this->username = $user['username'];
        $this->vardas = $user['vardas'];
        $this->pavarde = $user['pavarde'];
        $this->role = $user['role'];
        $this->statusas = $user['statusas'];
    }
    
    public function printUserInfo() {
        echo "<div style='display: flex; justify-content: space-around;'>";
        echo "<div>";
        echo "<p><b>Vartotojo id:</b> $this->id</p>";
        echo "<p>Vartotojo username: $this->username</p>";
        echo "<p>Vardas: $this->vardas</p>";
        echo "<p>Pavarde: $this->pavarde</p>";
        echo "<p>Vartotojo rolė: $this->role</p>";
        echo "<p>Vartotojo statusas: $this->statusas</p>";
        echo "</div>";
        echo "<div>";
        echo "<h4>Galimi veiksmai:</h4>";

        if($this->statusas == "Uzblokuotas") {
            echo "<p><a href='../controllers/control_panel/block_user.php?id=$this->id&unblock=aktyvus'>Atblokuoti vartotoją</a></p>";
        } else {
            echo "<p><a href='../controllers/control_panel/block_user.php?id=$this->id'>Blokuoti vartotoją</a></p>";
        }
        
        echo "<p><a href='../controllers/control_panel/delete_only_user.php?id=$this->id'>Ištrinti tik vartotoją</a></p>";
        echo "<p><a href='user_comments.php?id=$this->id'>Vartotojo komentarai</a></p>";
        if($this->role == 'Autorius') {
            echo "<p><a href='user_articles.php?id=$this->id'>Vartotojo straipsniai</a></p>";
        }
        echo "<p><a href='../controllers/control_panel/delete_all_user_info.php?id=$this->id'>Ištrinti vartotoją ir visus jo duomenis</a></p><br>";
        echo "</div>";
        echo "</div>";
    }

}

class Administratorius extends Vartotojas {
    public function blockUser($user) {

    }

    public function deleteOnlyUser($user) {
        
    }

    public function deleteUserComments($user) {
        
    }

    public function deleteUserArticles($user) {
        
    }

    public function deleteUserAndAllUserInfo($user) {
        
    }
}

class StandartinisVartotojas extends Vartotojas {

}

class Autorius extends Vartotojas {
    
}