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
    <div class="bg">
      <div class="row">
        <div class="col-6">
          <p><b><label class="w-25 font-weight-bold">Titel: </b></tabel><?=$note["title"]?></p>
          <p><b><label class="w-25 font-weight-bold">Taak: </b></tabel><?=$note["task"]?></p>
          <p><b><label class="w-25 font-weight-bold">Duur: </b></tabel><?=$note["duration"]?></p>
          <p><b><label class="w-25 font-weight-bold">Omschrijving: </b></tabel><?=$note["description"]?></p>
          <p><b><label class="w-25 font-weight-bold">Status: </b></tabel><?=$note["status"]?></p>
          
          <form action="editNote.php?id=<?= $note["id"]?>"  method="post">
            <input class="buttons" type="submit" name="Edit" value="Edit">
          </form>

          <form action="form.php?id=<?= $note["id"]?>" method="post">
            <button class="buttons" type="submit" name="Delete2" value="Delete2">Verwijder</button>
          </form>

          <a href="../index.php" class="link">Sluiten</a>
        </div> 
      </div>
    </div>
  </div>

  <footer>
    <?php   
      include("../common/footer.php"); 
    ?>
  </footer>
