              <!-- Form za edit -->
                <form action="" method="post">
                <div class="form-group">
                 <label for="cat_title"> <h4>Edit Category</h4></label>
                 <?php 

                 if(isset($_GET['edit'])){
                  $cat_id = $_GET['edit'];
                  $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                  $select_categories_id = mysqli_query($connection,$query); //smjestam kategorije u bazu podataka
                  while($row = mysqli_fetch_assoc($select_categories_id)){
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                  ?>
                 <input value='<?php if(isset($cat_title)){ echo $cat_title;} ?>' class='form-control' type="text" name="cat_title">

                <?php }} ?>
                <?php 
                //Edit kategorija
                 if(isset($_POST['edit_category'])){
                     $the_cat_title = $_POST['cat_title'];                     
                     $query ="UPDATE categories SET cat_title = '{$the_cat_title}'  WHERE cat_id = {$cat_id}"; 
                     $edit_query = mysqli_query($connection, $query); 
                     if(!$edit_query){
                      die("Query failed" . mysqli_error($connection));
                     }
// OVO TREBA DA SE OBRISE, JER OVO RIFRESUJE SVAKI PUT POSLE EDITA, PROBLEM JE STO STARA VRIJEDNOST OSTAJE UPISANA U POLJE !!!!
                     header('Location: categories.php'); 
                 }
                ?>
                </div>
                <div class="form-group">
                 <input class='btn btn-primary' type="submit" name="edit_category" value="Edit Category">
                </div>
              </form>