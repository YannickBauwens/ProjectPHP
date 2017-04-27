<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Logo</a>
        </div>


            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input id="txtSearch" name="txtSearch" type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php"><?php echo $_SESSION['email']; ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="includes/logout.inc.php">Log out</a></li>
                   </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav><!--<div>
    <a href="index.php">Logo</a>
    <form action="" method="get">
        <input id="txtSearch" name="txtSearch" type="text" placeholder="search">
        <button type="submit">Search</button>
    </form>
    <a href="profile.php"><?php echo $_SESSION['email']; ?></a>
    <a href="logout.inc.php">logout</a>
</div>-->