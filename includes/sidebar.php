        
        <!-- Side bar about -->
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
            $cat_title = $row['cat_title'];
            echo "<li><a href='#'>{$cat_title}</a></li>";
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