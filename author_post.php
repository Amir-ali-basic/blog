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
          $the_post_author = $_GET['author'];

        }

        //Prikupljam sve podatke iz baze post
        $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";

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
              <?php echo $post_date; ?>All post by: <?php echo $post_author; ?>
            </p>
            <img src="images/<?php echo $post_image;?>" class="img-fluid" alt="...">

             <p>
              <?php echo $post_content; ?>
            </p>
                          <a href="post.php?p_id= <?php echo $post_id ?>" type="button" class="btn btn-outline-primary">Read more ></a>
            <hr />

        
<?php } ?>


          </article>
            <!-- /.blog-post -->




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
