<?php
  include("functions.php");

  if(isset($_GET["id"])){
    $note = getTable("todolist", $_GET["id"]);
    if(!$note){
      header("location: index.php");
    }
  }else{
    header("location: index.php");
  }
?>

<div class="row">
  <div class="col-6">
    <p><b><label class="w-25 font-weight-bold">Titel: </b></tabel><?=$note["title"]?></p>
    <p><b><label class="w-25 font-weight-bold">Taak: </b></tabel><?=$note["task"]?></p>
    <p><b><label class="w-25 font-weight-bold">Duur: </b></tabel><?=$note["duration"]?></p>
    <p><b><label class="w-25 font-weight-bold">Omschrijving: </b></tabel><?=$note["description"]?></p>
    <p><b><label class="w-25 font-weight-bold">Status: </b></tabel><?=$note["status"]?></p>
    
    <input type="button" value="Sluiten" id="btnClose" onClick="Javascript:window.location.href = '../index.php';" />
  </div> 
</div>
