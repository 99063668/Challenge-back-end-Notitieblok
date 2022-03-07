<?php
  include("functions.php");
  $notes = getAllNotes("todolist", $_GET["id"]); 
  // $list = getAllList("list", $_GET["id"]); 
?>
<head>
  <title>makeNote</title>
  <link rel="stylesheet" href="style.css">
</head>
<div>
  <h4>Nieuwe taak</h4>
</div>

<form method="post" action="../index.php"> 
  <input type="hidden" name="listId" value="<?php echo $_GET["listId"];?>">

  <p><b>Titel: </b><input type="text" name="title" required value="<?php echo $title;?>"></p>
  <p><b>Taak: </b><input type="text" name="task" required value="<?php echo $task;?>"></p>
  <p><b>Duur: </b><input type="time" name="duration" required value="<?php echo $duration;?>"></p>

  <!-- <label for="status"><b>Status:</b></label>
  <select id="status" name="status">
    <option value="<?php echo $status;?>">Bezig</option>
    <option value="<?php echo $status;?>">Afgerond</option>
  </select> -->

  <p><b>Omschrijving: </b></p><textarea name="description" placeholder="Voeg hier uw omschrijving toe" required value="<?php echo $description;?>"rows="5" cols="40"></textarea>

  <br>

  <button class="btn btn-primary" name="SubmitBtn" value="confirm">Notitie toevoegen</button>
  <a href="../index.php" class="buttons">Sluiten</a>
</form>

<?php   
  include("common/footer.php"); 
?>
