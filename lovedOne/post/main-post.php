<!-- including header file -->

<?php include '../templates/header2.php'; ?>

<!-- including autoloader file -->

<?php include '../autoload/autoload1.inc.php';

$dataPost = new DataPost();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$single_post = $dataPost->singlePost($id);

foreach ((array) $single_post as $rows) { ?>


<div class="container container-post mt-5">

    <img src="../post/images/<?php echo $rows['img']; ?>" alt="post image">
    <div class="text-center main-post-text">
      <h1>
        <!-- php code here -->
        <?php

        echo $rows['title'];

    ?>
      </h1>
      <p><?php echo $rows['sub_title']; ?></p>
    </div>
  </div>

  <div class="container paragraph mt-5 pt-5">
    <div class="back-btn-section text-end">
    <a href="<?php echo APP_URL; ?>post/blog.php" class="back-cta">

<span class="hover-underline-animation"> Go Back </span>
<svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
    <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
</svg>


</a>
    </div>
    <h4 class="mb-1"><u><?php echo $rows['title']; ?>:</u></h4>

    <?php echo $rows['content']; ?>
    <br>
    <h5 class="text-end">Created by: <?php echo $rows['user_name']; ?> </h5>
    <p class="h6 text-end"><i>on <?php

$dateString = $rows['created_at'];
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
    $formattedDate = $date->format('F d, Y - h:i A');

    echo $formattedDate;

    ?></i></p>
    <!-- php code here -->
<?php

    if (isset($_SESSION['userName']) && $_SESSION['userId'] == $rows['user_id']) {
        ?>

  <div class="post-btn">
      <a href="edit-post.php?id=<?php echo $rows['id']; ?>">Edit</a>
      <a href="delete-post.php?id=<?php echo $rows['id']; ?>">Delete</a>
    </div>

<?php
    }
    ?>
   

  </div>


<?php

}

?>


 



<!-- including footer file -->

<?php include '../templates/footer.php'; ?>