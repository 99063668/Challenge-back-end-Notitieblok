<?php
  include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <header>
  <?php   
    include("../common/header.php"); 
  ?>
  </header>

  <div class="container">
    <div class="bg" style="padding: 5px;">
      <div>
        <h4>Nieuwe lijst</h4>
      </div>

      <form method="post" action="../index.php"> 
        <p><b>Lijst: </b><input type="text" name="title2" required value="<?php echo $title2;?>"></p>
        <br>

        <button class="buttons" name="SubmitBtnList" value="confirm">Lijst toevoegen</button>
        <a href="../index.php" class="link">Sluiten</a>
      </form>
    </div>
  </div>

  <footer>
    <?php   
      include("../common/footer.php"); 
    ?>
  </footer>
