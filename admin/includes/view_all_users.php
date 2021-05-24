<table class='table table-bordered table-striped table-hover'>
      <thead>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th class='w-25'>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Role</th>
        <th>Aprovment</th>
        <th>Option</th>

      </thead>
       <tbody>
       <?php 
      $query = "SELECT * FROM users";
      $select_users = mysqli_query($connection,$query); 
      while($row = mysqli_fetch_assoc($select_users)){
      $user_id = $row['user_id'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
      $user_role = $row['user_role'];
      

     echo "<tr class='{$user_role}'>";
       echo "<td>{$user_id}</td>";
       echo "<td>{$username}</td>";
       echo "<td>{$user_password}</td>";
       echo "<td>{$user_firstname}</td>";


      // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
      // $select_categories_id = mysqli_query($connection,$query); //smjestam kategorije u bazu podataka
      // while($row = mysqli_fetch_assoc($select_categories_id)){
      // $cat_id = $row['cat_id'];
      // $cat_title = $row['cat_title'];

      //  echo "<td>{$cat_title}</td>";

      // }

       echo "<td>{$user_lastname}</td>";
       echo "<td>{$user_email}</td>";
       echo "<td>{$user_image}</td>";
       echo "<td>{$user_role}</td>";

       echo "<td>";
       echo "<div class='d-flex'>";
       echo "<a class='btn btn-info edit-m' href='users.php?change_to_admin={$user_id}'>Admin</a>";
       echo "<a class='btn btn-danger' href='users.php?change_to_sub={$user_id}'>Subscriber</a>";
       echo "</div>";
       echo "<td>";
       echo "<a class='btn btn-info edit-m' href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a>";
       echo "<a onClick=\"javascript:return confirm('Are you sure you want to delete?');\" class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a>";
       echo "</td>";
      echo "</tr>";
      }
      ?>
     </tbody>
</table>

<?php 



//approve komentara
if(isset($_GET['change_to_admin'])) {

    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE `users` SET `user_role` = 'admin' WHERE `user_id` = {$the_user_id}";
    $approve_user_query = mysqli_query($connection, $query); 
    header("location:users.php");
}


//unaprove komentara
if(isset($_GET['change_to_sub'])) {

    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE `users` SET `user_role` = 'subscriber' WHERE `user_id` = {$the_user_id}";
    $approve_user_query = mysqli_query($connection, $query); 
    header("location:users.php");
}

//delete komentara
if(isset($_GET['delete'])){
  $the_user_id = $_GET['delete'];

$query = "DELETE FROM users WHERE user_id = {$the_user_id}";
$delete_user_query = mysqli_query($connection,$query);
header("Location: users.php"); exit;

}

?>


<script>
 
</script>