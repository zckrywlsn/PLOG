<?php
include ("Content/Dashboard/header.php");
?>

<!-- begining of page -->

  <?php
  if (!isset ($_GET["page"])){
    include "content.inc";
  }else{
    include $_GET["page"] . "content.inc";
  }
  ?>


<?php
include ("Content/Dashboard/footer.php");
?>