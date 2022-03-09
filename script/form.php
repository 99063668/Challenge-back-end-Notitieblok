<?php
  include("functions.php");

  if(isset($_GET["id"])){
    $note = getTable("todolist", $_GET["id"]);
    if(!$note){
      header("location: ../index.php");
    }
  }else{
    header("location: ../index.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <header>
  <?php   
    include("../common/header.php"); 
  ?>
  </header>

  <div class="container">
    <form action="detail.php?id=<?= $note["id"]?>" method="post">
      <label for="Confirm">Wil je de notitie <b><?= $note["title"]?></b> <b style="color:#FF8200">permanent</b> verwijderen?</label>
      <br>
      <button class="buttons" type="submit" name="Delete" value="true">Ja</button>
      <a href="../index.php" class="buttons" style="background-color:#FF8200">Nee</a>
    </form>
  </div>

  <footer>
    <?php   
      include("../common/footer.php"); 
    ?>
  </footer>