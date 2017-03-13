<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="style.css">
</head>  

<body>
    
  <div class="container-showcase">
      
       <?php
       //include('Content/Login/session.php');
       include("config.php");
       session_start();
       
       if($_SERVER["REQUEST_METHOD"] == "POST") {
          // username and password sent from form 
          
          $myusername = mysqli_real_escape_string($db,$_POST['username']);
          $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
          
          $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $active = $row['active'];
          
          $count = mysqli_num_rows($result);
          if (isset($_POST["count"])){
            $count = 1; 
          }
          
          // If result matched $myusername and $mypassword, table row must be 1 row
    		
          if($count == 1) {
             $_SESSION['login_user'] = $myusername;
             
            if (!isset ($_GET["page"])){
              include('session.php');
              include 'header.php';
              include 'footer.php';
              include 'dashboard.php';
            }else{
             include $_GET["page"] . "content.inc";
            }
          }else{
             $error = "Your Login Name or Password is invalid";
          }
          
         }else{
                 echo  '
               <head>
                  <title>Login Page</title>
                  <style type = "text/css">
                     body {
                        font-family:Arial, Helvetica, sans-serif;
                        font-size:14px;
                     }
                     label {
                        font-weight:bold;
                        width:100px;
                        font-size:14px;
                     }
                     .box {
                        border:#666666 solid 1px;
                     }
                  </style>
               </head>
               <body bgcolor = "#FFFFFF">
            	
                  <div align = "center">
                     <div style = "width:300px; border: solid 1px #333333; " align = "left">
                        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            				
                        <div style = "margin:30px">
                           
                           <form action = "" method = "post">
                              <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                              <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                              <input type = "submit" value = " Submit "/><br />
                           </form>
                           
                           <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error . "and count: " . $count; ?></div>
            					
                        </div>
            				
                     </div>
            			
                  </div>';
         }
?>
  </div>

<!-- Scripts at the end to help page load quicker -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- js for catching modal varaible passes on edit auto fill -->

<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var passonb = button.data('passon')
   
    var modal = $(this)
    modal.find('.modal-title').text('Edit Message: ID ' + recipient)
    modal.find('.modal-body textarea').val(passonb)
    modal.find('.modal-body input').val(recipient)
  })
</script>

</body>
</html>