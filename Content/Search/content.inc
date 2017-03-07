not nessessary... in side dashboard.

<?php
include("Content/Dashboard/header.php");
include "Content/Scripts/raid_health.php";
?>

<?php
// sql to create Logs table
$servername = "localhost";
$username = "zckrywlsn";
$password = "";
$DB = "CSA_log";

    $conn = new mysqli($servername, $username, $password, $DB);
    
    echo '<div class="col-md-8">';
    //$query = 'test';
    $query = mysqli_real_escape_string($conn, $_POST["search"]);
    //print_r(str_word_count($query, 1, 'àáãç3'));
   
    $sql = "SELECT reg_date, csa_name, classification, pass_block, post_type  FROM Logs WHERE pass_block LIKE '%". $query ."%' ORDER BY reg_date DESC";
    $result = $conn->query($sql); 
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">

                <ul class="nav nav-pills" role="tablist">
                  <li role="presentation" class="active"><a href="#">'.$row["csa_name"].'</a></li>
                  <li role="presentation" class="text-align left"><a href="#">'.$row["reg_date"].'</a></li>
                  <li role="presentation"><a href="#"> //<span class="badge">'.$row["classification"].'</span>\\\</a></li>
                </ul> 
                <!--
                <nav aria-label="stuff">
                  <ul class="pager">
                    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
                    <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
                  </ul>
                </nav> -->
                
              </div>
              <div class="panel-body"><p>'. $row["pass_block"].'</p>
              </div>
              <div class="panel-footer">
                <input class="btn btn-default" type="submit" value="Edit" data-toggle="modal" data-target="#editModal" >
                <input class="btn btn-default" type="submit" value="Delete" data-toggle="modal" data-target="#deleteModal" >
              </div>
            </div>';
        }
    } else {
        echo "0 results";
    }
    echo '</div>
    
<!-- Creates edit Post  Modal -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editModalLabel">Edit Something</h4>
      </div>
      <div class="modal-body">
<!-- will be moved to its own files but for now is the form -->

<!-- Draft of Post Form for Plog input -->
        <div class="well well-lg">
          <form id="finput" action="index.php?page=Content/Post/" method="post" onsubmit="return validateForm()">
            <div class="form-group">
              <label for="PassOn">Pass On</label>
              <textarea class="form-control" rows="6" name="PassOn">editModal</textarea>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deleteModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this post!!??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>


    
    ';
    
    
    
    $conn->close(); //move to end!