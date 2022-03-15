<?php
  include("script/functions.php");
  $lists = getAllList();
  var_dump($filteredList);
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand"><i class="fa-solid fa-note-sticky" style="padding-right: 4px;"></i>Notities</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="script/makeList.php">Lijst maken<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  </header>

  <?php
    foreach($lists as $list){
      $notes = getDataFilter("todolist", ["listId" => ["operator" => "=", "value"=> $list["id"]]]);
  ?>
  <div class="row">
    <div class="column">
      <table>
        </tr>
          <th><?=$list["title2"]?>
            <div class="headerIcon" style="float: right;">
              <a href="script/editList.php?id=<?=$list["id"]?>"><i class="fa-solid fa-pencil" style="color:#38df6a"></i></a>
              <a href="script/makeNote.php?listId=<?=$list["id"]?>"><i class="fa-solid fa-plus" style="color:#38df6a"></i></a>
              <a href="script/deleteList.php?id=<?=$list["id"]?>"><i class="fa-solid fa-trash-can" style="color:#FF8200"></i></a>
            </div>
          </th>
        </tr>

        <tr>
        <?php
          // $list["id"] == $filteredList[0]["listId"]
          // $list["id"] == $list[0]["id"]
          if($filteredList == NULL /*&& $list["id"] == $note["id"]*/){
            foreach($notes as $note){
              
        ?>
          <td><a class="link" href="script/detail.php?id=<?=$note["id"]?>"><?=$note["title"]?></a></td>
        <?php
            }
          }
        ?>

        <?php
          // var_dump($filteredList[0]["listId"]);
          
          if($filteredList !== NULL && $list["id"] == $filteredList[0]["listId"]){
            foreach($filteredList as $filter){
        ?>
          <td><a class="link" href="script/detail.php?id=<?=$filter["id"]?>"><?=$filter["title"]?></a></td>
        <?php
            }
          }
        ?>
        </tr>
        <br>

        <th> 
          <form method="post" action="index.php">
            <input type="hidden" name="listId" value="<?=$list["id"]?>">

            <select id="filter" name="filter">
              <option selected><--Filter lijst--></option>
              <option value="sorteerDuur">Duur</option>
              <option value="filterBezig">Status: bezig</option>
              <option value="filterAfgerond">Status: afgerond</option>
              <option value="filterNbegonnen">Status: niet begonnen</option>
              <option value="filterN">Niet filteren</option>
            </select>
            <button name="submit" value="filterconfirmed" class="buttons">Filter</button>
          </form>
        </th>
      <?php
        }
      ?>
    </div>
  </div>

  <footer>
    <?php   
      include("common/footer.php"); 
    ?>
  </footer>
</html>
