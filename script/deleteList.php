<?php
  include("functions.php");

  if(isset($_GET["id"])){
    $list = getTable("list", $_GET["id"]);
    if(!$list){
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
    <form action="detail.php?id=<?= $list["id"]?>" method="post">
      <label for="Confirm">Wil je de lijst <b><?= $list["title2"]?></b> met alle bijhorende notities verwijderen?</label>
      <br>
      <button class="buttons" type="submit" name="DeleteList" value="true">Ja</button>
      <a href="../index.php" class="buttons">Nee</a>
    </form>
  </div>

  <footer>
    <?php   
      include("../common/footer.php"); 
    ?>
  </footer>
  