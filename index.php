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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <span class="navbar-brand mb-0 h1"> <input type="button" value="Lijst maken" id="btnClose" onClick="Javascript:window.location.href = 'script/makeList.php';" /></span>
    </nav>

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
        <td><a class="link" href="script/detail.php?id=<?=$note["id"]?>"><?=$note["title"]?></a></td>
      <?php
          }
        }
      ?>

      </tr>
      <br>
      <td><a href="script/makeNote.php?listId=<?=$list["id"]?>" class="buttons">Notitie maken</a></td>
    </table>
    <?php
      }
    ?>
  </body>
</html>

<?php   
  include("common/footer.php"); 
?>
