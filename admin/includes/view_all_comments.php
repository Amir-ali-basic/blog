<table class='table table-bordered table-striped table-hover'>
      <thead>
        <th>ID</th>
        <th>Author</th>
        <th class='w-25'>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approval</th>
        <th>Delete</th>
      </thead>
       <tbody>
       <?php 
      $query = "SELECT * FROM comments";
      $select_comments = mysqli_query($connection,$query); 
      while($row = mysqli_fetch_assoc($select_comments)){
      $comment_id = $row['comment_id'];
      $comment_author = $row['comment_author'];
      $comment_post_id = $row['comment_post_id'];
      $comment_author = $row['comment_author'];
      $comment_email = $row['comment_email'];
      $comment_content = $row['comment_content'];
      $comment_status = $row['comment_status'];
      $comment_date = $row['comment_date'];

     echo "<tr class='{$comment_status }'>";
       echo "<td>{$comment_id}</td>";
       echo "<td>{$comment_author}</td>";
       echo "<td>{$comment_content}</td>";


      // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
      // $select_categories_id = mysqli_query($connection,$query); //smjestam kategorije u bazu podataka
      // while($row = mysqli_fetch_assoc($select_categories_id)){
      // $cat_id = $row['cat_id'];
      // $cat_title = $row['cat_title'];

      //  echo "<td>{$cat_title}</td>";

      // }

       echo "<td>{$comment_email}</td>";
       echo "<td>{$comment_status}</td>";
       $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
       $select_post_id_query = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($select_post_id_query)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id={$post_id}'>$post_title</a></td>";


       }
       echo "<td>{$comment_date}</td>";
       echo "<td>";
       echo "<div class='d-flex'>";
       echo "<a class='btn btn-info edit-m' href='comments.php?approve=$comment_id'>Approve</a>";
       echo "<a class='btn btn-danger' href='comments.php?unapprove=$comment_id'>Upapprove</a>";
       echo "</div>";
       echo "<td>";
       // echo "<a class='btn btn-info edit-m' href='posts.php?source=edit_post&p_id='>Edit</a>";
       echo "<a onClick=\"javascript:return confirm('Are you sure you want to delete?');\" class='btn btn-danger' href='comments.php?delete=$comment_id'>Delete</a>";
       echo "</td>";
      echo "</tr>";
      }
      ?>
     </tbody>
</table>

<?php 



//approve komentara
if(isset($_GET['approve'])) {

    $the_comment_id = $_GET['approve'];
    $query = "UPDATE `comments` SET `comment_status` = 'approved' WHERE `comments`.`comment_id` = {$the_comment_id}";
   // $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = {$the_comment_id}";
    $approve_comment_query = mysqli_query($connection, $query); 
    header("location:comments.php");
}


//unaprove komentara
if(isset($_GET['unapprove'])) {

    $the_comment_id = $_GET['unapprove'];
    $query = "UPDATE `comments` SET `comment_status` = 'unapproved' WHERE `comments`.`comment_id` = {$the_comment_id}";
    //$query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = {$the_comment_id} ";
    $unapprove_comment_query = mysqli_query($connection, $query); 
    header("location:comments.php");
}

//delete komentara
if(isset($_GET['delete'])){
  $the_comment_id = $_GET['delete'];

$query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
$delete_query = mysqli_query($connection,$query);
header("Location: comments.php"); exit;

}

?>