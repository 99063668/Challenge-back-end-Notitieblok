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
  <title>Detail</title>
  <link rel="stylesheet" href="style.css">
</head>

<div class="row">
  <div class="col-6">
    <p><b><label class="w-25 font-weight-bold">Titel: </b></tabel><?=$note["title"]?></p>
    <p><b><label class="w-25 font-weight-bold">Taak: </b></tabel><?=$note["task"]?></p>
    <p><b><label class="w-25 font-weight-bold">Duur: </b></tabel><?=$note["duration"]?></p>
    <p><b><label class="w-25 font-weight-bold">Omschrijving: </b></tabel><?=$note["description"]?></p>
    <p><b><label class="w-25 font-weight-bold">Status: </b></tabel><?=$note["status"]?></p>
    
    <input type="button" value="Sluiten" id="btnClose" onClick="Javascript:window.location.href = '../index.php';" />
    
    <form action="editNote.php?id=<?= $note["id"]?>"  method="post">
      <input class="btn btn-primary btn-sm" type="submit" name="Edit" value="Edit">
    </form>

    <form action="form.php?id=<?= $note["id"]?>" method="post">
      <button class="btn btn-primary btn-sm" type="submit" name="Delete2" value="Delete2">Verwijder</button>
    </form>
  </div> 
</div>

<?php   
  include("common/footer.php"); 
?>
