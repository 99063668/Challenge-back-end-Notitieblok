<?php
  include("functions.php");
  $notes = getAllNotes("todolist", $_GET["id"]); 
?>
<div>
  <h4>Nieuwe taak</h4>
</div>

<form method="post" action="../index.php"> 
  <p><b>Titel: </b><input type="text" name="title" required value="<?php echo $title;?>"></p>
  <p><b>Taak: </b><input type="text" name="task" required value="<?php echo $task;?>"></p>
  <p><b>Duur: </b><input type="time" name="duration" required value="<?php echo $duration;?>"></p>

  <p><b>Omschrijving: </b></p><textarea name="description" placeholder="Voeg hier uw omschrijving toe" required value="<?php echo $description;?>"rows="5" cols="40"></textarea>

  <br>

  <button class="btn btn-primary" name="SubmitBtn" value="confirm">Notitie toevoegen</button>
  <input type="button" value="Sluiten" id="btnClose" onClick="Javascript:window.location.href = '../index.php';" />
</form>
