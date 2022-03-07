<?php
  include("functions.php");
?>
<div>
  <h4>Nieuwe lijst</h4>
</div>

<form method="post" action="../index.php"> 
  <p><b>Lijst: </b><input type="text" name="title" required value="<?php echo $title2;?>"></p>
  <br>

  <button class="btn btn-primary" name="SubmitBtnList" value="confirm">Lijst toevoegen</button>
  <input type="button" value="Sluiten" id="btnClose" onClick="Javascript:window.location.href = '../index.php';" />
</form>
