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
function title_list(){
    if(isset($_GET['id'])){
        echo $_GET['id'];
    }else{
        echo "Welcome";
    }
}
function content_list(){
    if(isset($_GET['id'])){
        echo file_get_contents('data/'.$_GET['id']);
    }else{
        echo "Hello, PHP!!";
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
        <a href="create.php">Create</a>
        <?php
            if(isset($_GET['id'])){
                echo '<a href="update.php?id='.$_GET['id'].'">Update</a>';
        ?>
        <form action="process_delete.php" method="POST">
            <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
            <input type="submit" value="Delete">
        </form>
        <?php        
            }
        ?>
        <h2><?php title_list() ?></h2>
        <p><?php content_list() ?></p>
    </body>
</html>