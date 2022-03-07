<?php
  // include("functions.php");
  // $notes = getAllNotes("todolist", $_GET["id"]); 
?>
<div>
  <h4>Nieuwe lijst</h4>
</div>

<form method="post" action="../index.php"> 
  <p><b>Lijst: </b><input type="text" name="list" required value="<?php echo $list;?>"></p>

  <br>

  <button class="btn btn-primary" name="SubmitBtn" value="confirm">Lijst toevoegen</button>
  <input type="button" value="Sluiten" id="btnClose" onClick="Javascript:window.location.href = '../index.php';" />
</form>

<!-- <thead>
    <tr>
      <th scope="col"><b>Titel:</b></th>
    </tr>
</thead> -->