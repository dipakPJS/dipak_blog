
 
<!-- including header file -->

<?php include '../templates/header2.php'; ?>

<!-- including autoloader file -->

<?php include '../autoload/autoload1.inc.php'; ?>



<?php

$dataPost = new DataPost();

// Check if the form is submitted
if (isset($_POST['createPost'])) {
    $title = $_POST['title'];
    $sub_title = $_POST['subTitle'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $user_id = $_SESSION['userId'];
    $user_name = $_SESSION['userName'];
    $category_id = $_POST['categories'];

    // Directory to store the uploaded image
    $dir = 'images/'.basename($image);

    // Call the createPost method
    $dataPost->createPost($title, $sub_title, $content, $category_id, $image, $user_id, $user_name);

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
        header('location: http://localhost/lovedone/post/blog.php');
        exit;
    } else {
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
         failed to create a post
        </div>
      </div>';
    }
}

?>

<!-- now html code -->

<div class="container my-5">
    <h1 class="text-center mb-5">Create Blog Post</h1>
    <form action="create.php" method="post" enctype="multipart/form-data" class="create-form form-input-group">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="subTitle" class="form-label">Sub Title</label>
            <input type="text" class="form-control" id="subTitle" name="subTitle" required>
        </div>
        <div class="mb-3">
            <label for="userMessage" class="form-label">Content</label>
            <textarea class="form-control" id="userMessage" name="content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="categories" class="form-label">Select categories</label>
            <select name="categories" class="form-select" id="categories" aria-label="Default select example" required>
            <?php
// Retrieve categories from the database or any other source
$categories = ['Nature', 'Home', 'Future'];

foreach ($categories as $category) {
    echo '<option value="'.strtolower($category).'">'.$category.'</option>';
}
?>

        </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="create-btn" name="createPost">Create Post</button>
    </form>
</div>


<!-- including footer file -->

<?php

include '../templates/footer.php';

?>