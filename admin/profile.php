<?php include "includes/admin_header.php" ?>
              <?php 
           if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];

            $query = "SELECT * FROM users WHERE username = '{$username}' ";
            $select_user_profile_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_user_profile_query)){
              $user_id = $row['user_id'];
              $username = $row['username'];
              $user_password = $row['user_password'];
              $user_firstname = $row['user_firstname'];
              $user_lastname = $row['user_lastname'];
              $user_email = $row['user_email'];
              $user_image = $row['user_image'];
              $user_role = $row['user_role'];

            }

           }
              ?>



    <div id="wrapper">
      <!-- Navigation -->
      <?php include "includes/admin_navigation.php" ?>

      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
             <h1 class="page-header">
                Welcome to admin
                <small>Author</small>
              </h1>
                            <?php 
              if(isset($_POST['edit_user'])){

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

 
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$username}' ";

        $edit_user_query = mysqli_query($connection,$query);
        confirmQuery($edit_user_query);
        echo "<h4 class='alert alert-success'>Korisnik uspjesno editovan</h4>";
  }
              ?>

   <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname" >First name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
     <div class="form-group">
        <label for="user_lastname">Last name:</label>
        <input type="text" class='form-control' name="user_lastname" value="<?php echo $user_lastname; ?>">
      </div>

        <div class="form-group">
        <label for="user_role">User role</label>
        <br>
        <select value="user_role" name="user_role">
         <option value="<?php echo $user_role ?>">This user is <?php echo $user_role ?></option>
         <?php 
         if($user_role == 'admin'){
        echo " <option value='subscriber'>Subscriber</option>";

         }else{
        echo " <option value='admin'>Admin</option>";
             
         }
         ?>
         <option value="admin">Admin</option>
        </select>
        </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email"class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
<!-- 
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name="image">   
    </div> -->

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
    </div>


  <div class="form-group">
        <input type="submit" class="btn btn-primary" type="submit" name="edit_user" value="Update profile">
    </div>

</form>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

  <?php include "includes/admin_footer.php" ?>