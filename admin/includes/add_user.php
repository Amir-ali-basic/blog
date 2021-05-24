
<?php


  if(isset($_POST['create_user'])){

        $user_firstname= $_POST['user_firstname'];
        $user_lastname= $_POST['user_lastname'];
        $user_role= $_POST['user_role'];

        // $post_image= $_FILES['image']['name'];
        // $post_image_temp= $_FILES['image']['tmp_name'];

        $username= $_POST['username'];
        $user_email= $_POST['user_email'];
        $user_password= $_POST['user_password'];
        // $post_date= date('d-m-y');

      // move_uploaded_file($post_image_temp,"../images/$post_image");

$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";

$query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}') ";

      $create_user_query = mysqli_query($connection, $query);        

      confirmQuery($create_user_query);

      echo "<h4 class='alert alert-success'>User created. </h4>";
  }

   

?>

   

   <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
     <div class="form-group">
        <label for="user_lastname">Last name:</label>
        <input type="text" class='form-control' name="user_lastname">
      </div>

        <div class="form-group">
        <label for="user_role">User role</label>
        <select value="user_role" name="user_role">
         <option value="subscriber">Subscriber</option>
         <option value="admin">Admin</option>
        </select>
        </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email"class="form-control" name="user_email">
    </div>
<!-- 
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name="image">   
    </div> -->

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>


  <div class="form-group">
        <input type="submit" class="btn btn-primary" type="submit" name="create_user" value="Add user">
    </div>

</form>