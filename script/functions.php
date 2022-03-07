<?php
  include("database.php");

  //Alles ophalen
  function getAllNotes(){
    $conn = openDatabase();

    $query = $conn->prepare("SELECT * FROM todolist");
    $query->execute();

    return $query->fetchAll();
  }

  //Toevoegen aan database
  function addNote($data){
    $conn = openDatabase();

    if(!empty($data) && isset($data)){
      if(isset($data["title"]) && !empty($data["title"]) && isset($data["task"]) && !empty($data["task"]) && isset($data["description"]) && !empty($data["description"]) && isset($data["duration"]) && !empty($data["duration"]) && isset($data["listId"]) && !empty($data["listId"])){
        $query = $conn->prepare("INSERT INTO todolist(title, task, description, duration, listId) VALUES (:title, :task, :description, :duration, :listId)");
        $query->bindParam(":title", $data["title"]);
        $query->bindParam(":task", $data["task"]);
        $query->bindParam(":description", $data["description"]);
        $query->bindParam(":duration", $data["duration"]);
        $query->bindParam(":listId", $data["listId"]);
        $query->execute();

        return $data;
      }
    }else{
      echo("error empty post note bij function controle.");
    }
  }

  //Haalt 1 table op
  function getTable($table, $id){
    $conn = openDatabase();
    $id = intval($id);
    try {
      if (($table == "todolist" || $table == "list") && isset($id) && !empty($id) && is_numeric($id)) {
        $query = $conn->prepare("SELECT * FROM `$table` WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
      }
    } catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }
  
}

  //Edit een notitie
  function editNote($data){
    $conn = openDatabase();
    $data["id"] = intval($data["id"]);
    $check = getTable("todolist", $data["id"]);

    if(!empty($data["id"]) && isset($data["id"]) && is_numeric($data["id"]) && !empty($check) && isset($check)){
      $query = $conn->prepare("UPDATE todolist SET task=:task, status=:status, description=:description, duration=:duration WHERE id=:id");
      $query->bindParam(":task",  $data["task"]);
      $query->bindParam(":status",  $data["status"]);
      $query->bindParam(":duration",  $data["duration"]);
      $query->bindParam(":description",  $data["description"]);
      $query->bindParam(":id", $data["id"]);
      $query->execute(); 
    }  
}

  function controle(){
    $data = [];

    if(!empty($_POST["duration"])){
      $duration = trimdata($_POST["duration"]);
      if(!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $duration)){
        echo("Alleen tijd is toegestaan!");
      }else{
        $data["duration"] = $duration;
      }
    }

    if(!empty($_POST["title"])){
      $title = trimdata($_POST["title"]);
      if(!preg_match("/^[a-zA-Z-' ]*$/", $title)){
        echo("Alleen letters en spaties zijn toegestaan!");
      }else{
        $data["title"] = $title;
      }
    }

    if(!empty($_POST["task"])){
    $task = trimdata($_POST["task"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/", $task)){
      echo("Alleen letters en spaties zijn toegestaan!");
    }else{
      $data["task"] = $task;
    }
  }

    if(!empty($_POST["description"])){
      $description = trimdata($_POST["description"]);
      if(!preg_match("/^[a-zA-Z-' , ]*$/", $description)){
        echo("Alleen letters en spaties zijn toegestaan!");
      }else{
        $data["description"] = $description;
      }
    }

    if(!empty($_POST["title2"])){
      $title2 = trimdata($_POST["title2"]);
      if(!preg_match("/^[a-zA-Z-' ]*$/", $title2)){
        echo("Alleen letters en spaties zijn toegestaan!");
      }else{
        $data["title2"] = $title2;
      }
    }

    if(!empty($_POST["id"])){
      $id = trimdata($_POST["id"]);
      settype($id, "int");
      $note = getTable("todolist", $id);

      if(!is_numeric($id) && isset($note) && !empty($note)){
        echo("Er bestaat geen notitie met dit id!");
      }else{
        $data["id"] = $id;
      }

      if(!empty($_POST["listId"])){
        $listId = trimdata($_POST["listId"]);
        settype($listId, "int");
        $note = getTable("todolist", $listId);
  
        if(!is_numeric($listId) && isset($note) && !empty($note)){
          echo("Er bestaat geen notitie met dit listId!");
        }else{
          $data["listId"] = $listId;
        }
      }
  }

    return $data;
  }

  //Controleert de input op verboden characters
  function trimdata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["SubmitBtn"])) {
      $input = controle();
    }if (!empty($_POST) && isset($_POST)){
      addNote($_POST);
    }elseif(!empty($_POST["Delete"])){
      deleteNote($_GET["id"]);
    }elseif(!empty($_POST["SubmitBtnList"])){
      $input = controle();
      addList($input);
    }elseif(!empty($_POST["SubmitBtn2"])){
      $input = controle();
      editNote($input);
    }
  }

  // Verwijderd 1 notitie
  function deleteNote($id){
    $conn = openDatabase();
    $id = intval($id);
    $check = getTable("todolist", $id);

    if(!empty($id) && isset($id) && is_numeric($id) && !empty($check) && isset($check)){
      $query = $conn->prepare("DELETE FROM todolist WHERE id = :id");
      $query->bindParam(":id", $id);
      $query->execute(); 
    } 
  }

  // Alle lijsten ophalen
  function getAllList(){
    $conn = openDatabase();

    $query = $conn->prepare("SELECT * FROM list");
    $query->execute();

    return $query->fetchAll();
  }

  // Lijst toevoegen
  function addList($data){
    $conn = openDatabase();
    
    if(!empty($data) && isset($data)){
      if(isset($data["title2"]) && !empty($data["title2"])){  
        $query = $conn->prepare("INSERT INTO list (title2) VALUES (:title2)");
        $query->bindParam(":title2", $data["title2"]);
        $query->execute();

        return $data;
      }
    }else{
      echo("error empty post note bij function controle.");
    }
  }
?>
