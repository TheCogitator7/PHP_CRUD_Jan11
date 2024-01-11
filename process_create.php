<?php
file_put_contents('data/'.$_POST['title'], $_POST['description']);
echo '<a href="index.php?id='.$_POST['title'].'">처음으로</a>';
?>