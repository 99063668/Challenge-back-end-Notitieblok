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

    <table>
      <?php
        foreach($lists as $list){
      ?>
        <tr>
          <th><?=$list["title"]?></th>
        </tr>
      <?php
        }
      ?>


      <?php
        foreach($notes as $note){
      ?>
      <tr>
        <td><a href="script/detail.php?id=<?=$note["id"]?>"><?=$note["title"]?></a></td>
        <td><?=$note["task"]?></td>
      <?php
        }
      ?>
      <br>
      <Td><input type="button" value="Notitie maken" id="btnClose" onClick="Javascript:window.location.href = 'script/makeNote.php';" /></Td>
    </table>
</body>
</html>