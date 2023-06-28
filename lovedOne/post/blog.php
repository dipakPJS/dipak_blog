<!-- including header file -->

<?php include '../templates/header2.php'; ?>

<!-- including autoloader file -->

<?php include '../autoload/autoload1.inc.php';

$dataPost = new DataPost();
$posts = $dataPost->showPost();

?>

<div class="container container-video mt-5">
    <video class="video" autoplay loop muted>
      <source src="../assets/img/roses.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="text-center video-text">
      <h1>
        <!-- php code here -->
        <?php

        if (isset($_SESSION['userName'])) {
            echo $_SESSION['userName'];
        } else {
            echo 'My_Blog';
        }

?>
      </h1>
      <p>Welcome to this blog where you will get lots of information below;</p>
    </div>
  </div>

  <!-- main blog container -->
  <div class="container text-center mt-5">
    <h1 class="mb-3">Popular posts</h1>
    <div class="row">
      <?php
if ($posts > 0) {
    foreach ((array) $posts as $rows) {
        ?>
        
        <div class="col-md-4 my-4">
        <div class="post-card">
          <div class="card-body">
            <div class="post-image">
            <a href="main-post.php?id=<?php echo $rows['id']; ?>" class="text-end text-primary"> <img src="../post/images/<?php echo $rows['img']; ?>" alt="blog_post image<?php echo $rows['id']; ?>">
            </a> </div>
            <h5 class="card-title"><?php echo $rows['title']; ?></h5>
            <p class="card-text"><?php echo $rows['sub_title']; ?></p>
            <p><i>Created_by: "</i><?php echo $rows['user_name']; ?>"  <p class="h6 text-center"><i>on <?php

$dateString = $rows['created_at'];
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
        $formattedDate = $date->format('F d, Y - h:i A');

        echo $formattedDate;

        ?></i></p></p>
            <a href="main-post.php?id=<?php echo $rows['id']; ?>" class="text-end text-primary">See More....</a>
          </div>
        </div>
      </div>
        
        
        <?php
    }
} else {
    echo "<p class='text-danger h4'>Empty Post</p>";
}
?>
     
    </div>
  </div>



<!-- including footer file -->

<?php include '../templates/footer.php'; ?>