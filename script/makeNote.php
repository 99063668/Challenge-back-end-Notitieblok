<?php
  include("functions.php");
  $notes = getAllNotes("todolist", $_GET["id"]); 
  // $list = getAllList("list", $_GET["id"]); 
?>

<!DOCTYPE html>
<html lang="en">
  <header>
  <?php   
    include("../common/header.php"); 
  ?>
  </header>

  <div class="container">
  <div>
    <h4>Nieuwe notitie</h4>
  </div>

  <form method="post" action="../index.php"> 
    <input type="hidden" name="listId" value="<?php echo $_GET["listId"];?>">

    <p><b>Titel: </b><input type="text" name="title" required value="<?php echo $title;?>"></p>
    <p><b>Taak: </b><input type="text" name="task" required value="<?php echo $task;?>"></p>
    <p><b>Duur: </b><input type="time" name="duration" required value="<?php echo $duration;?>"></p>

    <label for="status"><b>Status:</b></label>
    <select id="status" name="status">
      <option selected value="Bezig">Bezig</option>
      <option value="Afgerond">Afgerond</option>
    </select>

    <p><b>Omschrijving: </b></p><textarea name="description" placeholder="Voeg hier uw omschrijving toe" required value="<?php echo $description;?>"rows="5" cols="40"></textarea>

    <br>

    <button class="buttons" name="SubmitBtn" value="confirm">Notitie toevoegen</button>
    <a href="../index.php" class="link">Sluiten</a>
  </form>
  </div>

  <footer>
    <?php   
      include("../common/footer.php"); 
    ?>
  </footer>
