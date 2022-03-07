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
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><i id="icon" class="fa-solid fa-note-sticky"></i></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> -->
            <a class="nav-link" href="script/makeList.php"><h3>Lijst maken</h3></a>
          <!-- </li>
        </ul>
      </div>
    </nav>
  </header> -->

  <?php
    foreach($lists as $list){
  ?>
  <div class="row">
    <div class="column">
      <table>
        </tr>
          <th><?=$list["title2"]?>
            <a href="script/editList.php"><i class="fa-solid fa-pencil" style="color:#38df6a"></i></a>
            <a href="script/deleteList.php"><i class="fa-solid fa-trash-can" style="color:#38df6a"></i></a>
          </th>
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
