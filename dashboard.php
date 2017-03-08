
  <?php
  include "Content/Scripts/raid_health.php";
  
  
    echo '<div class="col-md-8">';
    //select rows from Logs mysql database and formats the previous posts based on search.
    
    //test from search content.inc
    //$servername = "localhost";
    //$username = "zckrywlsn";
    //$password = "";
    //$DB = "CSA_log";
    //$conn = new mysqli($servername, $username, $password, $DB);
    $query = mysqli_real_escape_string($conn, $_POST["search"]);
    $sql = "SELECT reg_date, csa_name, classification, pass_block, post_type  FROM Logs WHERE pass_block LIKE '%". $query ."%' ORDER BY reg_date DESC";
    //end test
    
    //$sql = "SELECT reg_date, csa_name, classification, pass_block, post_type FROM Logs ORDER BY reg_date DESC ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title pull-left">'.$row["csa_name"].'</h3>
                <div class="panel-title pull-right">'.$row["reg_date"].'</div>
                <h4 class="panel-title"><br><br><span class="label label-default">'.$row["classification"].'</span></h4>
                <div class="clearfix"></div>
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
    echo '</div>';
    $conn->close(); //move to end!
  ?>
</div>