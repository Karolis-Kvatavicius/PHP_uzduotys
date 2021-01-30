<?php

require "../controllers/images_preview_data.php";

foreach ($images as $image) {
?>
<img width="200" src="<?= $image ?>" alt="">
<?php
}