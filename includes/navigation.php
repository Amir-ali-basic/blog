 
        <?php session_start();?>
 
 <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="link-secondary" href="./index.php">Subscribe</a>
          </div>
          <?php
                   
          if(isset($_SESSION['user_role'])){
            $user = $_SESSION['user_role'];
            if($user == 'admin'){
             echo " <div class='col-4 text-center'><a class='blog-header-logo text-dark' href='admin'>ADMIN</a></div>";
            }else{
              echo"<div class='col-4 text-center'><a class='blog-header-logo text-dark' href='#'></a></div>";
            }

          }
          ?>
          

        

          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="link-secondary" href="#" aria-label="Search">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="mx-3"
                role="img"
                viewBox="0 0 24 24"
              >
                <title>Search</title>
                <circle cx="10.5" cy="10.5" r="7.5" />
                <path d="M21 21l-5.2-5.2" />
              </svg>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="registration.php">Sign up</a>
          </div>
        </div>


      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">

        <?php 
         $query = "SELECT * FROM categories";
         $select_all_categories_query = mysqli_query($connection,$query);
         
         while($row = mysqli_fetch_assoc($select_all_categories_query)){
           $cat_title = $row['cat_title'];
           echo "<a class='p-2 link-secondary' href='#'>$cat_title</a>";
         }
        ?>
        </nav>
      </div>
    </div>
