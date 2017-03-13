<!--Builds Nav bar at top of page -->

<nav class="navbar-fixed-top">
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
      <form class="navbar-form navbar-left" action="index.php" method="post">
        <button type="submit" name="count" class="btn btn-default"><b>PLOG</b></button>
      </form>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>  SACS</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>  Mail</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Referrence<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">ETM</a></li>
            <li><a href="#">Matrix</a></li>
            <li><a href="#">Network</a></li>
            <li><a href="#">Mission Stats</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Preps</a></li>
            <li><a href="#">Recoveries</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  New Post
        </button>
        </form>
        
        <!-- search bar -->
        <form class="navbar-form navbar-right" action="index.php" method="post">
          <input type="text" class="form-control" name="search" placeholder="Search">
          <button type="submit" class="btn btn-default">  search
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          </button>
          <input type="hidden" name="count" /> <!-- count for login verification -->
        </form>
        
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Log Out  <span class="glyphicon glyphicon-user" aria-hidden="true"></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
    
  </div><!-- /.container-fluid -->
 </nav>
</nav>
