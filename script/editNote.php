<?php
    include("functions.php");
    
    $note = getTable("todolist", $_GET["id"]);
?>
<h2>Wijzig de Notitie:</h2>
<br>
<form method="post" action="../index.php">  
    <p><b>Notitie is: </b><?= $note["title"] ?></p>
    <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
    <input type="hidden" name="note_id" value="<?php echo $note["id"];?>">
    
    <p><b>Taak: </b><input type="text" name="task" required value="<?php echo $note["task"]?>"></p>
    <p><b>Duur: </b><input type="time" name="duration" required value="<?php echo $note["duration"]?>"></p>

    <!-- <label for="status"><b>Status:</b></label>
    <select id="status" name="status">
      <option <?php echo $note["status"]?>>Bezig</option>
      <option <?php echo $note["status"]?>>Afgerond</option>
    </select> -->

    <p><b>Omschrijving: </b></p><textarea name="description" placeholder="Voeg hier uw omschrijving toe" required value="<?php echo $note["description"]?>"rows="5" cols="40"></textarea>

    <br>
    <button class="btn btn-primary" name="SubmitBtn2" value="confirm">Confirm</button>
</form>