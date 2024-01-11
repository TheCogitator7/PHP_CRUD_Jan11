<?php
function data_list(){
    $list=scandir('data');
    $i=0;
    while($i<count($list)){
        if($list[$i]!=='.' && $list[$i]!=='..'){
            echo '<li><a href="index.php?id='.$list[$i].'">'.$list[$i].'</a></li>';
        }
        $i++;
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol><?php data_list() ?></ol>
        <form action="process_update.php" method="POST">
                <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
            <p><input type="text" name="title" placeholder="Title" value="<?=$_GET['id'] ?>"></p>
            <p><textarea name="description" placeholder="Description"><?= file_get_contents('data/'.$_GET['id']); ?></textarea></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>