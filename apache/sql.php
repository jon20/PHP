<?php
//connect database
$link = mysqli_connect("localhost", "root", "", "oneline_sql");
if(!$link){
    die('can\'t connect:' .mysqli_connect_error());
}


//select database

$errors = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = null;
    if (!isset($_POST['name']) || !strlen($_POST['name'])){
        $errors['name'] = 'input a name';
    }else if (strlen($_POST['name']) > 40){
        $errors['name'] = '40';
    } else{
        $name = $_POST['name'];
    }
//check _POST
    $comment = null;
    if (!isset($_POST['comment']) || !strlen($_POST['comment'])) {
        $errors['comment'] = 'Are you truth?';
        # code...
    } else if (strlen($_POST['comment']) > 200){
        $errors['comment'] = '200';
    } else{
        $comment = $_POST['comment'];
    }

    if (count($errors) === 0) {
        $a =mysqli_real_escape_string($link, $name);
        $b  =mysqli_real_escape_string($link, $comment);
        $date = date('Y-m-d H:i:s');
        $sql = "insert into post (name, comment, created_at) values ('$a', '$b', '$date')";

        mysqli_query($link, $sql);
        mysqli_close($link);

        header('Location:http://' .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']);
    }


}

$sql = "select * from post order by created_at desc";
$result = mysqli_query($link, $sql);
if( !$result )
    echo mysqli_error($link);
$posts = array();
if ($result !== false && mysqli_num_rows($result)){
  while ($post = mysqli_fetch_assoc($result)){
    $posts[] = $post;
  }
}
include 'view/sql_view.php';
?>
