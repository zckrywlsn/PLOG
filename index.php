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
       
      if (!isset ($_GET["page"])){
        include 'header.php';
        include 'footer.php';
        include 'dashboard.php';

        
      }else{
        //include $_GET["page"];
       include $_GET["page"] . "content.inc";
      }
      //include ("Content/Login/login.php");
      ?> 
  
  </div>

<!-- Scripts at the end to help page load quicker -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>