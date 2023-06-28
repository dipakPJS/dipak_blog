<!-- including autoloader  file -->
<?php include '../autoload/autoload1.inc.php'; ?>


<!-- including header file -->

<?php include '../templates/header2.php'; ?>

<?php

$dataPost = new DataPost();

if (isset($_POST['loginUser'])) {
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];

    $dataPost->loginUser($email, $password);
}

?>

<div class="container login-container">

        <!-- login form starts -->
        <form class="row g-3 main-form mt-5 p-5" action="login.php" method="post">
  <div class="col-md-12 form-input-group" >
    <label for="email" class="">Email:</label>
    <input type="email" name="userEmail" class="form-control" id="email" placeholder="please enter your email" required>
  </div>
  <div class="col-md-12 form-input-group">
    <label for="password" class="">Password:</label>
    <input type="password" name="userPassword" class="form-control" id="password" placeholder="please enter your password" required>
  </div>
 
  <div class="col-12">
    <button type="submit" class="login-btn mb-2" name="loginUser">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="button-inner">Login</div>
    </button>
    
    <p class="text-success">Don't have an account,   <a href="<?php echo APP_URL; ?>auth/register.php" class="">Register Account</a></p>
  
  </div>
</form>
                 <!-- login form ends -->

             

</div>



<!-- including footer file -->

<?php include '../templates/footer.php'; ?>