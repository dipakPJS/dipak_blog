<?php

session_start();

/* including autoloader file */

include '../autoload/autoload1.inc.php';
$dataPost = new DataPost();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $dataPost->deleteImage($id);

    foreach ((array) $dataPost->deleteImage($id) as $posts) {
        unlink('images/'.$posts['img'].'');
    }

    $dataPost->deletePost($id);

    header('location: http://localhost/lovedone/post/blog.php');
} else {
    header('location: http://localhost/clean-blog/404.php');
}
