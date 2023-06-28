
 
<!-- including header file -->

<?php include '../templates/header2.php'; ?>

<!-- including autoloader file -->

<?php include '../autoload/autoload1.inc.php'; ?>


<?php

$dataPost = new DataPost();

// updating post section starts

if (isset($_POST['updatePost'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subTitle'];
    $content = $_POST['content'];
    $img = $_FILES['img']['name'];

    // Retrieve the existing image file name
    $existingImage = $dataPost->showImage($id)['img']; // Replace with your own method to retrieve the existing image file name from the database

    // Check if a new image was uploaded
    if (!empty($img)) {
        // Remove the existing image file from the directory
        $dir = 'images/'.$existingImage;
        if (file_exists($dir)) {
            unlink($dir);
        }

        // Move the new image file to the desired directory
        $targetDirectory = 'images/'; // Replace with your target directory path
        $targetFile = $targetDirectory.basename($img);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
            // File upload successful
            $dataPost->updatePost($id, $title, $subtitle, $content, $img);
        } else {
            // File upload failed
            echo 'Sorry, there was an error uploading your file.';
        }
    } else {
        // No new image uploaded, update only the other fields in the database
        $dataPost->updatePost($id, $title, $subtitle, $content, $existingImage);
    }

    header('location: http://localhost/lovedone/post/blog.php');
}

// update post section ends

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$posts = (array) $dataPost->editPost($id);
foreach ($posts as $post) {
    ?>

<!-- HTML code -->

<div class="container my-5">
    <h1 class="text-center mb-5">Update Blog Post</h1>
    <form action="edit-post.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="create-form form-input-group">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title']; ?>"  required>
        </div>
        <div class="mb-3">
            <label for="subTitle" class="form-label">Sub Title</label>
            <input type="text" class="form-control" id="subTitle" name="subTitle" value="<?php echo $post['sub_title']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="userMessage" class="form-label">Content</label>
            <textarea class="form-control" id="userMessage" name="content" rows="5" required><?php echo $post['content']; ?></textarea>
        </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <h5>Edit Image</h5>
                <img src="images/<?php echo $post['img']; ?>" alt="edit image" class="edit-image">
            </div>
       
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="img" required>
        </div>
        <div class="btn-section d-flex">
            <button type="submit" class="create-btn" name="updatePost">Update Post</button>
            <a href="blog.php" class=" ms-3 cancel-btn">
                <span class="text">Cancel</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span>
            </a>
        </div>
    </form>
</div>

<?php
}
?>

<!-- including footer file -->

<?php

include '../templates/footer.php';

?>