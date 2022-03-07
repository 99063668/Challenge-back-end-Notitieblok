<?php
  include("functions.php");
?>
<head>
  <title>makeList</title>
  <link rel="stylesheet" href="style.css">
</head>

<div>
  <h4>Nieuwe lijst</h4>
</div>

<form method="post" action="../index.php"> 
  <p><b>Lijst: </b><input type="text" name="title2" required value="<?php echo $title2;?>"></p>
  <br>

  <button class="btn btn-primary" name="SubmitBtnList" value="confirm">Lijst toevoegen</button>
  <a href="../index.php" class="buttons">Sluiten</a>
</form>

<?php   
  include("common/footer.php"); 
?>
