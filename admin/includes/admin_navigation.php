<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target=".navbar-ex1-collapse"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">CMS Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">BLOG</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              ><i class="fa fa-user"></i> <?php echo $_SESSION['firstname'] ;?> <?php echo $_SESSION['lastname'] ;?><b class="caret"></b
            ></a>
            <ul class="dropdown-menu">
              <li>
                <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li>
              <a href="index.php"
                ><i class="fa fa-fw fa-dashboard"></i> Dashboard</a
              >
            </li>

            <li>
              <a href="bootstrap-elements.html"
                ><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a
              >
            </li>
            <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"
                ><i class="fa fa-fw fa-arrows-v"></i>Posts
                <i class="fa fa-fw fa-caret-down"></i
              ></a>
              <ul id="posts_dropdown" class="collapse">
                <li>
                  <a href="./posts.php">View all posts</a>
                </li>
                <li>
                  <a href="posts.php?source=add_post">Add post</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#demo"
                ><i class="fa fa-fw fa-arrows-v"></i> Categories
                <i class="fa fa-fw fa-caret-down"></i
              ></a>
              <ul id="demo" class="collapse">
                <li>
                  <a href="./categories.php">View all categories</a>
                </li>
                <li>
                  <a href="categories.php">Add categories</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="./comments.php"
                ><i class="fa fa-fw fa-file"></i> Comments</a
              >
            </li>
            <li>
              <a href="profile.php"
                ><i class="fa fa-fw fa-dashboard"></i> Profile</a
              >
            <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"
                ><i class="fa fa-fw fa-arrows-v"></i> Users
                <i class="fa fa-fw fa-caret-down"></i
              ></a>
              <ul id="users_dropdown" class="collapse">
                <li>
                  <a href="users.php">View all users</a>
                </li>
                <li>
                  <a href="users.php?source=add_user">Add user</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>