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
                <small><?php echo $_SESSION['username'] ?></small>
              </h1>
            </div>
          </div>
          <!-- /.row -->
                 
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
                    $query = "SELECT * FROM posts";
                    $select_all_post = mysqli_query($connection,$query);
                    $post_count=  mysqli_num_rows($select_all_post);

                   echo " <div class='huge'>{$post_count}</div>"
                    ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    $query = "SELECT * FROM comments";
                    $select_all_comments = mysqli_query($connection,$query);
                    $comment_count=  mysqli_num_rows($select_all_comments);

                   echo " <div class='huge'>{$comment_count}</div>"
                    ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    $query = "SELECT * FROM users";
                    $select_all_users = mysqli_query($connection,$query);
                    $users_count=  mysqli_num_rows($select_all_users);

                   echo " <div class='huge'>{$users_count}</div>"
                    ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    $query = "SELECT * FROM categories";
                    $select_all_categories = mysqli_query($connection,$query);
                    $categories_count=  mysqli_num_rows($select_all_categories);

                   echo " <div class='huge'>{$categories_count}</div>"
                    ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                <div class="row">
                  <div class="charts w-100">
                      <div id="columnchart_material" style="width: 100%; height: 500px;"></div>

                  </div>
                </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

  <?php include "includes/admin_footer.php" ?>

  <?php 
  //brojaci

  $query = "SELECT * FROM posts WHERE post_status = 'published' ";
  $select_all_published_post = mysqli_query($connection,$query);
  $published_posts =  mysqli_num_rows($select_all_published_post);

  $query = "SELECT * FROM posts WHERE post_status = 'drafted' ";
  $select_all_drafted_post = mysqli_query($connection,$query);
  $drafted_posts =  mysqli_num_rows($select_all_drafted_post);

  $query = "SELECT * FROM users WHERE user_role = 'admin' ";
  $select_all_admins = mysqli_query($connection,$query);
  $admins_count =  mysqli_num_rows($select_all_admins);

  $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
  $select_all_subscriber = mysqli_query($connection,$query);
  $subscriber_count =  mysqli_num_rows($select_all_subscriber);

  $query = "SELECT * FROM comments WHERE comment_status = 'approved' ";
  $select_all_approved_comments = mysqli_query($connection,$query);
  $approved_comments_count =  mysqli_num_rows($select_all_approved_comments);

  $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
  $select_all_unapproved_comments = mysqli_query($connection,$query);
  $unapproved_comments_count =  mysqli_num_rows($select_all_unapproved_comments);

  ?>

      
<?php
$elements = [
    ["Data", "Count", "Approved", "Drafted"],
    ["Posts", $post_count, $published_posts, $drafted_posts],
    ["Categories", $categories_count, 0, 0],
    ["Users", $users_count, $admins_count, $subscriber_count],
    ["Comments", $comment_count, $approved_comments_count, $unapproved_comments_count],
];
?>
<script>
google.charts.load("current", {packages: ["bar"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    const elements = <?= json_encode($elements) ?>;
    const data = google.visualization.arrayToDataTable(elements);
    const options = {chart: {title: "Admin data", subtitle: "Chart data"}};
    const chart = new google.charts.Bar(document.getElementById("columnchart_material"));
    chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>