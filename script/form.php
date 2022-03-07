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
<form action="detail.php?id=<?= $note["id"]?>" method="post">
  <label for="Confirm">Wil je de notitie <b><?= $note["title"]?></b> verwijderen?</label>
  <button class="btn btn-success btn-sm" type="submit" name="Delete" value="true">Ja</button>
  <input type="button" value="Nee" id="btnClose" onClick="Javascript:window.location.href = '../index.php';" />
</form>
