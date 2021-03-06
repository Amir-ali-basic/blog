<!-- Header -->
<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>

    <main class="container">
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">
            Title of a longer featured blog post
          </h1>
          <p class="lead my-3">
            Multiple lines of text that form the lede, informing new readers
            quickly and efficiently about what’s most interesting in this post’s
            contents.
          </p>
          <p class="lead mb-0">
            <a href="#" class="text-white fw-bold">Continue reading...</a>
          </p>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div
            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          >
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">World</strong>
              <h3 class="mb-0">Featured post</h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">
                This is a wider card with supporting text below as a natural
                lead-in to additional content.
              </p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg
                class="bd-placeholder-img"
                width="200"
                height="250"
                xmlns="http://www.w3.org/2000/svg"
                role="img"
                aria-label="Placeholder: Thumbnail"
                preserveAspectRatio="xMidYMid slice"
                focusable="false"
              >
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" />
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div
            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          >
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">Post title</h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="mb-auto">
                This is a wider card with supporting text below as a natural
                lead-in to additional content.
              </p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg
                class="bd-placeholder-img"
                width="200"
                height="250"
                xmlns="http://www.w3.org/2000/svg"
                role="img"
                aria-label="Placeholder: Thumbnail"
                preserveAspectRatio="xMidYMid slice"
                focusable="false"
              >
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" />
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
        <?php 
        //uzimam id posta
        if(isset($_GET['p_id'])){
          $post_id = $_GET['p_id'];
        }

        //Prikupljam sve podatke iz baze post
        $query = "SELECT * FROM posts WHERE post_id = $post_id";

         $select_all_posts_query = mysqli_query($connection,$query);
         //kroz vaj petlju uzimam podatke iz svih redov a i stavljam ih u promjenljivu 
         while($row = mysqli_fetch_assoc($select_all_posts_query)){
           $post_title = $row['post_title'];
           $post_author = $row['post_author'];
           $post_date = $row['post_date'];
           $post_image = $row['post_image'];
           $post_content = $row['post_content'];
        ?>


            <!-- BLOG POST START -->
          <article class="blog-post">
            <h2 class="blog-post-title"><?php echo $post_title; ?></h2>
            <p class="blog-post-meta">
              <?php echo $post_date; ?> <a href="#"><?php echo $post_author; ?></a>
            </p>
            <img src="images/<?php echo $post_image;?>" class="img-fluid" alt="...">

             <p>
              <?php echo $post_content; ?>
            </p>
            <hr />

            <?php
            
            if(isset($_POST['create_comment'])){
            $post_id = $_GET['p_id'];
            $comment_author = $_POST['comment_author'];
            $comment_email = $_POST['comment_email'];
            $comment_content =$_POST['comment_content'];
                if($comment_author == '' || empty($comment_author) && $comment_email == '' || empty($comment_email) && $comment_content == '' || empty    ($comment_content)){
                    echo "<h4 class='alert alert-danger'>Morate ispuniti sva polja </h4>";
                 }else{

                   echo "<h4 class='alert alert-success'>Komentar je uspjesno dodat</h4>";

                    $query= "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                    $query.= "VALUES ($post_id,'{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved',now())";
                    $create_comment_query = mysqli_query($connection,$query);
                    if(!$create_comment_query){
                      die('Query failed'. mysqli_error($connection));
                    }
                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    $query .= "WHERE post_id = $post_id ";
                    $update_comment_count= mysqli_query($connection,$query);
            }
            
          }
            ?>

          <!-- Comments Form -->
          <div class="well bg-light p-4">
            <h4>Leave a Comment:</h4>
            <form action="" method="post" role="form">
              <div class="form-group">
              <label for="Author">Author:</label>
                <input type="text"class='form-control' name="comment_author">
              </div>
              <div class="form-group py-4">
              <label for="Email">Email:</label>
                <input type="email" class='form-control' name="comment_email">
              </div>
              <div class="form-group">
              <label for="Comment">Comment:</label>
                <textarea name="comment_content" class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" name="create_comment" class="btn btn-primary my-2">Submit</button>
            </form>
          </div>

          <hr />

          <!-- Posted Comments -->

          <!-- Comment -->

          <?php 
          $query = "Select * from comments where comment_post_id = {$post_id} ";
          $query .= "AND comment_status = 'Approved' ";
          $query .= "ORDER BY comment_id DESC ";
          $select_comment_query = mysqli_query($connection,$query);

          if(!$select_comment_query){
            die("QUery FAILED !" . mysqli_error($connection));
          }
          while($row = mysqli_fetch_array($select_comment_query)){
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];

          
          ?>
          <div class="media d-flex py-4 bg-light">
            <a class="pull-left" href="#">
              <img
                class="media-object px-4"
                src="http://placehold.it/64x64"
                alt=""
              />
            </a>
            <div class="media-body">
              <h4 class="media-heading d-grid">
                <?php echo $comment_author ?>
                <small class='small-fonts'><?php echo $comment_date ?></small>
              </h4>
                <?php echo $comment_content ?>

            </div>
          </div>
<?php } ?>


          </article>
            <!-- /.blog-post -->

<?php } ?>




          <nav class="blog-pagination" aria-label="Pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a
              class="btn btn-outline-secondary disabled"
              href="#"
              tabindex="-1"
              aria-disabled="true"
              >Newer</a
            >
          </nav>
        </div>
<!--Sidebar -->
<?php include "includes/sidebar.php" ?>
      </div>
      <!-- /.row -->
    </main>
    <!-- /.container -->
<!-- FOOTER -->
  <?php
  include "includes/footer.php"
  ?> 
</html>
