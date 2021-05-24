 <?php  include "includes/header.php"; ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    <?php 

if(isset($_POST['submit'])){
    $user_firstname = $_POST['username'];
    $user_lastname = $_POST['user_lastname'];
    $username =$_POST['username'];
    $email =$_POST['email'];
    $password =$_POST['password'];

    if(!empty($user_firstname) && !empty($user_lastname) && !empty($username) && !empty($email) && !empty($password)){
    $user_firstname = mysqli_real_escape_string($connection,$user_firstname);
    $user_lastname = mysqli_real_escape_string($connection,$user_lastname);
    $username = mysqli_real_escape_string($connection,$username);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);

    $query="SELECT randSalt from users";
    $select_randsalt_query = mysqli_query($connection,$query);
    if(!$select_randsalt_query){
        echo "sranje";
    }
    $row = mysqli_fetch_array($select_randsalt_query);
      $salt = $row['randSalt'];
      $password= crypt($password,$salt);
      $query= "INSERT INTO users (username, user_firstname,user_lastname, user_email, user_password, user_role) ";
      $query.="VALUES ('{$username}','{$user_firstname}','{$user_lastname}','{$email}','{$password}' ,'subscriber' )";
      $register_user_query = mysqli_query($connection, $query);
      $msg="Registracija uspjesno kreirana";
      if(!$register_user_query){
      die("sranje". mysqli_error($connection)) . ' ' . mysqli_errno($connection);
      }
    
    }else{
      $msg="Registracija nije uspjela";

    }
    
   
}else{
    $msg='';
}
?>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                <h4 class='alert alert-info'><?php echo $msg ?></h4>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="user_firstname" class="sr-only">First name:</label>
                            <input type="text" name="user_firstname" id="user_firstname" class="form-control" placeholder="Enter Desired firstname">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname" class="sr-only">Last name:</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Enter Desired lastname">
                        </div>
                        <div class="form-group" hidden>
                            <label for="user_role" class="sr-only">user_role</label>
                            <input type="text" name="user_role" id="user_role" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-success btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
