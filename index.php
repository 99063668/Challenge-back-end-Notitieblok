<?php
  include("script/functions.php");
  $notes = getAllNotes();
  $lists = getAllList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index</title>
  <link rel="stylesheet" href="style.css">
</head>
  <body>
    <input type="button" value="Lijst maken" id="btnClose" onClick="Javascript:window.location.href = 'script/makeList.php';" />
    <br>
    <br>

    <?php
      foreach($lists as $list){
    ?>
    <table>
      </tr>
        <th><?=$list["title2"]?></th>
      </tr>

      <?php
        foreach($notes as $note){
          if($note["listId"] == $list["id"]){
      ?>
      <tr>
        <td><a href="script/detail.php?id=<?=$note["id"]?>"><?=$note["title"]?></a></td>
        <td><?=$note["task"]?></td>
      <?php
          }
        }
      ?>

      </tr>
      <br>
      <td><input type="button" value="Notitie maken" id="btnClose" onClick="Javascript:window.location.href = 'script/makeNote.php';" /></td>
    </table>
    <?php
      }
    ?>
  </body>
</html>
