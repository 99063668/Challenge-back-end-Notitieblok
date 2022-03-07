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

    var_dump($data);
    echo("<br>");
    
    if(!empty($data) && isset($data)){
      echo($data["title"]);
      if(isset($data["title"]) && !empty($data["title"]) && isset($data["task"]) && !empty($data["task"]) && isset($data["description"]) && !empty($data["description"]) && isset($data["duration"]) && !empty($data["duration"])){
        $query = $conn->prepare("INSERT INTO todolist(title, task, description, duration) VALUES (:title, :task, :description, :duration)");
        $query->bindParam(":title", $data["title"]);
        $query->bindParam(":task", $data["task"]);
        $query->bindParam(":description", $data["description"]);
        $query->bindParam(":duration", $data["duration"]);
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
      if (($table == "todolist") && isset($id) && !empty($id) && is_numeric($id)) {
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

  function controle(){
    $data = [];
    
    // if(!empty($_POST["id"])){
    //   $id = trimdata($_POST["id"]);
    //   settype($id, "int");
    //   $todolist = getTable("todolist", $id);

    //   if(!is_numeric($id) && isset($todolist) && !empty($todolist)){
    //     echo("Er bestaat geen notitie met dit id!");
    //   }else{
    //     $data["id"] = $id;
    //   }
    // }

    if(!empty($_POST["duration"])){
      $duration = trimdata($_POST["duration"]);
      if(!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $duration)){
        echo("Alleen letters en spaties zijn toegestaan!");
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
      if (!empty($input) && isset($input)) {
        addNote($input);
      }
    }
  }
?>
