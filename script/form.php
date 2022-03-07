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
<head>
  <title>form</title>
  <link rel="stylesheet" href="style.css">
</head>

<form action="detail.php?id=<?= $note["id"]?>" method="post">
  <label for="Confirm">Wil je de notitie <b><?= $note["title"]?></b> verwijderen?</label>
  <button class="class="buttons"" type="submit" name="Delete" value="true">Ja</button>
  <a href="../index.php" class="buttons">Nee</a>
</form>

<?php   
  include("common/footer.php"); 
?>