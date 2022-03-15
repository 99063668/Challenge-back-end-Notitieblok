<?php
    include("functions.php");
    
    $note = getTable("todolist", $_GET["id"]);
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
      <div class="edit">
        <h4>Wijzig de Notitie:</h4>
        <br>
        <form method="post" action="../index.php">  
            <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
            <input type="hidden" name="note_id" value="<?php echo $note["id"];?>">
            
            <p><b>Titel: </b><input type="text" name="task" required value="<?php echo $note["title"]?>"></p>
            <p><b>Taak: </b><input type="text" name="task" required value="<?php echo $note["task"]?>"></p>
            <!-- <p><b>Geschatte tijd: </b><input type="time" name="duration" required value="<?php echo $note["duration"]?>"></p> -->

            <label for="duration"><b>Duur: </b></label>
            <select id="duration" name="duration">
              <option selected><--Geschatte tijd--></option>
              <option value="0.30">30 min</option>
              <option value="1">1 uur</option>
              <option value="1.5">1.5 uur</option>
              <option value="2">2 uur</option>
              <option value="2.5">2.5 uur</option>
              <option value="3">3 uur</option>
            </select>

            <br>

            <label for="status"><b>Status:</b></label>
            <select id="status" name="status">
              <option selected><--Status notitie--></option>  
              <option value="Bezig">Bezig</option>
              <option value="Afgerond">Afgerond</option>
              <option value="Niet begonnen">Niet begonnen</option>
            </select>
            
            <p><b>Omschrijving: </b></p><textarea name="description" placeholder="Voeg hier uw omschrijving toe" required value="<?php echo $note["description"]?>"rows="5" cols="40"></textarea>

            <br>
            <button class="buttons" name="SubmitBtn2" value="confirm">Confirm</button>
            <a href="../index.php" class="link">Sluiten</a>
        </form>
      </div>
    </div>
  </div>

  <footer>
    <?php   
      include("../common/footer.php"); 
    ?>
  </footer>