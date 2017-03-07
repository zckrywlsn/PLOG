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
      <a class="navbar-brand" href="index.php">PLOG</a>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  New Post
        </button>
        </form>
        
        <!-- search bar -->
        <form class="navbar-form navbar-right" action="index.php?page=Content/Dashboard/" method="post">
          <input type="text" class="form-control" name="search" placeholder="Search">
          <button type="submit" class="btn btn-default">  search
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          </button>
        </form>
        
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Content/Login/logout.php">Log Out  <span class="glyphicon glyphicon-user" aria-hidden="true"></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
    
  </div><!-- /.container-fluid -->
</nav>
</nav>

<!--Validates that all fields are filed out before allwoing input form to be submittd -->
<script>
function validateForm() {
    var x = document.forms["finput"]["Class"].value;
    var y = document.forms["finput"]["PassOn"].value;
    var z = document.forms["finput"]["inputType"].value;
    var w = document.forms["finput"]["Name"].value;
    if ((x == "") || (y == "") || (z == "") || (w == "") ) {
        alert("Please completely fill out the form");
        return false;
    }
}
</script>
<div class="container-showcase"> <!-- keeps errors below header -->

<!-- Creates New Post  Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Post</h4>
      </div>
      <div class="modal-body">
<!-- will be moved to its own files but for now is the form -->

<!-- Draft of Post Form for Plog input -->
        <div class="well well-lg">
          <form id="finput" action="index.php?page=Content/Post/" method="post" onsubmit="return validateForm()">
            <div class="form-group">
              <label for="PassOn">Pass On</label>
              <textarea class="form-control" rows="6" name="PassOn"></textarea>
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <div>
                    <label for="Class">Class</label>
                    <select class="form-control" name="Class">
                      <option></option>
                      <option>primary</option>
                      <option>info</option>
                      <option>warning</option>
                      <option>danger</option>
                    </select>
                  </div>
                  <div>
                    <label for="inputType">Type</label>
                    <select class="form-control" name="inputType">
                      <option></option>
                      <option>Notes</option>
                      <option>Passon</option>
                      <option>WeeklyMaterial</option>
                      <option>Effing Fixed</option>
                    </select>
                  </div>
                  <div>
                    <label for="Name">Name</label>
                    <select class="form-control" name="Name">
                      <option></option>
                      <option>Clay</option>
                      <option>Dave</option>
                      <option>Brandon</option>
                      <option>Rob</option>
                    </select>
                  </div>
                  <div class="text-center modal-btn">
                    <input class="btn btn-success" type="submit" value="Submit">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div><!--End of form inside Modal-->
      </div>
    </div>
  </div>
</div> <!-- end of Modal -->

<?php
//quick mysql connection
$servername = "localhost";
$username = "zckrywlsn";
$password = "";
$DB = "CSA_log";

// Create CSA_log DB connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  // Create database
  $sql = "CREATE DATABASE IF NOT EXISTS CSA_log;";
  if ($conn->query($sql) === TRUE) {
      //echo "Database created successfully <br>";
  } else {
      echo "Error creating database: " . $conn->error;
  }
$conn->close();

// sql to create Logs table
  $conn = new mysqli($servername, $username, $password, $DB);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "CREATE TABLE IF NOT EXISTS Logs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  csa_name VARCHAR(30) NOT NULL,
  classification VARCHAR(30) NOT NULL,
  pass_block VARCHAR(250),
  post_type VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP
  )";
  
  if ($conn->query($sql) === TRUE) {
      //echo "Table Logs created successfully <br>";
  } else {
      echo "Error creating table:" . $conn->error;
  }
?>

</div> <!-- end of showcase -->
