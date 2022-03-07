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
  <script src="https://kit.fontawesome.com/198c4d6390.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>
  <header>
    <nav class="navbar navbar-dark bg-dark">
      <span class="navbar-brand mb-0 h1"><i class="fa-solid fa-note-sticky"></i><a href="script/makeList.php" class="navbar">Lijst maken</a></span>
    </nav>
  </header>

  <?php
    foreach($lists as $list){
  ?>
  <div class="row">
    <div class="column">
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
        <td id="indexBtn"><a href="script/makeNote.php?listId=<?=$list["id"]?>" class="buttonsList">Notitie maken</a></td>
      </table>
      <?php
        }
      ?>
    </div>
  </div>
</html>

<footer>
  <?php   
    include("common/footer.php"); 
  ?>
</footer>
