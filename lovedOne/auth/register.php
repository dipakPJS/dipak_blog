
<!-- including autoloader  file -->
<?php include '../autoload/autoload1.inc.php'; ?>

<!-- including header file -->

<?php include '../templates/header2.php'; ?>

<?php

$dataPost = new DataPost();

if (isset($_POST['registerUser'])) {
    $email = $_POST['userEmail'];
    $password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
    $name = $_POST['userName'];
    $address = $_POST['userAddress'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $zipCode = $_POST['zip'];

    $dataPost->registerUser($email, $password, $name, $address,
        $city, $gender, $zipCode);
}

?>


<div class="container register-container">

        <!-- register form starts -->

        <form class="row g-3 main-form mt-5 form-input-group p-5" action="register.php" method="post">
  <div class="col-md-6 ">
    <label for="userEmail" class="form-label">Email</label>
    <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="please enter your email" required>
  </div>
  <div class="col-md-6">
    <label for="userPassword" class="form-label">Password</label>
    <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="please enter your password" required>
  </div>
  <div class="col-md-6">
    <label for="userName" class="form-label">Username:</label>
    <input type="text" class="form-control" name="userName" id="userName" placeholder="please enter your user-name" required>
  </div>
  <div class="col-md-6">
    <label for="address2" class="form-label">Address</label>
    <input type="text" class="form-control" name="userAddress" id="address2" placeholder="Apartment, studio, or floor" required>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" name="city" class="form-control" id="inputCity" placeholder="enter your city" required>
  </div>
  <div class="col-md-4">
    <label for="gender" class="form-label">Gender</label>
    <select id="gender" name="gender" class="form-select" required>
      <option value="">Select One</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" name="zip" class="form-control" id="inputZip" placeholder="example: 32903" required>
  </div>
  
  <div class="col-md-12">
  <button type="submit" class="register-btn mt-1" name="registerUser">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="button-inner">Register Account</div>
    </button>
<br><br>
    <p class="text-success">Already have an account, <a href="<?php echo APP_URL; ?>auth/login.php" class="">Login Account</a> </p>
    
  </div>
</form>
          <!-- register form ends -->

             

</div>



<!-- including footer file -->

<?php include '../templates/footer.php'; ?>