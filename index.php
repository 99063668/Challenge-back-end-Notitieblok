<?php
  $notes = getAllNotes();
?>

<input type="button" value="Lijst maken" id="btnClose" onClick="Javascript:window.location.href = 'script/makeList.php';" />
<input type="button" value="Notitie maken" id="btnClose" onClick="Javascript:window.location.href = 'script/makeNote.php';" />

<tbody>
  <?php
    foreach($notes as $note){
  ?>
  <tr>
    <td><?=$note["title"]?></td>
    <td><?=$note["task"]?></td>
    <td><?=$note["description"]?></td>
    <td><?=$note["duration"]?></td>
  </tr>
  <?php
    }
  ?>
</tbody>
