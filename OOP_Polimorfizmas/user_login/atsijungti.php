<?php
setcookie("vartotojas", "", time() - 3600, '/');
setcookie("vardas", "", time() - 3600, '/'); 
setcookie("pavarde", "", time() - 3600, '/');
setcookie('role', '', time() - 3600, '/');
header('Location: ../views/view.php');