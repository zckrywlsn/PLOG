
<!-- Creates New Post  Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newModalLabel">Add New Post</h4>
      </div>
      <div class="modal-body">
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

<!-- Creates Edit Post  Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editModalLabel">Add New Post</h4>
      </div>
      <div class="modal-body">
        <div class="well well-lg">
          <form id="finput" action="index.php?page=Content/Post/" method="post" onsubmit="return validateForm()">
            <div class="form-group">
              <label for="PassOn">Pass On</label>
              <textarea class="form-control" rows="6" name="bookId" id="bookId" value=""/></textarea>
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