        
        <!-- Side bar about -->
               <?php 

      ?>


        <div class="col-md-4">
         <?php include "widget.php"; ?>
          <div class="p-4 mb-3 bg-light rounded">

          <!-- Sidebar search enginge -->
            <label for="exampleDataList" class="form-label">Search</label>
            <!-- Search Form -->
            <form action="search.php" method='post'>
            <!-- <input type='text' class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..."> -->
            <div class="input-group">
              <input name='search' type="text" class="form-control">
                <span class="input-group-btn">
                  <button name='submit' type='submit' class="btn btn-default">
                    <span class="glyphicon glyphicon-search">SEARCH</span>
                  </button>
                </span>
            </div>
            </form>
          </div>
          <!--Login -->
                    <?php
                   

           

          ?>
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
      }
                    if(isset($_SESSION['user_role'])){
            $user = $_SESSION['user_role'];
             if($user == 'admin' || $user=='subscriber'){
          ?>
          
          <div class="wall p-4 bg-light">
          <h4>You are loggedin, <br> welcome <?php echo $username ?></h4>
          </div>
          <?php }}?>
          
          <div class="wall p-4 bg-light">
            <h4>Login</h4>
            <form action="includes/login.php" method="post">
          <div class="input-group pb-2">
            <input type="text" name="username" class='form-control' placeholder="Username">
          </div>
            <div class="input-group">
              <input type="password" name="password" class='form-control' placeholder="Password">
              <br>
          </div>
              <span class="input-group-btn pt-2">
                <button class="btn btn-primary mt-2" name="login" type="submit">
                Log in
                </button>
              </span>
            </form>  
          </div>
          <!-- Sidebar categories -->

          <div class="p-4">
            <?php 
            $query = "SELECT * FROM categories";
            $select_categories_sidebar = mysqli_query($connection,$query);
             ?>
            <h4 class="font-italic">Categories</h4>
            <ol class="list-unstyled mb-0">
            <?php 
            while($row = mysqli_fetch_assoc($select_categories_sidebar)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
           }
            ?>
              
            </ol>
          </div>

          <!-- Sidebar Social media links -->
          <div class="p-4">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div>