<?php
include("header.php");
include("footer.php");
?>

<div class="col-md-6 col-md-offset-3">
    <div class="alert alert-success" role="alert">
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
              echo "Database created successfully <br>";
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
          pass_block TEXT,
          post_type VARCHAR(30) NOT NULL,
          reg_date TIMESTAMP
          )";
          
          if ($conn->query($sql) === TRUE) {
              echo "Table Logs created successfully <br>";
          } else {
              echo "Error creating table:" . $conn->error;
          }
        
        //Checking for delete and editid, 
        
        //Checking for editid,
        if (!empty($_POST["editid"])) {
          $editpostid = ($_POST["editid"]);
          
             //inserting New post into mysql!
            // define variables and set to empty values
            $nameErr = $ClassiErr = $inputTypeErr = $PassOnErr = "";
            $Name = $Class = $inputType = $PassOn = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["Name"])) {
                $nameErr = "Name is required";
              } else {
                $Name = ($_POST["Name"]);
              }
            
              if (empty($_POST["Class"])) {
                $ClassiErr = "Class is required";
              } else {
                $Class = ($_POST["Class"]);
              }
            
              if (empty($_POST["inputType"])) {
                $inputTypeErr = "Type is required";
              } else {
                $inputType = ($_POST["inputType"]);
              }
            
              if (empty($_POST["PassOn"])) {
                $PassOnErr = "Passon please";
              } else {
                $Pass_On = mysqli_real_escape_string($conn, $_POST["PassOn"]); //accounts for special characters
              }
            }
    
            
            if ((empty($nameErr)) && (empty($ClassiErr)) && (empty($inputTypeErr)) && (empty($PassOnErr))) {
              $sql = "UPDATE Logs SET  csa_name='$Name', classification='$Class',pass_block='$Pass_On', post_type='$inputType' WHERE id='$editpostid';";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            }else{
              echo "there is missing info";
            }
        }else{
        //--------------------------------------
        
        //inserting New post into mysql!
        // define variables and set to empty values
        $nameErr = $ClassiErr = $inputTypeErr = $PassOnErr = "";
        $Name = $Class = $inputType = $PassOn = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["Name"])) {
            $nameErr = "Name is required";
          } else {
            $Name = ($_POST["Name"]);
          }
        
          if (empty($_POST["Class"])) {
            $ClassiErr = "Class is required";
          } else {
            $Class = ($_POST["Class"]);
          }
        
          if (empty($_POST["inputType"])) {
            $inputTypeErr = "Type is required";
          } else {
            $inputType = ($_POST["inputType"]);
          }
        
          if (empty($_POST["PassOn"])) {
            $PassOnErr = "Passon please";
          } else {
            $Pass_On = mysqli_real_escape_string($conn, $_POST["PassOn"]); //accounts for special characters
          }
        }
        
        
        
        
        if ((empty($nameErr)) && (empty($ClassiErr)) && (empty($inputTypeErr)) && (empty($PassOnErr))) {
          $sql = "INSERT INTO Logs ( csa_name,classification,pass_block,post_type ) 
          VALUES ( '$Name','$Class','$Pass_On','$inputType' );";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        }else{
          echo "there is missing info";
        }
        }
        
        echo "this is the ID" . $_POST["editid"];
        
        
        ?>
      <div>
        <p>Return to Work !</p>
        <a class="btn btn-default btn-lrg" href="index.php" role="button">Plog</a> 
      </div>
  </div>
</div>