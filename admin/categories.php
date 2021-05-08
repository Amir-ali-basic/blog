<?php include "includes/admin_header.php" ?>

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
               <!--Add category form -->
               <div class="col-xs-6">
               <!-- Funkcija za dodavanje kategorija -->
               <?php insert_categories(); ?>

              <form action="" method="post">
                <div class="form-group">
                 <label for="cat_title"> <h4>Add Category</h4></label>
                 <input class='form-control' type="text" name="cat_title">
                </div>
                <div class="form-group">
                 <input class='btn btn-primary' type="submit" name="submit" value="Add Category">
                </div>
              </form>
               <?php 
               //edit kategorija
               if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                include "includes/edit_category.php";
               }
                ?>
               </div>
               <!--Add category form -->
               <!--Table of categories -->
               <div class="col-xs-6">
               <table class='table table-bordered table-striped table-hover'>
                <thead>
                 <tr>
                  <th>ID</th>
                  <th>Category Title</th>
                 </tr>
                </thead>
                <tbody>
                  <?php
                  //prikazujem sve kategorije
                  findAllCategories();
                  ?>
                  <?php 
                  //brisanje kategorija
                    deleteAllCategories();
                  ?>
                  
                </tbody>
               </table>
               </div>
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